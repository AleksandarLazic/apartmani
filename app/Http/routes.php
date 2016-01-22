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

   Route::get('admin/', [
      'as'    => 'panel.get',
      'uses'  => 'AdminController@index'
    ]);

   Route::get('admin/reservation', [
      'as'    => 'reservation.get',
      'uses'  => 'AdminController@reservation'
    ]);

   Route::get('admin/apartmentAcc/{id}', [
      'as'    => 'apartmentAcc.get',
      'uses'  => 'AdminController@accessories'
    ]);


    //api routes

    Route::get('/admin/{name}', function($name) {
      $view_path = 'admin.' . $name;
      if(view()->exists($view_path))
        return view($view_path);
      else 
        App::abort(404, 'error');
    });

    Route::post('api/addApartment', [
      'as'    => 'addApartment.post',
      'uses'  => 'ApiController@addApartment'
    ]);

    Route::post('api/addAccessories', [
      'as'    => 'addAccessories.post',
      'uses'  => 'ApiController@addAccessories'
    ]);

    Route::post('api/editApartment', [
      'as'    => 'editApartment.post',
      'uses'  => 'ApiController@editApartment'
    ]);

    Route::post('api/addImages', [
      'as'    => 'addImages.post',
      'uses'  => 'ApiController@addImages'
    ]);

    Route::get('api/selectAccessories/{id}', [
      'as'    => 'selectAccessories.get',
      'uses'  => 'ApiController@selectAccessories'
    ]);

    Route::get('api/deleteApartment/{id}', [
      'as'    => 'deleteApartment.get',
      'uses'  => 'ApiController@deleteApartment'
    ]);

    Route::get('api/selectAllApartments', [
      'as'    => 'selectAllApartments.get',
      'uses'  => 'ApiController@getAppartments'
    ]);

});
