<?php
use App\Models\Post;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Artikel;
use App\Models\Category;




Route::get('/dashboard', function () {
    return view('dashboard',['title' => 'Halaman Artikel', 'artikel' => Post::all()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', function() {
    return view('posts', ['title' => 'Blog', 'posts' => Post::take(10)->get()]);
});
require __DIR__.'/auth.php';

route::get('/posts/{post:slug}', function( Post $post)
{
  
   return view('post', ['title' => 'single-post', 'post' => $post]);
}); 
route::get('/create-artikel', function(){
    return view('artikel/create_artikel');
});

route::post('/artikelAdd', [HomeController::class, 'store'])->name('artikelAdd.store');

route::get('/delete_artikel/{data:id}',[HomeController::class, 'delete_artikel'])->name('delete.artikel');

Route::get('/update-artikel/{post}', function(Post $post) {
    return view('artikel.update_artikel', ['post' => $post]);
});

Route::post('/update_artikel/{id}', [HomeController::class, 'update_artikel'])->name('update.artikel');
