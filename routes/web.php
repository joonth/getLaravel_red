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

/*Route::get('/',function (){
   return view('welcome');
});*/

Route::get('/','WelcomeController@index');

Route::resource('articles','ArticlesController');






Route::get('/','WelcomeController@index');
Route::get('auth/login', function (){

    $credentials = [
      'email' => 'jj',
      'password' => 'password'
    ];


    if(! auth()->attempt($credentials)){
        return '로그인 정보가 정확하지 않습니다.';
    }

    return redirect('protected');
});

Route::get('protected',function (){
  

   return '어서오세요' . auth()->user()->name;
});

Route::get('auth/logout',function (){
   auth()->logout();
   return '잘 가요';
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*DB::listen(function ($query){
   dump($query);
});*/