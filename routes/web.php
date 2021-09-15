<?php

use App\Models\Post;
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
    return view('blog',[
        //Find all post and pass it to view called blog
        'posts' => Post::all()
    ]);
});

Route::get('blog/posts/{postName}', function($postName){
    return view('post', [
        //Find a post by slug and pass it to view called post
        'post' => Post::findOrFail($postName)
    ]);
});