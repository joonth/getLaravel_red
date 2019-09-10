<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ArticlesController as ParentController;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticlesController extends ParentController
{

   public function __construct()
   {
       parent::__construct();
       $this->middleware = [];
       $this->middleware('auth.basic.once',['except'=>['index','show','tags']]);
   }

   protected function respondCreated(\App\Article $article){
       return response()->json(
         ['success'=> 'created'],
           201,
           ['Location'=>'생성한_리소소의_상세보기_API_엔드포인'],
           JSON_PRETTY_PRINT
       );
   }


    protected function respondCollection(LengthAwarePaginator $articles){
        return $articles->toJson(JSON_PRETTY_PRINT);
    }

   public function tags(){
       return \App\Tag::all();
   }



}
