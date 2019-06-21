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



Route::get('/',['as'=>'home',function(){
    return '홈 리다이렉트 루트';
}]);

Route::get('/home',function (){
   return redirect(route('home'));
});