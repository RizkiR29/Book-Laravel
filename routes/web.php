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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
Route::post('/book/add', [App\Http\Controllers\AdminController::class, 'addbook'])->name('home');
Route::post('/book/edit', [App\Http\Controllers\AdminController::class, 'editbook'])->name('home');
Route::get('/book/delete/{id}', [App\Http\Controllers\AdminController::class, 'deletebook'])->name('home');
Route::get('/admin/book/detail/{id}', [App\Http\Controllers\AdminController::class, 'detailbook'])->name('home');

