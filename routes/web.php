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

use App\Thing;
use App\Category;
use App\Post;
use App\User;

Route::get('/', function () {
    $things = Thing::all()->take(8);
    $categories = Category::all();
    $posts = Post::all()->take(3);
    return view('welcome', [
        'things' => $things,
        'categories' => $categories,
        'posts' => $posts
    ]);
});

Route::get('/gallery/{user}/{slug}', function ($user, $slug) {
    dd($slug);
})->name('thing');

Route::get('/category/{slug}', function ($slug) {
    $category = Category::where('slug',$slug)->first();
    dd($category->things);
})->name('category');

Route::get('/posts', function () {
    dd(Post::all());
})->name('posts');

Route::get('/profile/{username}', function ($username) {
    $user = User::where(['username' => $username])->first();
    dd($user);
})->name('user');

Auth::routes();
