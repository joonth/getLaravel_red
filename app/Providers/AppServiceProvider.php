<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

       if($locale = request()->cookie('locale__myapp')) {
          app()->setLocale('en');
       }

        \Carbon\Carbon::setLocale(app()->getLocale());

        view()->composer('*',function($view){

           $currentLocale = app() ->getLocale();
         //  $currentUrl =request()->fullUrl();
            $currentUrl = current_url();


           $allTags = \Cache::rememberForever('tags.list',function (){
               return \App\Tag::all();
           });

           $view->with(compact('allTags','currentLocale','currentUrl'));
           $view->with('currentUser',auth()->user());
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->environment('local')){
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}
