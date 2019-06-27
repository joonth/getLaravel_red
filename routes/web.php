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

/*
Route::get('/', function (){
   return view('welcome')->with([
       'name'=>'foo',
       'greeting'=>'안녕',
   ]) ;
});

*/

/*
Route::get('/',function (){
   return view('welcome',[
       'name'=> 'fff',
       'greeting' => '안녀엉',
   ]);
});*/
/*
Route::get('/',function (){
   $items = ['apple','banana','tomato'];
   return view('welcome',['items' => $items]);
});*/

Route::get('/',function (){
   return view('welcome');
});