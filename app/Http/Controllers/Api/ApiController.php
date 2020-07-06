<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use App\Http\Requests\Input;
use App\Model as M;
use Hash, Helper, Session, Auth, Mail, Image, ImageHelper, PDF, Excel, DB;
use Carbon\Carbon;

class ApiController extends Controller {
    //private func
        private function isExpired($ptMR) {
            $patientData = DB::table("lc_patients")
                ->select("PT_PACKAGE_EXPIRED_DATE")
                ->where("PT_MR", $ptMR)
                ->where("PT_PACKAGE_EXPIRED_DATE", "!=", "0000-00-00")
                ->first();
            //TO DO :
            //handle jika tdk ada paket, krn di data real ada bbrp pasien yg tdk ada data paket
            //jika hal tsb terjadi, maka cek di data assignment nya
            if(count($patientData) <= 0) {
                $assignmentData = DB::table("lc_chats_assignments")
                    ->select("ASN_DATE_END")
                    ->where("ASN_U_ID_PATIENT", $ptMR)
                    ->where("ASN_DATE_END", "!=", "0000-00-00")
                    ->first();
                if(count($assignmentData) <= 0) return true;

                $current = Carbon::now();
                $expiredDate = Carbon::parse($assignmentData->{"ASN_DATE_END"});

                if ($current->gt($expiredDate)) {
                    return true;
                }
                else {
                    return false;
                }
            }
            else {
                $current = Carbon::now();
                $expiredDate = Carbon::parse($patientData->{"PT_PACKAGE_EXPIRED_DATE"});

                if ($current->gt($expiredDate)) {
                    return true;
                }
                else {
                    return false;
                }
            }
        }
    //---

    public function __construct() {

    }

    //general
        public function getIndex() {
            return Helper::composeReply2("SUCCESS", "API V.1");
        }

        public function postIndex() {
            return Helper::composeReply2('ERROR', 'diterima boss', Carbon::now());
        }

        public function postAccess(Input $input) {
            return Helper::composeReply2('SUCCESS', 'Access Menu', array(
                'ALLOW_UNAUTH_ACCESS_APPOINTMENT' => Helper::getSetting('ALLOW_UNAUTH_ACCESS_APPOINTMENT'),
                'ALLOW_UNAUTH_ACCESS_CHAT' => Helper::getSetting('ALLOW_UNAUTH_ACCESS_CHAT'),
                'ALLOW_UNAUTH_ACCESS_FOOD_BIBLE' => Helper::getSetting('ALLOW_UNAUTH_ACCESS_FOOD_BIBLE'),
                'ALLOW_UNAUTH_ACCESS_FOOD_DIARY' => Helper::getSetting('ALLOW_UNAUTH_ACCESS_FOOD_DIARY'),
                'ALLOW_UNAUTH_ACCESS_GAME' => Helper::getSetting('ALLOW_UNAUTH_ACCESS_GAME'),
                'ALLOW_UNAUTH_ACCESS_RECIPE' => Helper::getSetting('ALLOW_UNAUTH_ACCESS_RECIPE'),
                'ALLOW_UNAUTH_ACCESS_TESTIMONY' => Helper::getSetting('ALLOW_UNAUTH_ACCESS_TESTIMONY'),
                'ALLOW_UNAUTH_ACCESS_WEIGHT_PROGRESS' => Helper::getSetting('ALLOW_UNAUTH_ACCESS_WEIGHT_PROGRESS')
            ));
        }

        public function postLogin(Input $input) {
            $ptMR = $input->id;
            $ptPassword = $input->password;

            if(empty($ptMR) || empty($ptPassword)) return Helper::composeReply2('ERROR', 'Harap masukkan nomor MR dan password Anda');

            $patientData = DB::table('lc_patients')
                ->where('PT_MR', $ptMR)
                ->where('PT_PASSWORD_HASH', md5($ptMR.$ptPassword))
                ->where('PT_VERIFICATION_STATUS', 'VS_VERIFIED')
                ->first();
            if(count($patientData) <= 0)    return Helper::composeReply2("ERROR", "Harap periksa kembali data Anda atau account belum terdaftar/diverifikasi. Silahkan hubungi lightHOUSE.");

            $loginToken = md5(date("YmdHis").$ptMR);
            DB::table("lc_patients")
                ->where("PT_MR", $ptMR)
                ->update(array(
                    "PT_LOGIN_TOKEN" => $loginToken,
                    "PT_LOGIN_TIME" => date("Y-m-d H:i:s")
                ));

            //UPDATE menyertakan assignment ID juga
            $chatAssignment = DB::select("SELECT * FROM lc_chats_assignments
                WHERE ASN_U_ID_PATIENT = ? AND ASN_DATE_END <= '".date("Y-m-d")."'
                ORDER BY ASN_DATE_END DESC LIMIT 0,1", array($ptMR));
            if(count($chatAssignment) > 0) {
                $currentAssignment = intval($chatAssignment[0]->{"ASN_ID"});
            }
            else {
                $currentAssignment = 0;
            }

            $packageall = DB::table('lc_patients_packages')
              ->where('PT_MR', $ptMR)
              ->where('PCK_EXPIRED_DATE', '>=', date("Y-m-d"))
              ->orderBy('PCK_EXPIRED_DATE', 'desc')
              ->get();

            foreach ($packageall as $aPackageall) {
              $aPackageall->{"PCK_EXPIRED_DATE"} = Helper::tglIndo($aPackageall->{"PCK_EXPIRED_DATE"}, "LONG");
            }

            return Helper::composeReply2('SUCCESS', 'Selamat datang '.$patientData->{"PT_NAME"}, array(
                "LOGIN_ID" => $patientData->{"PT_MR"},
                "LOGIN_NAME" => $patientData->{"PT_NAME"},
                "LOGIN_TOKEN" => $loginToken,
                "LOGIN_AVATAR" => $patientData->{"PT_AVATAR_PATH"},
                "LOGIN_PACKAGE" => $patientData->{"PT_PACKAGE"},
                "LOGIN_PACKAGE_EXPIRED_DATE" => Helper::tglIndo($patientData->{"PT_PACKAGE_EXPIRED_DATE"}, "SHORT"),
                "LOGIN_PHONE" => $patientData->{"PT_PHONE"},
                "LOGIN_EMAIL" => $patientData->{"PT_EMAIL"},
                "LOGIN_CHAT_ASSIGNMENT" => $currentAssignment,
                "LOGIN_PACKAGE_ALL" => $packageall
            ));
        }

        public function postValidateAccess(Input $input) {
            if(!isset($input->loginToken) || empty($input->loginToken) || trim($input->loginToken) == "")   return Helper::composeReply2("ERROR", "Untuk keamanan Anda, silahkan logout dan login kembali untuk menjalankan proses ini");
            $loginToken = $input->loginToken;

            if(!isset($input->userId) || empty($input->userId) || trim($input->userId) == "")   return Helper::composeReply2("ERROR", "Parameter tidak lengkap");
            $userId = trim($input->userId);

            //$patientData = DB::table("lc_patients")
            //    ->where("PT_MR", $userId)
            //    ->first();
            //if(count($patientData) <= 0)    return Helper::composeReply2("ERROR", "Data pasien tidak dikenal");
            if($this->isExpired($userId)) {
                return Helper::composeReply2("ERROR", "Maaf, paket Anda sudah expired sehingga tidak bisa akses fitur ini");
            }
            else {
                return Helper::composeReply2("SUCCESS", "Valid");
            }
        }

        public function postFcmToken(Input $input) {
            if(empty($input->userId) || trim($input->userId) == "")             return Helper::composeReply2("ERROR", "Parameter user ID tidak ditemukan");
            $userId = $input->userId;

            if(empty($input->loginToken) || trim($input->loginToken) == "")     return Helper::composeReply2("ERROR", "Parameter login token tidak ditemukan");
            $loginToken = $input->loginToken;

            if(empty($input->newFCMToken) || trim($input->newFCMToken) == "")   return Helper::composeReply2("ERROR", "Parameter FCM token tidak ditemukan");
            $newFCMToken = $input->newFCMToken;

            $opr = DB::table("lc_patients")
                ->where("PT_MR", $userId)
                ->where("PT_LOGIN_TOKEN", $loginToken)
                ->update(array(
                    "PT_DEVICE_ID_ANDROID" => $newFCMToken,
                    "PT_DEVICE_ID_ANDROID_TIME" => date("Y-m-d H:i:s")
                ));

            if($opr) {
                return Helper::composeReply2("SUCCESS", "Proses update token berhasil");
            }
            else {
                return Helper::composeReply2("ERROR", "Proses update token gagal. Aplikasi masih berfungsi, namun tidak bisa menerima notifikasi dari lightHOUSE. Silahkan logout dan login kembali.");
            }
        }

        public function postPushNotification(Input $input) {
            $ptMR = $input->id;
            if(empty($ptMR) || trim($ptMR) == "")   return Helper::composeReply2("ERROR", "Parameter tidak lengkap");

            $message = $input->message;
            if(empty($message) || trim($message) == "") return Helper::composeReply2("ERROR", "Parameter tidak lengkap");

            $patientData = DB::table('lc_patients')
                ->where('PT_MR', $ptMR)
                ->where('PT_VERIFICATION_STATUS', 'VS_VERIFIED')
                ->first();
            if(count($patientData) <= 0)    return Helper::composeReply2("ERROR", "Data pasien tidak dikenal atau belum diverifikasi");

            if($patientData->{"PT_DEVICE_ID_ANDROID"} == "" || $patientData->{"PT_DEVICE_ID_ANDROID"} == "-")   return Helper::composeReply2("ERROR", "Proses dibatalkan karena pasien belum mendaftarkan perangkat Androidnya");
            //--
            $data = array(
              "to" => $patientData->{"PT_DEVICE_ID_ANDROID"},
              "notification" => array(
                "title" => "Notifikasi dari lightHOUSE",
                "body" => $message
              ),
              "data" => array(
                "title" => "Notifikasi dari lightHOUSE",
                "message" => $message
              )
            );
            $data_string = json_encode($data);

            $headers = array(
              'Authorization: key=AIzaSyA4mVTnm6x_Qf0DJJPkrAtyIqDJ8LZTIU4',
              'Content-Type: application/json'
            );

            $ch = curl_init();

            curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);

            $result = curl_exec($ch);

            curl_close ($ch);

            if(!$result) {
                return Helper::composeReply2("ERROR", "Proses gagal");
            }
            else {
                return Helper::composeReply2("SUCCESS", "Pesan telah dikirimkan", $result);
            }
        }

        public function postUpdateFirebaseRefreshToken(Input $input) {
            if(empty($input->asnId))    return Helper::composeReply2("ERROR", "Parameter assignment ID tidak ada");

            $result = Helper::updateFirebaseRefreshToken($input->asnId);
            return Helper::composeReply2("SUCCESS", "Result", $result);
        }

        public function postDeleteFirebaseRefreshToken(Input $input) {
            if(empty($input->asnId))    return Helper::composeReply2("ERROR", "Parameter assignment ID tidak ada");

            $result = Helper::deleteFirebaseRefreshToken($input->asnId);
            return Helper::composeReply2("SUCCESS", "Result", $result);
        }

        public function getExternalData(Input $input) {
            if(!isset($input->ptMR) || empty($input->ptMR) || trim($input->ptMR) == "")   return Helper::composeReply2("ERROR", "Parameter tidak lengkap");
            $ptMR = $input->ptMR;

            $pasienData = DB::table("lc_patients")
                ->where("PT_MR", $ptMR)
                ->first();
            if(count($pasienData) <= 0) return Helper::composeReply2("ERROR", "Data pasien tidak dikenal");

            if(!isset($input->ptBirthdate) || empty($input->ptBirthdate) || trim($input->ptBirthdate) == "")   return Helper::composeReply2("ERROR", "Parameter tidak lengkap");
            $ptBirthdate = $input->ptBirthdate;

            $backendSave = "N";
            if(isset($input->backendSave) && trim($input->backendSave) != "")   $backendSave = $input->backendSave;

            $result = Helper::curlPost("https://mbti-lightsystem.com/webservice_apps/pasien.php", array(
                "no_rekam_medik" => $ptMR,
                "tanggal_lahir" => $ptBirthdate
            ));

            if($result == "")   return Helper::composeReply2("ERROR", "Tidak ada data");

            $result = json_decode($result);
            if($backendSave == "Y") {
                if(!empty($result->{"no_rm"})) {
                    //paket
                    $paket = "-";
                    $tglExpiredYMD = "0000-00-00";
                    $jmlPaket = 0;
                    $arrPaket = array();
                    if(!empty($result->{"jml_paket"}))  $jmlPaket = $result->{"jml_paket"};
                    if(!is_numeric($jmlPaket))  $jmlPaket = 0;

                    for($i=1; $i<=$jmlPaket; $i++) {
                        $arrPaket[$i-1]["paket"] = $result->{"paket".$i};
                        $arrPaket[$i-1]["tglExpired"] = "0000-00-00";
                        $tglExpired = $result->{"tgl_expired".$i};//Jan 19 2019 12:00AM
                        $x = explode(" ", $tglExpired);
                        if(count($x) > 1) {
                            if(strtoupper($x[0]) == "JAN" || strtoupper($x[0]) == "JANUARI" || strtoupper($x[0]) == "JANUARY")  $bln = "01";
                            if(strtoupper($x[0]) == "FEB" || strtoupper($x[0]) == "FEBRUARI" || strtoupper($x[0]) == "FEBRUARY")    $bln = "02";
                            if(strtoupper($x[0]) == "MAR" || strtoupper($x[0]) == "MARET" || strtoupper($x[0]) == "MARCH")$bln = "03";
                            if(strtoupper($x[0]) == "APR" || strtoupper($x[0]) == "APRIL")  $bln = "04";
                            if(strtoupper($x[0]) == "MAY" || strtoupper($x[0]) == "MEI")    $bln = "05";
                            if(strtoupper($x[0]) == "JUN" || strtoupper($x[0]) == "JUNI" || strtoupper($x[0]) == "JUNE")    $bln = "06";
                            if(strtoupper($x[0]) == "JUL" || strtoupper($x[0]) == "JULI" || strtoupper($x[0]) == "JULY")    $bln = "07";
                            if(strtoupper($x[0]) == "AUG" || strtoupper($x[0]) == "AGS" || strtoupper($x[0]) == "AGUSTUS" || strtoupper($x[0]) == "AUGUST") $bln = "08";
                            if(strtoupper($x[0]) == "SEP" || strtoupper($x[0]) == "SEPTEMBER")  $bln = "09";
                            if(strtoupper($x[0]) == "OCT" || strtoupper($x[0]) == "OKT" || strtoupper($x[0]) == "OCTOBER" || strtoupper($x[0]) == "OKTOBER")    $bln = "10";                                                                                $bln = "04";
                            if(strtoupper($x[0]) == "NOV" || strtoupper($x[0]) == "NOVEMBER")   $bln = "11";
                            if(strtoupper($x[0]) == "DEC" || strtoupper($x[0]) == "DES" || strtoupper($x[0]) == "DECEMBER" || strtoupper($x[0]) == "DESEMBER")  $bln = "12";

                            $tgl = $x[1];
                            if(intval($tgl) < 10)   $tgl = "0".$tgl;

                            $arrPaket[$i-1]["tglExpired"] = $x[2]."-".$bln."-".$tgl;
                        }
                    }

                    foreach ($arrPaket as $aPaket) {
                        DB::table("lc_sync_temp")->insert(array(
                            "PT_MR" => $ptMR,
                            "TMP_PAKET" => $aPaket["paket"],
                            "TMP_TGL_EXPIRED" => $aPaket["tglExpired"]
                        ));
                    }

                    $paketData = DB::select("SELECT * FROM lc_sync_temp WHERE PT_MR = ? ORDER BY TMP_TGL_EXPIRED DESC LIMIT 0,1", array($ptMR));
                    if(count($paketData) > 0) {
                        $paket = $paketData[0]->{"TMP_PAKET"};
                        $tglExpiredYMD = $paketData[0]->{"TMP_TGL_EXPIRED"};
                    }

                    DB::table("lc_patients")
                        ->where("PT_MR", $ptMR)
                        ->update(array(
                            "PT_NAME" => $result->{"name"},
                            "PT_ADDRESS" => $result->{"address"},
                            "PT_PHONE" => $result->{"No_HP"},
                            "PT_EMAIL" => $result->{"Email"},
                            "PT_PACKAGE" => $paket,
                            "PT_PACKAGE_EXPIRED_DATE" => $tglExpiredYMD
                        ));

                    //progress bb
                    $jmlUkur = 0;
                    if(!empty($result->{"jml_ukur"}))   $jmlUkur = $result->{"jml_ukur"};
                    if(!is_numeric($jmlUkur))   $jmlUkur = 0;

                    if($jmlUkur > 0) DB::delete("DELETE FROM lc_bodyweight_progress WHERE PT_ID = ?", array($pasienData->{"PT_ID"}));

                    $arrUkur = array();
                    for($i=1; $i<=$jmlUkur; $i++) {
                        $tglUkur = $result->{"tgl_ukur".$i};
                        $arrTgl = explode("-", $tglUkur);
                        if(count($arrTgl) > 1) {
                            $beratBadan = $result->{"berat_badan".$i};

                            $bwpId = DB::table("lc_bodyweight_progress")->insertGetId(array(
                                "PT_ID" => $pasienData->{"PT_ID"},
                                "BWP_DATE" => $arrTgl[2]."-".$arrTgl[1]."-".$arrTgl[0],
                                "BWP_VALUE" => $beratBadan
                            ));
                        }

                        $arrUkur[$i-1]["tgl_ukur"] = $tglUkur;
                        $arrUkur[$i-1]["berat_badan"] = $beratBadan;
                    }

                    return Helper::composeReply2("SUCCESS", "Data telah disimpan", array(
                        "PT_ID" => $pasienData->{"PT_ID"},
                        "PT_MR" => $ptMR,
                        "PT_NAME" => $result->{"name"},
                        "PT_ADDRESS" => $result->{"address"},
                        "PT_PHONE" => $result->{"No_HP"},
                        "PT_EMAIL" => $result->{"Email"},
                        "PT_PACKAGE" => $paket,
                        "PT_PACKAGE_EXPIRED_DATE" => $tglExpiredYMD,
                        "JML_UKUR" => $jmlUkur,
                        "DATA_UKUR" => $arrUkur
                    ));
                }
                else {
                    return Helper::composeReply2("ERROR", "Tidak ada data");
                }
            }
            else {
                return Helper::composeReply2("SUCCESS", "Hasil", $result);
            }
        }

        public function getExternalDataListPasien(Input $input) {
            $result = Helper::curlPost("https://mbti-lightsystem.com/webservice_apps/list_pasien.php", array());

            if($result != "") {
                $result = json_decode($result);
            }

            $dataCount = 0;
            $processedNew = 0;
            $processedUpdate = 0;
            $data = [];
            if(isset($result->{"data"}) && count($result->{"data"}) > 0) {
                $data = $result->{"data"};
                foreach ($data as $aData) {
                    /*
                    "no_rm": "CS001010",
                    "name": "Vitri Sandriani Hadju",
                    "date_of_birth": "19-05-1965",
                    "address": "Jl. Puyuh Timur I Blok EG 1/34",
                    "No_HP": "081901300234",
                    "Email": "-",
                    "visit_date": "22-12-2018",
                    "kd_klinik": "CS",
                    "visit_clinic": "LightHOUSE SUDIRMAN"
                    */
                    if(isset($aData->{"date_of_birth"}) && trim($aData->{"date_of_birth"}) != "") {
                        $x = explode("-", $aData->{"date_of_birth"});
                        $dobYMD = $x[2]."-".$x[1]."-".$x[0];
                        $password = $x[0].$x[1].$x[2];
                    }
                    else {
                        $password = Helper::getSetting("DEFAULT_PASSWORD_PATIENT");
                        $dobYMD = "0000-00-00";
                    }

                    if(isset($aData->{"visit_date"}) && trim($aData->{"visit_date"}) != "") {
                        $x = explode("-", $aData->{"visit_date"});
                        $visitDateYMD = $x[2]."-".$x[1]."-".$x[0];
                    }
                    else {
                        $visitDateYMD = "0000-00-00";
                    }

                    $cek = DB::table("lc_patients")
                        ->where("PT_MR", strtoupper($aData->{"no_rm"}))
                        ->first();
                    if(count($cek) > 0) {
                        DB::table("lc_patients")
                            ->where("PT_MR", $aData->{"no_rm"})
                            ->update(array(
                                "PT_NAME" => $aData->{"name"},
                                "PT_BIRTHDATE" => $dobYMD,
                                "PT_VERIFICATION_STATUS" => "VS_VERIFIED",
                                "PT_PHONE" => $aData->{"No_HP"},
                                "PT_VISIT_DATE" => $visitDateYMD,
                                "PT_VISIT_CL_CODE" => $aData->{"kd_klinik"},
                                "PT_ADDRESS" => $aData->{"address"},
                                "PT_EMAIL" => $aData->{"Email"},
                                "PT_SYNC_TIME" => date("Y-m-d H:i:s")
                            ));
                        $aData->{"package"} = DB::table("lc_patients_packages")
                            ->where("PT_MR", $aData->{"no_rm"})
                            ->get();

                        if(trim($cek->{"PT_AVATAR_PATH"}) == "" || trim($cek->{"PT_AVATAR_PATH"}) == "-") {
                            DB::table("lc_patients")
                                ->where("PT_MR", $aData->{"no_rm"})
                                ->update(array(
                                    "PT_AVATAR_PATH" => "person.png"
                                ));
                        }

                        $processedUpdate++;
                    }
                    else {
                        $ptId = DB::table("lc_patients")->insertGetId(array(
                            "PT_MR" => strtoupper($aData->{"no_rm"}),
                            "PT_NAME" => $aData->{"name"},
                            "PT_BIRTHDATE" => $dobYMD,
                            "PT_VERIFICATION_STATUS" => "VS_VERIFIED",
                            "PT_PHONE" => $aData->{"No_HP"},
                            "PT_VISIT_DATE" => $visitDateYMD,
                            "PT_VISIT_CL_CODE" => $aData->{"kd_klinik"},
                            "PT_ADDRESS" => $aData->{"address"},
                            "PT_EMAIL" => $aData->{"Email"},
                            "PT_SYNC_TIME" => date("Y-m-d H:i:s"),
                            "PT_PASSWORD" => $password,
                            "PT_PASSWORD_HASH" => md5(strtoupper($aData->{"no_rm"}).$password),
                            "PT_PACKAGE" => "-",
                            "PT_PACKAGE_EXPIRED_DATE" => "0000-00-00",
                            "PT_AVATAR_PATH" => "person.png"
                        ));

                        if(isset($ptId) && $ptId > 0) {
                            $processedNew++;
                        }
                    }

                    $dataCount++;
                }
            }

            return Helper::composeReply2("SUCCESS", "Hasil", array(
                "DATA_COUNT" => $dataCount,
                "PROCESSED_NEW" => $processedNew,
                "PROCESSED_UPDATE" => $processedUpdate,
                "PROCESSED_TOTAL" => $processedUpdate + $processedNew,
                "DATA" => $data
            ));
        }

        // public function getListPasien(){
        //   $data = DB::table("lc_patients")
        //             ->select("PT_NAME", "PT_EMAIL")
        //             ->get();
        //     return Helper::composeReply2("SUCCESS", "Hasil", $data);
        // }

        public function getClinics() {
            //if(!isset($input->loginToken) || empty($input->loginToken) || trim($input->loginToken) == "")   return Helper::composeReply2("ERROR", "Untuk keamanan Anda, silahkan logout dan login kembali untuk menjalankan proses ini");
            //$loginToken = $input->loginToken;

            //if(!isset($input->userId) || empty($input->userId) || trim($input->userId) == "")   return Helper::composeReply2("ERROR", "Parameter tidak lengkap");
            //$userId = trim($input->userId);

            $clinics = DB::table("lc_clinics")->get();

            return Helper::composeReply2("SUCCESS", "Data", $clinics);
        }

        public function getBahan() {
            //if(!isset($input->loginToken) || empty($input->loginToken) || trim($input->loginToken) == "")   return Helper::composeReply2("ERROR", "Untuk keamanan Anda, silahkan logout dan login kembali untuk menjalankan proses ini");
            //$loginToken = $input->loginToken;

            //if(!isset($input->userId) || empty($input->userId) || trim($input->userId) == "")   return Helper::composeReply2("ERROR", "Parameter tidak lengkap");
            //$userId = trim($input->userId);

            $bahanbaku = DB::table("bahanbaku_detail")->get();

            return Helper::composeReply2("SUCCESS", "Data", $bahanbaku);
        }

}
