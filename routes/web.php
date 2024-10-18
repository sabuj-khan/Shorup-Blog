<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Dashboard admin page APIs
Route::get('/addnewpost', [PageController::class, 'addNewPostPage'])->middleware(['auth', 'admin']);
Route::get('/editpost', [PageController::class, 'editPostPage'])->middleware(['auth', 'admin']);
Route::get('/allpost', [PageController::class, 'allPostPage'])->middleware(['auth', 'admin']);
Route::get('/category-list', [PageController::class, 'categoryListPage'])->middleware(['auth', 'admin']);
Route::get('/tag-list', [PageController::class, 'tagListPage'])->middleware(['auth', 'admin']);


Route::get('/post/{id}', [PageController::class, 'singlePostView']);





Route::get('/', [HomeController::class, 'homePageShow']);
Route::get('/about', [PageController::class, 'aboutPageShow']);
Route::get('/services', [PageController::class, 'servicesPageShow']);
Route::get('/blogs', [PageController::class, 'blogsPageShow']);
Route::get('/contact', [PageController::class, 'contactPageShow']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/dashboard/admin', [AdminController::class, 'adminPage'])->middleware(['auth', 'admin']);


// Post AJAX APIs
Route::get('/posts-shows', [PostController::class, 'postShow'])->middleware(['auth', 'admin']);
Route::post('/posts-create', [PostController::class, 'postCreate'])->middleware(['auth', 'admin']);
Route::post('/posts-update', [PostController::class, 'postUpdate'])->middleware(['auth', 'admin']);
Route::post('/posts-delete', [PostController::class, 'postDelete'])->middleware(['auth', 'admin']);
Route::post('/posts-by-id', [PostController::class, 'postById'])->middleware(['auth', 'admin']);
Route::get('/get-posts-by-id/{id}', [PostController::class, 'GetPostById'])->middleware(['auth', 'admin']);

Route::get('/get-allpost', [PostController::class, 'allPostAction']);

// Category AJAX APIs
Route::get('/category-shows', [CategoryController::class, 'categoryShow'])->middleware(['auth', 'admin']);
Route::post('/category-create', [CategoryController::class, 'categoryCreate'])->middleware(['auth', 'admin']);
Route::post('/category-update', [CategoryController::class, 'categoryUpdate'])->middleware(['auth', 'admin']);
Route::post('/category-delete', [CategoryController::class, 'categoryDelete'])->middleware(['auth', 'admin']);
Route::post('/category-by-id', [CategoryController::class, 'categoryById'])->middleware(['auth', 'admin']);


// Tag AJAX APIs
Route::get('/tag-shows', [TagController::class, 'tagShow'])->middleware(['auth', 'admin']);
Route::post('/tag-create', [TagController::class, 'tagCreate'])->middleware(['auth', 'admin']);
Route::post('/tag-update', [TagController::class, 'tagUpdate'])->middleware(['auth', 'admin']);
Route::post('/tag-delete', [TagController::class, 'tagDelete'])->middleware(['auth', 'admin']);
Route::post('/tag-by-id', [TagController::class, 'tagById'])->middleware(['auth', 'admin']);




