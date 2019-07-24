<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\ArticlesEvent::class =>[
            \App\Listeners\ArticlesEventListener::class,
            ],
        \Illuminate\Auth\Events\Login::class => [
          \App\Listeners\UsersEventListener::class
        ],
        \App\Events\CommentsEvent::class =>[
          \App\Listeners\CommentsEventListener::class,
        ],
        \App\Events\ModelChanged::class => [
          \App\Listeners\CacheHandler::class,
        ],
    ];

    protected $subscribe = [
      \App\Listeners\UsersEventListener::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        \Event::listen(
            \App\Events\ArticleCreated::class,
            \App\Listeners\ArticleEventListener::Class
        );

        //
    }
}
