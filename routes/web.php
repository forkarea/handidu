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
    $things = Thing::all()->sortByDesc('created_at')->take(8);
    $posts = Post::all()->sortByDesc('created_at')->take(3);
    return view('index', [
        'things' => $things,
        'posts' => $posts
    ]);
});

Route::get('/gallery/{user}/{slug}/edit', function ($username, $slug) {
    if((!$user = User::where('username', $username)->first()) || (!$thing = Thing::where(['slug' => $slug])->first()))
        abort(404);
    return view('thing_edit', ['thing' => $thing]);
})->name('thing_edit_page')->middleware('auth');

Route::get('/gallery/{user}/{slug}', function ($username, $slug) {
    if((!$user = User::where('username', $username)->first()) || (!$thing = Thing::where(['slug' => $slug])->first()))
        abort(404);
    
    return view('thing', ['thing' => $thing]);
})->name('thing');

Route::get('/gallery/{user}', function ($user) {
    return redirect(route('user', ['username' => $user]));
});

Route::get('/category/{slug}', function ($slug) {
    if(!$category = Category::where('slug',$slug)->first())
        abort(404);
    return view('category', ['category' => $category]);
})->name('category');

Route::get('/posts', function () {
    $posts = Post::all()->sortByDesc('created_at')->take(100);
    return view('posts', ['posts' => $posts]);
})->name('posts');

Route::post('/posts', 'PostController@store')->middleware('auth');

Route::get('/profile/{username}', function ($username) {
    if(!$user = User::where(['username' => $username])->first())
        abort(404);
    return view('profile', ['user' => $user]);
})->name('user');

Route::get('/add-thing', function () {
    return view('add_thing');
})->name('add-thing')->middleware('auth');

Route::post('/comments', 'CommentController@store')->name('post_comment')->middleware('auth');

Route::post('/things', 'ThingController@store')->name('post_thing')->middleware('auth');

Route::post('/thing/{id}', 'ThingController@update')->name('update_thing')->middleware('auth');

Auth::routes();
