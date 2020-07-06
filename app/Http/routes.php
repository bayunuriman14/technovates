<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    	
	Route::controller('auth','AuthController');

	//API
	Route::controller('/apiv1', 'Api\ApiController');

	
	Route::group(["prefix" => "panel" , "middleware" => 'authlogin'], function() 
	{
		Route::group(["middleware" => 'acl'], function() 
		{
			Route::controller('users', 'Admin\UserController');
			Route::controller('groups', 'Admin\GroupController');
			Route::controller('class_function', 'Admin\ClassfunctionController');
			Route::controller('role_access', 'Admin\RoleaccessController');
			Route::controller('setting', 'Admin\SettingController');
			Route::controller('employee', 'Admin\EmployeeController');
			Route::controller('task', 'Admin\TaskController');

		});
		Route::controller('/', 'Admin\HomeController');
	});
});

// Route::get('/', [
//     'as'      => 'home',
//     'uses'    => 'HomeController@index'
// ]);


// Route::get('/{lang}', [
//     'as'      => 'home',
//     'uses'    => 'HomeController@index'
// ]);


// // Route::get('{menu}', [
// //     'uses' => 'HomeController@getMenu' 
// // ])->where('menu', '([A-ZА-Яa-zа-я0-9\-\/]+)');


// Route::get('/{lang}/{menu}', [
//     'uses' => 'HomeController@getMenu' 
// ]);

// Route::get('/{lang}/{menu}/{slug}', [
//     'uses' => 'HomeController@getMenu' 
// ]);

// // Route::get('{menu}', [
// //     'uses' => 'HomeController@getMenu' 
// // ])->where('menu', '([A-ZА-Яa-zа-я0-9\-\/]+)');

// // ->where('menu', '([A-Za-z0-9\-\/]+)')

// Route::get('lang/{language}', 'LocalizationController@switch')->name('localization.switch');

// Route::post("gantibahasa", "BahasaController@changeLanguage");

// Route::get('/product', function () {
// 	return view('front.product');
// });

// Route::get('/gallery', function () {
// 	return view('front.gallery');
// });

// Route::get('/about', function () {
// 	return view('front.about');
// });

// //Idk how to place the code but maybe it look like this
// Route::get('/products/{productId}', function() {
// 	//Should be something fill here
// });

// //And also for gallery the code may look like this
// Route::get('/gallery/{eventId}', function(){
// 	//shoulbe be sommething fill here
// });

// Route::post("gantibahasa", "BahasaController@changeLanguage");


