<?php

namespace App\Http\Controllers;

use App\Models\SubMenus as SubMenus;
use App\Model as M;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

    public function __construct() {
        
    }

    public function index($lang='en') {

        // request()->session()->put('locale', $lang);

        Session::put('session_locale', $lang);

        app()->setLocale(Session::get('session_locale'));

        
        $content = 'content_'.$lang;
        $title = 'title_'.$lang;
        $name = 'name_'.$lang;
        $slug = 'slug_'.$lang;
        $desc = 'desc_'.$lang;


        $data['uri_en'] = '';
        $data['uri_ru'] = '';
        $data['uri_sa'] = '';

        $data['lang'] = $lang;

        $data['orange'] = DB::table("products")
                    ->select($content.' as content',$name.' as name', 'slug_en as slug',$desc.' as desc','image')
                    ->where('slug_en','=','orange')
                    ->first();
        $data['pear'] = DB::table("products")
                    ->select($content.' as content',$name.' as name', 'slug_en as slug',$desc.' as desc','image')
                    ->where('slug_en','=','pear')
                    ->first();
        $data['papaya'] = DB::table("products")
                    ->select($content.' as content',$name.' as name', 'slug_en as slug',$desc.' as desc','image')
                    ->where('slug_en','=','papaya')
                    ->first();
        $data['gallerys'] = DB::table("gallery")
                    ->select('id',$content.' as content',$title.' as title', $desc.' as desc' ,'slug_en as slug')
                    ->orderBy('created_at','desc')
                    ->limit(3)
                    ->get();


        return view('front.index', $data);
    }

    public function getMenu($lang='en',$menu=null,$slug=null) {


        $lang = $lang;
        $menu = $menu;
        $slug = $slug;
        $data['lang'] = $lang;

        Session::put('session_locale', $lang);

        app()->setLocale(Session::get('session_locale'));
        
        if($menu=='products'){
            
            $data['lang'] = $lang;

            $content = 'content_'.$lang;
            $content2 = 'content2_'.$lang;
            $name = 'name_'.$lang;
            $desc = 'desc_'.$lang;


            if($slug!=null){
                $data['uri_en'] = '/products/'.$slug;
                $data['uri_ru'] = '/products/'.$slug;
                $data['uri_sa'] = '/products/'.$slug;
                $product = DB::table("products")
                            ->select($content.' as content',$content2.' as content2',$name.' as name','slug_en as slug','image','image2')
                            ->where('slug_en','=',$slug)
                            ->first(); 
                $data['product'] = $product;
                return view('front.product', $data);
            }else{
                $data['uri_en'] = '/products';
                $data['uri_ru'] = '/products';
                $data['uri_sa'] = '/products';
                $data['products'] = DB::table("products")
                    ->select($desc.' as desc',$name.' as name','slug_en as slug','image')
                    ->get();
                return view('front.products', $data);
            }


        }elseif($menu=='pages'){
            $whereslug = 'slug_'.$lang;
            $content = 'content_'.$lang;
            $title = 'title_'.$lang;
            $slug = $slug;

            $pages = DB::table("pages")
                            ->select($content.' as content',$title.' as title','slug_en','slug_ru','slug_sa')
                            ->where($whereslug,'=',$slug)
                            ->first(); 
            $data['pages'] = $pages;

            $data['uri_en'] = '/pages/'.$pages->slug_en;
            $data['uri_ru'] = '/pages/'.$pages->slug_ru;
            $data['uri_sa'] = '/pages/'.$pages->slug_sa;
            
            return view('front.page', $data);
        }elseif($menu=='gallery'){
            $whereslug = 'slug_en';
            $content = 'content_'.$lang;
            $title = 'title_'.$lang;
            $desc = 'desc_'.$lang;
            $slug = $slug;

            if($slug!=null){
                $data['uri_en'] = '/gallery/'.$slug;
                $data['uri_ru'] = '/gallery/'.$slug;
                $data['uri_sa'] = '/gallery/'.$slug;
                $gallery = DB::table("gallery")
                            ->select('id',$content.' as content',$title.' as title','slug_en as slug','created_at','created_by')
                            ->where('slug_en','=',$slug)
                            ->first(); 
                $data['gallery'] = $gallery;
                $data['image1'] = DB::table("gallery_image")
                                        ->select('image')
                                        ->where('id_gallery',$gallery->id)
                                        ->where('order','1')
                                        ->first();
                $data['image2'] = DB::table("gallery_image")
                                        ->select('image')
                                        ->where('id_gallery',$gallery->id)
                                        ->where('order','2')
                                        ->first();
                $data['image3'] = DB::table("gallery_image")
                                        ->select('image')
                                        ->where('id_gallery',$gallery->id)
                                        ->where('order','3')
                                        ->first();
                $data['image4'] = DB::table("gallery_image")
                                        ->select('image')
                                        ->where('id_gallery',$gallery->id)
                                        ->where('order','4')
                                        ->first();
                $data['image5'] = DB::table("gallery_image")
                                        ->select('image')
                                        ->where('id_gallery',$gallery->id)
                                        ->where('order','5')
                                        ->first();
                $data['image6'] = DB::table("gallery_image")
                                        ->select('image')
                                        ->where('id_gallery',$gallery->id)
                                        ->where('order','6')
                                        ->first();
                return view('front.gallery', $data);
            }else{
                $data['uri_en'] = '/gallery';
                $data['uri_ru'] = '/gallery';
                $data['uri_sa'] = '/gallery';
                $data['gallerys'] = DB::table("gallery")
                    ->select('id',$title.' as title', $desc.' as desc' ,'slug_en as slug')
                    ->orderBy('created_at','desc')
                    ->get();
                return view('front.gallerys', $data);
            }
            
            return view('front.gallery', $data);
        }elseif($menu=="contact-us"){
            $data['uri_en'] = '/contact-us';
            $data['uri_ru'] = '/contact-us';
            $data['uri_sa'] = '/contact-us';

            return view('front.contact-us',$data);
        }elseif($menu=="about-us"){
            $data['uri_en'] = '/about-us';
            $data['uri_ru'] = '/about-us';
            $data['uri_sa'] = '/about-us';

            return view('front.about',$data);
        }else{
            return view('front.index');
        }
    }
    
}
