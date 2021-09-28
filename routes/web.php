<?php

use App\Models\Category;
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

//get all post
Route::get('/', function () {
    return view('blog',[
        //Find all post and pass it to view called blog
        'posts' => Post::with(['category', 'user'])->get()
    ]);
});

//Get one post by it's slug
Route::get('posts/{post:slug}', function(Post $post){
    return view('post', [
        //Find a post by slug and pass it to view called post
        'post' => $post
    ]);
});

//Get all post associated with category
Route::get('/category/{category:name}', function(Category $category){
    return view('blog',[
        //Find all post associated with category and pass it to view called blog
        'posts' => $category->posts
    ]);
});