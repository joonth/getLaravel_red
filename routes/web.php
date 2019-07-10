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

Route::get('markdown',function (){
   $text = <<<EOT
# 마크다운 예제 1

이문서는 [마크다운][1]으로 썼습니다. 화면에는 HTML로 변환되어 출력됩니다.

## 순서 없는 목록

- 첫 번째 항목
- 두 번째 항목[^1]

[1]:http://daringfireball.net/projects/markdown

[^1]:두 번째 항목_ http://google.com

EOT;
    return app(ParsedownExtra::class)->text($text);
});


/*Route::get('docs/{file?}',function ($file = null){
    $text = (new App\Documentation)->get($file);
    return app(Parsedown::class)-> text($text);
});*/

Route::get('docs/{file?}','DocsController@show');

Route::get('docs/images/{image}','DocsController@image')->where('image','[\pL-\pN\._-]+-img-[0-9]{2}.png');

// Route::auth();




/* 사용자 가입 */
Route::get('auth/register',[
   'as' => 'users.create',
   'uses' => 'UsersController@create'
]);

Route::post('auth/register',[
   'as' => 'users.store',
   'uses' => 'UsersController@store'
]);

Route::get('auth/confirm/{code}',[
   'as' => 'users.confirm',
   'uses' => 'UsersController@confirm'
]);

/* 사용자 인증 */

Route::get('auth/login',[
   'as' => 'sessions.create',
   'uses' => 'SessionsController@create'
]);

Route::post('auth/login',[
   'as' => 'sessions.store',
   'uses' => 'SessionsController@store'
]);

Route::get('auth/logout',[
    'as' => 'sessions.destroy',
    'uses' => 'SessionsController@destroy'
]);


/*  비밀번호 초기화  */

Route::get('auth/remind',[
   'as' => 'remind.create',
   'uses'=> 'PasswordsController@getRemind',
]);

Route::post('auth/remind',[
   'as' => 'remind.store',
    'uses' => 'PasswordsController@postRemind',
]);

Route::get('auth/reset/{token}',[
   'as' => 'reset.create',
   'uses' => 'PasswordsController@getReset',
]);

Route::get('auth/reset/{token}',[
   'as' => 'reset.create',
   'uses' => 'PasswordsController@getReset',
])->where('token','[\pL-\pN]{64}');

Route::post('auth/reset',[
   'as' => 'reset.store',
   'uses' => 'PasswordsController@postReset',
]);

Route::get('auth/confirm/{code}',[
    'as' => 'users.confirm',
    'uses' => 'UsersController@confirm'
])->where('code','[\pL-\pN]{60}');


Route::get('social/{provider}',[
   'as' => 'social.login',
   'uses' => 'SocialController@execute',
]);