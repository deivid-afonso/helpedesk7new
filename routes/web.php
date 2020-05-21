<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('Place', 'LabsController');


// $user = new \App\User(); add user  modo active record
// $user->name = 'Deivid';
// $user->email = 'deividsa@gmail.com';
// $user->password = bcrypt('123456');
// $user->save();
 //return \App\User::all();

 //tste rota adm

 

// Route::prefix('admin')->namespace('Admin')->group(function(){
//     Route::prefix('users')->group(function(){
//         Route::get('/', 'UserController@index')->name('admin.users.index');
//         Route::get('/create', 'UserController@create')->name('admin.users.create');
//         Route::post('/store', 'UserController@store')->name('admin.users.store');
//         Route::get('/{user}/edit', 'UserController@edit')->name('admin.users.edit');
//         Route::post('/update{user}', 'UserController@update')->name('admin.users.update');
//         Route::post('/destroy{user}', 'UserController@destroy')->name('admin.users.destroy');

        
//     });
// });
   



 
//  Route::get('/admin/devices', 'Admin\\DeviceController@index');
//  Route::get('/admin/devices/create', 'Admin\\DeviceController@create');
//  Route::post('/admin/devices/store', 'Admin\\DeviceController@store');

 
 
//  Route::get('/admin/occurrencestype', 'Admin\\OccurrenceTypeController@index');
//  Route::get('/admin/occurrencestype/create', 'Admin\\OccurrenceTypeController@create');
//  Route::post('/admin/occurrencestype/store', 'Admin\\OccurrenceTypeController@store');

 Route::resource('/admin/users', 'Admin\\UserController');

 Route::resource('/admin/occurrences', 'Admin\\OcurrenceController');

 Route::resource('/admin/devices', 'Admin\\DeviceController');

 Route::resource('/admin/places', 'Admin\\PlaceController');

 Route::resource('/admin/occurrencesType', 'Admin\\OccurrenceTypeController')->name('occurrences_type');

