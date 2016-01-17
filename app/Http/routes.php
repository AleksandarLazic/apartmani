<?php
// Route::get('/', function() {
//  $u = new App\Admin;
//  $u->username = 'admin';
//  $u->password = Hash::make('admin');
//  $u->save();
// });
Route::group(['middleware' => ['web']], function () {
    
    Route::get('/admin/login', [
  		'as' 	=> 'login.get',
  		'uses' 	=> 'AuthController@index'
  	]);

    Route::post('admin/login', [
        'as'  => 'login.post',
        'uses'  => 'AuthController@loginPost'
     ]);

  });
  
  Route::group(['middleware' => ['web', 'auth']], function() {
     
     Route::get('admin/logout', [
        'as'    => 'logout.get',
        'uses'  => 'AuthController@logout'
      ]);

     Route::get('admin/panel', [
        'as'    => 'panel.get',
        'uses'  => 'AdminController@index'
      ]);

     Route::get('admin/reservation', [
        'as'    => 'reservation.get',
        'uses'  => 'AdminController@reservation'
      ]);


     //api routes

      Route::post('api/addApartment', [
        'as'    => 'addApartment.post',
        'uses'  => 'ApiController@addApartment'
      ]);

      Route::get('api/selectAllApartments', [
        'as'    => 'selectAllApartments.get',
        'uses'  => 'ApiController@getAppartments'
      ]);
  
  });
