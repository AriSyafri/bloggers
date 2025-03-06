
<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

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
    // $post = Post::with(['author', 'category'])->latest()->get();

    //dump(request('search'));

    $posts = Post::latest();

    if(request('search')) {
        $posts->where('title', 'like', '%' . request('search') . '%');
    }

    return view('posts', [
        'title' => 'Posts',
        'posts' => $posts->get()
    ]);
});


Route::get('/posts/{post:slug}', function(Post $post) {
    return view('post', ['title' => 'Single Post',
                            'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user) {
    // $posts = $user->posts->load('category', 'author');
    return view('posts', ['title' => count($user->posts) . ' Article by ' . $user->name,
                            'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category) {
    // $posts = $category->posts->load('category', 'author');
    return view('posts', ['title' => 'Articles in : ' . $category->name,
                            'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
