<?php

return [
    'api_domain'=>env('API_DOMAIN','api.myapp.dev'),
   'name' => 'My Application',
    'url'=> 'http://myapp.dev:8000',
    'description'=>'',
    'tags' =>[
        'ko'=>[
            'laravel'=>'라라벨',
            'lumen'=>'루멘',
            'general'=>'자유의견',
            'server'=>'서버',
            'tip'=>'팁',
        ],
        'en'=>[
            'laravel'=>'Laravel',
            'lumen'=>'Lumen',
            'general'=>'General',
            'server'=>'Server',
            'tip'=>'Tip',
        ],
    ],
    'sorting' =>[
        'view_count' => '조회수',
        'created_at' => '작성일',
    ],
    'cache' =>false,
    'etag'=>true,

    'mimes'=>[
        'png',
        'jpg',
        'zip',
        'tar',
    ],
    'sorting'=>[
        'view_count'=>'조회수',
        'created_at'=>'작성일',
    ],
    'locales'=>[
        'ko'=>'한국어',
        'en'=>'English',
    ],
];
