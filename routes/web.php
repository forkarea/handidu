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

Route::get('/', function () {
    $things = App\Thing::all();
    $categories = App\Category::all();
    return view('welcome', [
        'things' => $things,
        'categories' => $categories
    ]);
});

Route::get('/gallery/{slug}', function () {
    return view('welcome');
});
