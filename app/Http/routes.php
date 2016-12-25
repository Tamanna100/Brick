<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('public.home');

})->name('welcome');











Route::group(['middleware' => 'auth'], function() {
	    
	//================employee route================
	Route::resource('employees', 'EmployeeController');

	//================product route================
	Route::resource('products', 'ProductController');


	//================factory route================
	Route::resource('factories', 'FactoryController');

	//================order route================
	Route::resource('orders', 'OrderController');

	//================customer route================
	Route::resource('customers', 'CustomerController');


	// ==========client============
	Route::get('/makeOrder',[
'uses'=>'PublicController@getMakeOrder',
'as'=>'client.makeOrder'
]);

Route::post('/makeOrder/post',[
'uses'=>'PublicController@postMakeOrder',
'as'=>'client.postMakeOrder'
]);
		
});
   

 Route::group(['middleware' => 'guest'], function() {
     

// =============contact route=============



Route::get('/contact', function () {
    return view('public.contactUs');

})->name('public.contact');


				
Route::post('/contact/post',[
'uses'=>'PublicController@postContact',
'as'=>'public.postContact'

]);


Route::get('/service', function () {
    return view('public.service');

})->name('public.service');


Route::get('/home', function() {
   return view('public.home');
})->name('public.home');

Route::get('/product',[
'uses'=>'PublicController@showProduct',
'as'=>'public.product'

]);






 });



				





//========admin=========

Route::group(['prefix' => 'admin'], function() {

	Route::group(['middleware' => 'auth'], function() {
	    
		Route::get('/dashboard','UserController@getAdminProfile')->name('admin.dashboard');
		



	});
   
        
});



//========investor=========

Route::group(['prefix' => 'investor'], function() {

	Route::group(['middleware' => 'auth'], function() {
	    
		Route::get('/profile','UserController@getInvestorProfile')->name('investor.profile');




	});
   
        
});


//========client=========

Route::group(['prefix' => 'client'], function() {

	Route::group(['middleware' => 'auth'], function() {
	    
		Route::get('/profile','UserController@getClientProfile')->name('client.profile');




	});
   
        
});










//===================all users sign up and sign in and log out============
Route::group(['prefix' => 'user'], function() {

	Route::group(['middleware' => 'guest'], function() {
				Route::get('/signup',[
				'uses'=>'UserController@getSignup',
				'as'=>'user.signup'

				]);

				Route::post('/signup',[
				'uses'=>'UserController@postSignup',
				'as'=>'user.signup'

				]);


				Route::get('/signin',[
				'uses'=>'UserController@getSignin',
				'as'=>'user.signin'

				]);

				Route::post('/signin',[
				'uses'=>'UserController@postSignin',
				'as'=>'user.signin'

				]);






	});



	Route::group(['middleware' => 'auth'], function() {

			Route::get('/logout',[
			'uses'=>'UserController@getLogout',
			'as'=>'user.logout'
			]);

				Route::get('/dashboard','UserController@getAdminProfile')->name('admin.dashboard');

				Route::get('/profile','UserController@getInvestorProfile')->name('investor.profile');

				



	});

});