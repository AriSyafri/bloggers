
<?php

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
            'title' => 'Judul artikel 1',
            'author' => 'Ari Syafri',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque eum ut, modi in reprehenderit voluptatem repellendus quam suscipit earum nobis aut unde provident quae, officia nam tempora dolor, non saepe rerum? Voluptas facere ab quaerat esse nulla, quo velit magnam quisquam aliquid, autem deleniti sed possimus? Inventore doloribus, autem exercitationem officiis ducimus debitis sapiente quia quod praesentium, itaque repellat non consectetur sit dolores sint eaque beatae suscipit, optio natus consequatur!'
        ],
        [
            'title' => 'Judul artikel 2',
            'author' => 'Ari Syafri',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque eum ut, modi in reprehenderit voluptatem repellendus quam suscipit earum nobis aut unde provident quae, officia nam tempora dolor, non saepe rerum? Voluptas facere ab quaerat esse nulla, quo velit magnam quisquam aliquid, autem deleniti sed possimus? '
        ]
    ]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
