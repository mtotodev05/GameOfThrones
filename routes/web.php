<?php
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
Route::get('/got',[
    'middleware' => ['auth'],
    'uses' =>function(){
        echo" You are Allowed to View This Page";
    }
]);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout',function(){
   Auth::logout();
   return redirect('/');
});
Route::get('/','ListController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('role',[
    'middleware' =>'role::editor',
    'uses'=>'TestController@index',
    ]);

Route::get('terminate',[
    'middleware' => 'terminate',
    'uses' => "TestController@testTerminateController",
]);
Route::get('profile',[
   'middleware' => 'auth',
   'uses'=> 'UserController@showProfile'
]);

Route::get('/usercontroller/path',[
   'middleware'=> 'first',
   'uses' => 'UserController@showProfile'
]);
