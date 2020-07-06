/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.11-MariaDB : Database - technovates
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`technovates` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `technovates`;

/*Table structure for table `classfunction` */

DROP TABLE IF EXISTS `classfunction`;

CREATE TABLE `classfunction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `function` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `classfunction` */

insert  into `classfunction`(`id`,`class`,`function`,`alias`,`method`,`route`,`action`) values 
(1,'users','index','Index','GET','panel/users/index/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\UserController@getIndex'),
(2,'users','data','Data','GET','panel/users/data/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\UserController@getData'),
(3,'users','add','Add','GET','panel/users/add/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\UserController@getAdd'),
(4,'users','edit','Edit','GET','panel/users/edit/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\UserController@getEdit'),
(5,'users','save','Save','POST','panel/users/save/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\UserController@postSave'),
(6,'users','status','Status','GET','panel/users/status/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\UserController@getStatus'),
(7,'users','delete','Delete','GET','panel/users/delete/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\UserController@getDelete'),
(8,'users','removeall','Removeall','POST','panel/users/removeall/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\UserController@postRemoveall'),
(9,'groups','index','Index','GET','panel/groups/index/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\GroupController@getIndex'),
(10,'groups','data','Data','GET','panel/groups/data/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\GroupController@getData'),
(11,'groups','add','Add','GET','panel/groups/add/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\GroupController@getAdd'),
(12,'groups','edit','Edit','GET','panel/groups/edit/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\GroupController@getEdit'),
(13,'groups','save','Save','POST','panel/groups/save/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\GroupController@postSave'),
(14,'groups','delete','Delete','GET','panel/groups/delete/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\GroupController@getDelete'),
(15,'groups','removeall','Removeall','POST','panel/groups/removeall/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\GroupController@postRemoveall'),
(16,'class_function','index','Index','GET','panel/class_function/index/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ClassfunctionController@getIndex'),
(17,'class_function','data','Data','GET','panel/class_function/data/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ClassfunctionController@getData'),
(18,'class_function','add','Add','GET','panel/class_function/add/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ClassfunctionController@getAdd'),
(19,'class_function','edit','Edit','GET','panel/class_function/edit/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ClassfunctionController@getEdit'),
(20,'class_function','save','Save','POST','panel/class_function/save/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ClassfunctionController@postSave'),
(21,'class_function','delete','Delete','GET','panel/class_function/delete/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ClassfunctionController@getDelete'),
(22,'class_function','removeall','Removeall','POST','panel/class_function/removeall/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ClassfunctionController@postRemoveall'),
(23,'class_function','reload','Reload','GET','panel/class_function/reload/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ClassfunctionController@getReload'),
(24,'role_access','index','Index','GET','panel/role_access/index/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\RoleaccessController@getIndex'),
(25,'role_access','data','Data','POST','panel/role_access/data/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\RoleaccessController@postData'),
(26,'role_access','save','Save','POST','panel/role_access/save/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\RoleaccessController@postSave'),
(27,'role_access','reload','Reload','GET','panel/role_access/reload/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\RoleaccessController@getReload'),
(28,'setting','index','Index','GET','panel/setting/index/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\SettingController@getIndex'),
(29,'setting','save','Save','POST','panel/setting/save/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\SettingController@postSave'),
(30,'setting','saveimage','Saveimage','GET','panel/setting/saveimage/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\SettingController@getSaveimage'),
(31,'setting','deleteimage','Deleteimage','GET','panel/setting/deleteimage/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\SettingController@getDeleteimage'),
(32,'setting','apps','Apps','GET','panel/setting/apps/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\SettingController@getApps'),
(33,'setting','saveconfig','Saveconfig','POST','panel/setting/saveconfig/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\SettingController@postSaveconfig'),
(34,'setting','editor','Editor','GET','panel/setting/editor/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\SettingController@getEditor'),
(35,'setting','filemanager','Filemanager','GET','panel/setting/filemanager/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\SettingController@getFilemanager'),
(36,'setting','cekfile','Cekfile','GET','panel/setting/cekfile/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\SettingController@getCekfile'),
(37,'setting','showcontent','Showcontent','GET','panel/setting/showcontent/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\SettingController@getShowcontent'),
(38,'setting','savefileeditor','Savefileeditor','POST','panel/setting/savefileeditor/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\SettingController@postSavefileeditor'),
(39,'setting','menu','Menu','GET','panel/setting/menu/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\SettingController@getMenu'),
(104,'product','index','Index','GET','panel/product/index/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ProductController@getIndex'),
(105,'product','add','Add','GET','panel/product/add/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ProductController@getAdd'),
(106,'product','edit','Edit','GET','panel/product/edit/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ProductController@getEdit'),
(107,'product','save','Save','POST','panel/product/save/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ProductController@postSave'),
(108,'product','edit','Edit','POST','panel/product/edit/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ProductController@postEdit'),
(109,'product','delete','Delete','GET','panel/product/delete/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\ProductController@getDelete'),
(110,'gallery','index','Index','GET','panel/gallery/index/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\GalleryController@getIndex'),
(111,'gallery','add','Add','GET','panel/gallery/add/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\GalleryController@getAdd'),
(112,'gallery','edit','Edit','GET','panel/gallery/edit/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\GalleryController@getEdit'),
(113,'gallery','save','Save','POST','panel/gallery/save/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\GalleryController@postSave'),
(114,'gallery','edit','Edit','POST','panel/gallery/edit/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\GalleryController@postEdit'),
(115,'gallery','delete','Delete','GET','panel/gallery/delete/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\GalleryController@getDelete'),
(116,'employee','index','Index','GET','panel/employee/index/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\EmployeeController@getIndex'),
(117,'employee','add','Add','GET','panel/employee/add/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\EmployeeController@getAdd'),
(118,'employee','edit','Edit','GET','panel/employee/edit/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\EmployeeController@getEdit'),
(119,'employee','save','Save','POST','panel/employee/save/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\EmployeeController@postSave'),
(120,'employee','edit','Edit','POST','panel/employee/edit/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\EmployeeController@postEdit'),
(121,'employee','delete','Delete','GET','panel/employee/delete/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\EmployeeController@getDelete'),
(122,'task','index','Index','GET','panel/task/index/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\TaskController@getIndex'),
(123,'task','add','Add','GET','panel/task/add/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\TaskController@getAdd'),
(124,'task','edit','Edit','GET','panel/task/edit/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\TaskController@getEdit'),
(125,'task','save','Save','POST','panel/task/save/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\TaskController@postSave'),
(126,'task','edit','Edit','POST','panel/task/edit/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\TaskController@postEdit'),
(127,'task','delete','Delete','GET','panel/task/delete/{one?}/{two?}/{three?}/{four?}/{five?}','App\\Http\\Controllers\\Admin\\TaskController@getDelete');

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','non active') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Male',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `employees` */

insert  into `employees`(`id`,`nip`,`name`,`status`,`email`,`photo`,`birth`,`gender`,`address`,`created_at`,`updated_at`) values 
(41,'434556','cvbvbvvn','active','calonmilyarder01@gmail.com','1505120200706231544.jpg','2020-07-01','Male','sdfsdgfdg','2020-07-06 23:15:44','2020-07-06 23:15:44'),
(42,'5464546','cdggghhgjhrrrrrrrrrrrrr','active','calonmilyarder04@gmail.com','3792320200706233235.jpg','2020-07-04','','fdgfd','2020-07-06 23:18:12','2020-07-06 23:32:58'),
(43,'839458945','nsmasnma','active','calonmilyarder03@gmail.com','7821020200707001545.jpg','2020-07-02','Male','sdakdsj','2020-07-07 00:15:45','2020-07-07 00:15:45');

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `groups` */

insert  into `groups`(`id`,`group_name`,`group_description`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,'Superadmin','List data group superadmin','machine',NULL,'2018-08-28 22:25:52','2018-08-28 22:25:52'),
(7,'Employee','Group for Employee','Admin System','Admin System','2020-04-09 22:11:21','2020-07-05 13:16:47'),
(8,'Admin','group for admin','Admin System',NULL,'2020-07-06 23:57:04','2020-07-06 23:57:04');

/*Table structure for table `languages` */

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','non active') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'non active',
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `languages` */

insert  into `languages`(`id`,`lang_name`,`lang_code`,`lang_image`,`status`,`created_by`,`created_at`,`updated_at`) values 
(1,'English','en',NULL,'active','machine','2018-08-28 22:25:52','2018-08-28 22:25:52'),
(2,'Indonesia','id',NULL,'active','machine','2018-08-28 22:25:52','2018-08-28 22:25:52');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values 
('2016_02_22_094200_create_groups_table',1),
('2016_02_22_094236_create_users_table',1),
('2016_02_22_094301_create_password_resets_table',1),
('2016_02_22_094322_create_languages_table',1),
('2016_02_22_094340_create_class_function_table',1),
('2016_02_22_094351_create_role_access_table',1),
('2016_02_22_094405_create_sitesetting_table',1),
('2020_07_04_213403_create_employees_table',2),
('2020_07_05_185749_create_tasks_table',3);

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(100) DEFAULT NULL,
  `slug_en` varchar(100) DEFAULT NULL,
  `content_en` longtext DEFAULT NULL,
  `title_ru` varchar(100) DEFAULT NULL,
  `slug_ru` varchar(100) DEFAULT NULL,
  `content_ru` longtext DEFAULT NULL,
  `title_sa` varchar(100) DEFAULT NULL,
  `slug_sa` varchar(100) DEFAULT NULL,
  `content_sa` longtext DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pages` */

insert  into `pages`(`id`,`title_en`,`slug_en`,`content_en`,`title_ru`,`slug_ru`,`content_ru`,`title_sa`,`slug_sa`,`content_sa`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,'About Us','about-us','PURA started as early as 1908 when the company was still a letterpress printing shop. Then in 1970, the third generation initiated a steady movement to develop the company into the renowned Pura Group, a modern corporation as we see today. PURA has been living the philosophy of producing special innovative products as import substitute for local market and export commodity for international market. After more than four decades, PURA now has become an expansive industrial group with 30 integrated production divisions built on over 100-hectare area, accommodating 13,000 workforces, exporting products to more than 90 countries.<br />\r\n<br />\r\nWe are private-owned company with the most patents in Indonesia. PURA has registered many of its innovations into more than 190 patents and more coming in the future.<br />\r\n<br />\r\nPURA&#39;s wide arrays of products support people activities in personal, professional, and industrial scope. Find more about our complete product range here.','насчет нас','насчет-нас','<span class=\"tlid-translation translation\" lang=\"ru\"><span title=\"\">PURA началась еще в 1908 году, когда компания еще была типографией.</span> <span title=\"\">Затем, в 1970 году, третье поколение инициировало устойчивое движение для превращения компании в известную Pura Group, современную корпорацию, как мы видим сегодня.</span> <span title=\"\">PURA придерживается философии производства специальных инновационных продуктов в качестве заменителя импорта для местного рынка и экспорта товаров на международный рынок.</span> <span title=\"\">По прошествии более четырех десятилетий PURA превратилась в обширную промышленную группу с 30 интегрированными производственными подразделениями, расположенными на площади более 100 гектаров, в которой размещается 13 000 человек, экспортирующих продукцию в более чем 90 стран.</span><br />\r\n<br />\r\n<span title=\"\">Мы являемся частной компанией с большинством патентов в Индонезии.</span> <span title=\"\">PURA зарегистрировала многие из своих инноваций в более чем 190 патентах и более в будущем.</span><br />\r\n<br />\r\n<span title=\"\">Широкий ассортимент продуктов PURA поддерживает деятельность людей в личном, профессиональном и промышленном масштабе.</span> <span title=\"\">Узнайте больше о нашем полном ассортименте продукции здесь.</span></span>','معلومات عنا','معلوما- عنا','<span class=\"tlid-translation translation\" lang=\"ar\"><span title=\"\">بدأت PURA في وقت مبكر من عام 1908 عندما كانت الشركة لا تزال محل طباعة الحروف.</span> <span title=\"\">ثم في عام 1970 ، بدأ الجيل الثالث حركة ثابتة لتطوير الشركة إلى مجموعة Pura الشهيرة ، وهي شركة حديثة كما نرى اليوم.</span> <span title=\"\">كانت PURA تعيش فلسفة إنتاج منتجات مبتكرة خاصة كبديل للاستيراد للسوق المحلية وسلع التصدير للسوق الدولية.</span> <span title=\"\">بعد أكثر من أربعة عقود ، أصبحت PURA الآن مجموعة صناعية موسعة مع 30 قسم إنتاج متكامل مبني على مساحة 100 هكتار ، يستوعب 13000 من القوى العاملة ، وتصدير المنتجات إلى أكثر من 90 دولة.</span><br />\r\n<br />\r\n<span title=\"\">نحن شركة مملوكة للقطاع الخاص مع أكثر براءات الاختراع في إندونيسيا.</span> <span title=\"\">سجلت PURA العديد من ابتكاراتها في أكثر من 190 براءة اختراع وأكثر في المستقبل.</span><br />\r\n<br />\r\n<span title=\"\">تدعم مجموعة كبيرة من منتجات PURA أنشطة الأشخاص في النطاق الشخصي والمهني والصناعي.</span> <span title=\"\">تعرف على المزيد حول مجموعة منتجاتنا الكاملة هنا.</span></span>','Admin System','Admin System','2020-04-15 07:48:36','2020-04-15 07:54:07'),
(4,'Page Good','page-good','The primary staffs of Aura Sinarindo bring a history and capability of over 20 years of electrical experience to bear including many strategic alliances with world known electrical industry capabilities. Our staff is genuinely concerned to insure our clients are totally satisfied with services, product quality, timely delivery, and competitive pricing for the full range of products available. This total commitment to our customers is the cornerstone of our business and capabilities.','хорошие новости','khoroshie-novosti','<span title=\"\">Основные сотрудники Aura Sinarindo имеют более чем 20-летний опыт работы в области электротехники, включая многие стратегические альянсы с всемирно известными возможностями в области электротехники.</span>&nbsp;<span title=\"\">Наш персонал искренне заинтересован в том, чтобы наши клиенты были полностью удовлетворены услугами, качеством продукции, своевременной доставкой и конкурентоспособными ценами на весь доступный ассортимент.</span>&nbsp;<span title=\"\">Эта полная приверженность нашим клиентам является краеугольным камнем нашего бизнеса и возможностей.</span>','صفحة جيدة','','<span title=\"\">يجلب الموظفون الأساسيون في&nbsp; تاريخًا وقدرة لأكثر من 20 عامًا من الخبرة الكهربائية لتحملها بما في ذلك العديد من التحالفات الاستراتيجية مع قدرات الصناعة الكهربائية العالمية المعروفة.</span>&nbsp;<span title=\"\">إن موظفينا مهتمون بصدق لضمان رضا عملائنا تمامًا عن الخدمات ، وجودة المنتج ، والتسليم في الوقت المناسب ، والتسعير التنافسي لمجموعة كاملة من المنتجات المتاحة.</span>&nbsp;<span title=\"\">هذا الالتزام التام لعملائنا هو حجر الزاوية في أعمالنا وقدراتنا.</span>','Admin System',NULL,'2020-04-19 12:19:10','2020-04-19 00:19:10');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `password_resets_email_index` (`email`) COMMENT '(null)',
  KEY `password_resets_token_index` (`token`) COMMENT '(null)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `password_resets` */

/*Table structure for table `role_access` */

DROP TABLE IF EXISTS `role_access`;

CREATE TABLE `role_access` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_group` int(10) unsigned NOT NULL,
  `id_access` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_access_id_group_foreign` (`id_group`) COMMENT '(null)',
  KEY `role_access_id_access_foreign` (`id_access`) COMMENT '(null)',
  CONSTRAINT `role_access_id_access_foreign` FOREIGN KEY (`id_access`) REFERENCES `classfunction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_access_id_group_foreign` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=923 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `role_access` */

insert  into `role_access`(`id`,`description`,`id_group`,`id_access`) values 
(908,NULL,7,122),
(909,NULL,7,124),
(910,NULL,7,126),
(911,NULL,8,116),
(912,NULL,8,117),
(913,NULL,8,118),
(914,NULL,8,119),
(915,NULL,8,120),
(916,NULL,8,121),
(917,NULL,8,122),
(918,NULL,8,123),
(919,NULL,8,124),
(920,NULL,8,125),
(921,NULL,8,126),
(922,NULL,8,127);

/*Table structure for table `sitesetting` */

DROP TABLE IF EXISTS `sitesetting`;

CREATE TABLE `sitesetting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `favicon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `maps` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `sitesetting` */

insert  into `sitesetting`(`id`,`favicon`,`author`,`title`,`keywords`,`description`,`logo`,`image`,`banner`,`video`,`email`,`phone`,`facebook`,`twitter`,`gplus`,`address`,`maps`,`footer`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,'favicon.ico','Admin System','Profile Official Website','Official Website','Profile Official Website','logo.png','image.jpg','banner.jpg','','adminsystem@gmail.com','','','','','','','© 2019 all right reserved. | Developed by @bayunuriman','machine',NULL,'2018-08-28 22:25:52','2019-10-13 18:10:45');

/*Table structure for table `tasks` */

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_employee` bigint(20) unsigned NOT NULL,
  `status_task` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `task` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `information` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tasks` */

insert  into `tasks`(`id`,`date`,`id_employee`,`status_task`,`task`,`information`,`latitude`,`longitude`,`created_at`,`updated_at`) values 
(5,'2020-07-03',43,'Waiting','kjdooookkkees','hhgjhgjss','-6.246107234666687','106.81985236502015','2020-07-06 23:37:09','2020-07-07 00:23:45');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expired_start` datetime DEFAULT NULL,
  `expired_end` datetime DEFAULT NULL,
  `status` enum('active','non active') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `id_jobgroup` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_group` int(10) unsigned NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `CL_ID` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) COMMENT '(null)',
  UNIQUE KEY `users_username_unique` (`username`) COMMENT '(null)',
  KEY `users_id_group_foreign` (`id_group`) COMMENT '(null)',
  CONSTRAINT `users_id_group_foreign` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `users` */

insert  into `users`(`id`,`fullname`,`name`,`email`,`username`,`password`,`image`,`token`,`expired_start`,`expired_end`,`status`,`id_jobgroup`,`id_group`,`created_by`,`updated_by`,`remember_token`,`created_at`,`updated_at`,`CL_ID`) values 
(1,'Admin System','Administrator','adminsystem@gmail.com','adminsystem','$2y$10$Hv5LMK9JWzCThZ1YHrvv8ukJCogQeT20QDtJ3Cy2YBfb82/I7cDj2','user.jpg',NULL,NULL,NULL,'active',NULL,1,'machine',NULL,NULL,'2018-08-28 22:25:52','2018-08-28 22:25:52',0),
(76,'cvbvbvvn','cvbvbvvn','calonmilyarder01@gmail.com','cvbvbvvn','$2y$10$T1UVWbwKSEDrjYEg4X0.Me9oOQ9qNqxoSQjznuHsVOZc2XT.uD6oS','1505120200706231544.jpg',NULL,NULL,NULL,'active',NULL,7,'Admin System',NULL,NULL,'2020-07-06 23:15:44','2020-07-06 23:15:44',0),
(77,'cdggghhgjhrrrrrrrrrrrrr','cdggghhgjhrrrrrrrrrrrrr','calonmilyarder04@gmail.com','cdggghhgjhrrrrrrrrrrrrr','$2y$10$tJpoIBVlRwT8aUuVBP4gU.pipOAaJzLLv2IXmeeMscdTYWWeYWGTC','',NULL,NULL,NULL,'active',NULL,7,'Admin System',NULL,NULL,'2020-07-06 23:18:12','2020-07-06 23:32:58',0),
(78,'Administrator','','administrator@gmail.com','administrator','$2y$10$J/vCiGP5.wmpZ1G6IMpdIOaxkioCD/4EgcsS160mfX5RU6xWtLj4C',NULL,NULL,NULL,NULL,'active',NULL,8,'Admin System',NULL,NULL,'2020-07-06 23:58:08','2020-07-06 23:58:08',0),
(79,'nsmasnma','nsmasnma','calonmilyarder03@gmail.com','nsmasnma','$2y$10$N.na/39qUGARJwF524q.JeeUatKaYB6.DRdWI/G/ma4m1VYBJIHSm','7821020200707001545.jpg',NULL,NULL,NULL,'active',NULL,7,'Admin System',NULL,NULL,'2020-07-07 00:15:45','2020-07-07 00:15:45',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
