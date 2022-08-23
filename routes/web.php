<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
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
Auth::routes();

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return redirect()->route('home');
});


Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/post/{slug}', [\App\Http\Controllers\HomeController::class, 'post'])->name('post');
Route::get('/matches', [\App\Http\Controllers\HomeController::class, 'matches'])->name('matches');






Route::get('/gallery/{slug}', [\App\Http\Controllers\Front\GalleryController::class, 'gallery'])->name('gallery');
Route::get('galleries', [\App\Http\Controllers\Front\GalleryController::class, 'galleries'])->name('galleries');

Route::get('videos', [\App\Http\Controllers\Front\VideosController::class, 'videos'])->name('videos');
Route::get('video/data', [\App\Http\Controllers\Front\VideosController::class, 'fetchdata'])->name('video.ajax.data');



Route::get('/scorers/{slug}', [\App\Http\Controllers\Front\ChampionController::class, 'topScorers'])->name('scorers');
Route::get('/standing/{slug}',[\App\Http\Controllers\Front\ChampionController::class, 'standing'])->name('standing');
Route::get('/matches/{slug}', [\App\Http\Controllers\Front\ChampionController::class, 'MatchesBychampionshipId'])->name('standing.matches');


