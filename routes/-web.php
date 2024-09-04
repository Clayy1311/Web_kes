<?php
use App\Models\Post;
use Illuminate\Support\Arr;
use App\Models\Artikel;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
route::get('/posts', function() {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
    
});

route::get('/posts/{post:slug}', function( Post $post)
{
  
   return view('post', ['title' => 'single-post', 'post' => $post]);
}); 
