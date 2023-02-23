<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TP1Controller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\EtudiantController;




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
    return view('index');
});

Route::get('index', [TP1Controller::class,'index'])->name('index');

Route::get('about', [TP1Controller::class,'about'])->name('about');

Route::get('contact', [TP1Controller::class,'contact'])->name('contact');




Route::get('post', [TP1Controller::class,'post'])->name('post')->middleware('auth');;




Route::get('etudiant', [EtudiantController::class,'index'])->name('etudiant');

Route::get('create', [EtudiantController::class, 'create'])->name('create');
Route::post('create', [EtudiantController::class, 'store'])->name('store');

Route::get('etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('show');

Route::get('edit/{etudiant}', [EtudiantController::class, 'edit'])->name('edit');
Route::put('edit/{etudiant}', [EtudiantController::class, 'update']);
Route::delete('edit/{etudiant}', [EtudiantController::class, 'destroy']);


use App\Http\Controllers\CustomAuthController;

Route::get('registration', [CustomAuthController::class, 'create'])->name('user.create');
Route::post('registration', [CustomAuthController::class, 'store'])->name('user.store');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication'])->name('user.auth');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');

Route::get('forgot-password', [CustomAuthController::class, 'forgotPassword'])->name('forgot.pass');
Route::post('forgot-password', [CustomAuthController::class, 'tempPassword'])->name('temp.pass');
Route::get('new-password/{user}/{tempPassword}', [CustomAuthController::class, 'newPassword'])->name('new.pass');
Route::post('new-password/{user}/{tempPassword}', [CustomAuthController::class, 'storeNewPassword'])->name('store.pass');

use App\Http\Controllers\LocalizationController;
Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');


use App\Http\Controllers\ForumPostController;
Route::get('forum', [ForumPostController::class, 'index'])->name('forum.index')->middleware('auth');
Route::get('forum/{forumPost}', [ForumPostController::class, 'show'])->name('forum.show')->middleware('auth');
Route::get('forum-create', [ForumPostController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('forum-create', [ForumPostController::class, 'store'])->name('forum.store')->middleware('auth');
Route::get('forum-edit/{forumPost}', [ForumPostController::class, 'edit'])->name('forum.edit')->middleware('auth');
Route::put('forum-edit/{forumPost}', [ForumPostController::class, 'update'])->middleware('auth');
Route::delete('forum-edit/{forumPost}', [ForumPostController::class, 'destroy'])->middleware('auth');
Route::get('/blog-pdf/{blogPost}', [ForumPostController::class, 'pdf'])->name('blog.pdf')->middleware('auth');
