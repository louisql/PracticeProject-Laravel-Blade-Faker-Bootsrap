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

Route::get('post', [TP1Controller::class,'post'])->name('post');

Route::get('etudiant', [EtudiantController::class,'index'])->name('etudiant');

Route::get('create', [EtudiantController::class, 'create'])->name('create');
Route::post('create', [EtudiantController::class, 'store'])->name('store');

Route::get('etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('show');

Route::get('edit/{etudiant}', [EtudiantController::class, 'edit'])->name('edit');
Route::put('edit/{etudiant}', [EtudiantController::class, 'update']);
Route::delete('edit/{etudiant}', [EtudiantController::class, 'destroy']);

