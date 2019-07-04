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


/*Event::listen('article.created',function ($article){
  dump('이벤트를 받았습니다. 받은 데이터(상태)는 다음과 같습니다.');
  dump($article->toArray());
});*/



/*DB::listen(function ($query){
   dump($query);
});*/

Route::get('mail',function (){
   $article = App\Article::with('user')->find(1);

   return Mail::send(
       'emails.articles.created',
       compact('article'),
       function ($message) use ($article){
        /*   $message->from('joonthy@gmail.com','joon');
           $message -> to('joonthy@gmail.com','joonthy@gmail.com');
           $message->subject('새 글이 등록되었습니다 - ' . $article->title);
           $message->cc('joonthy@gmail.com');
           $message->attach(storage_path('end상단.png'));*/
        $message->to('joonthy@gmail.com');
        $message->subject('새글 등록 ' . $article->title );
       }
   );
});