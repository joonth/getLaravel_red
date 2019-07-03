<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = \App\Article::latest()->paginate(3);
        dd(view('articles.index',compact('articles'))->render());
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
       /* $rules = [
          'title' => ['required'],
          'content' => ['required','min:10'],
        ];

        $messages = [
          'title.required' => '제목은 필수 입력 항목입니다.',
          'content.required' => '본문은 필수 입력 항목입니다.',
          'content.min' => '본문은 최소 :min 글자 이상이 필요합니다.',
        ];

        $validator = \Validator::make($request->all(), $rules,$messages);

        if($validator -> fails()){
            return back()->withErrors($validator)
                ->withInput();
        }

        $this ->validate($request, $rules, $messages);
        $article = \App\User::find(1) -> artiles() -> create($request->all());

        if(!$article){
            return back()->with('flash_message','글이 저장되지 않았습니다.')
                ->withInput();
        }
        return redirect(route('articles.index'))
        ->with('flash_message','작성하신 글이 저장되었습니다.');*/

       $article = \App\User::find(1)->articles()->create($request -> all());
       if(! $article){
           return back()->with('flash_message','글이 저장되지 않았습니다.')
               ->withInput();
       }


       event(new \App\Events\ArticlesEvent($article));


       return redirect(route('articles.index'))->with('flash_message','작성하신 글이 저장되었습니다.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $article = \App\Article::findOrFail($id);
        dd($article);
       return $article->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return __method__ . '다음 기본 키를 가진 article 모델을 수정하기 위한 폼을 담은 뷰를 반환' . $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return __method__ . '사용자의 입력한 폼 데이터로 다음 기본 키를 가진 article 모델을 수정'.$id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return __method__ .'다음 기본 키를 가진 article 모델을 삭제' . $id;
    }
}
