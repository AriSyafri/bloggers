
<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('home', [
        'title' => 'Home Page',
        'posts' => Post::latest()->take(3)->get(),
        'categories' => Category::get()

    ]);
});

Route::get('/about', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }

    $query = Post::where('author_id', Auth::user()->id);
    $posts = $query->latest()->paginate(6);

    return view('about', [
        'name' => 'Ari Syafri',
        'title' => 'About',
        'posts' => $posts
    ]);

});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Posts',
        'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString()
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


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::get('/register/checkSlugUser', [RegisterController::class, 'checkSlugUser']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');




// Route::get('/dashboard/posts', function () {
//     return view('dashboard.posts.index', ['title' => 'Posts']);
// });
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::get('/dashboard/categories/checkSlugCategory', [AdminCategoryController::class, 'checkSlugCategory'])->middleware('admin');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/users/checkSlugUser', [AdminUserController::class, 'checkSlugUser']);
Route::resource('/dashboard/users', AdminUserController::class)->except('show')->middleware('auth');
