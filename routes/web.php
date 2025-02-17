<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\NoteController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', function() {
    if(!is_null(Auth::user())) {
        return redirect(route('dashboard'));
    } else {
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('surat/{surat}/{ayat}', [DashboardController::class, 'surat'])->name('surat');
Route::resource('tag', TagController::class);
Route::resource('note', NoteController::class);
