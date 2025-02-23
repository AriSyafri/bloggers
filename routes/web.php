
<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', [
        'name' => 'Ari Syafri',
        'title' => 'About'
    ]);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Posts',
        'posts' => [
            [
                'id' => 1,
                'title' => 'Judul artikel 1',
                'author' => 'Ari Syafri',
                'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque eum ut, modi in reprehenderit voluptatem repellendus quam suscipit earum nobis aut unde provident quae, officia nam tempora dolor, non saepe rerum? Voluptas facere ab quaerat esse nulla, quo velit magnam quisquam aliquid, autem deleniti sed possimus? Inventore doloribus, autem exercitationem officiis ducimus debitis sapiente quia quod praesentium, itaque repellat non consectetur sit dolores sint eaque beatae suscipit, optio natus consequatur!'
            ],
            [
                'id' => 2,
                'title' => 'Judul artikel 2',
                'author' => 'Ari',
                'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. fafafafffaEaque eum ut, modi in reprehenderit voluptatem repellendus quam suscipit earum nobis aut unde provident quae, officia nam tempora dolor, non saepe rerum? Voluptas facere ab quaerat esse nulla, quo velit magnam quisquam aliquid, autem deleniti sed possimus? '
            ]

        ]
    ]);
});


Route::get('/posts/{id}', function($id) {
    $posts = [
        [
            'id' => 1,
            'title' => 'Judul artikel 1',
            'author' => 'Ari Syafri',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque eum ut, modi in reprehenderit voluptatem repellendus quam suscipit earum nobis aut unde provident quae, officia nam tempora dolor, non saepe rerum? Voluptas facere ab quaerat esse nulla, quo velit magnam quisquam aliquid, autem deleniti sed possimus? Inventore doloribus, autem exercitationem officiis ducimus debitis sapiente quia quod praesentium, itaque repellat non consectetur sit dolores sint eaque beatae suscipit, optio natus consequatur!'
        ],
        [
            'id' => 2,
            'title' => 'Judul artikel 2',
            'author' => 'Ari',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. fafafafffaEaque eum ut, modi in reprehenderit voluptatem repellendus quam suscipit earum nobis aut unde provident quae, officia nam tempora dolor, non saepe rerum? Voluptas facere ab quaerat esse nulla, quo velit magnam quisquam aliquid, autem deleniti sed possimus? '
        ]
    ];

    $post = Arr::first($posts, function ($post) use ($id) {
        return $post['id'] == $id;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);

});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
