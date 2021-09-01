<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/blog', function () {
    return view('blog');
});

Route::get('blog/posts/{postName}', function($postName){
    $path = __DIR__."/../resources/posts/{$postName}.html";
    if(!file_exists($path)){
        abort(404);
    }
    $post = file_get_contents($path);

    return view('post', [
        'post'=>$post
    ]);
});