<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Front\GalleryController;
use App\Http\Controllers\Front\VideosController;
use App\Http\Controllers\Front\ChampionController;
use App\Http\Controllers\Front\ProfileController;
use Illuminate\Support\Facades\Route;




Auth::routes();

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return redirect()->route('home');
});

Route::view('contact','front.contact')->name('contact');

Route::controller(HomeController::class)->group(function () {
    Route::get('/',  'home')->name('home');
    Route::get('/post/{slug}',  'post')->name('post');
    Route::get('/matches', 'matches')->name('matches');
    Route::get('search',  'search')->name('search');
    Route::get('pages/{id}',  'pages')->name('pages');
    Route::post('contact',  'contact')->name('contact.store');
    Route::get('/article/{slug}',  'article')->name('view.article');
    Route::post('/comment',  'comment')->name('comment.store');
    Route::post('/comment/delete',  'commentdelete')->name('comment.delete');


});


Route::controller(GalleryController::class)->group(function () {
    Route::get('/gallery/{slug}',  'gallery')->name('gallery');
    Route::get('galleries',  'galleries')->name('galleries');
});


Route::controller(VideosController::class)->group(function () {
    Route::get('videos',  'videos')->name('videos');
    Route::get('video/data',  'fetchdata')->name('video.ajax.data');
});



Route::controller(ChampionController::class)->group(function () {
    Route::get('/scorers/{slug}','topScorers')->name('scorers');
    Route::get('/standing/{slug}', 'standing')->name('standing');
    Route::get('/matches/{slug}',  'MatchesBychampionshipId')->name('standing.matches');
});



Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile','profile')->name('profile');
    Route::get('/article','article')->name('article');
    Route::post('/article','articlePost')->name('article');
    Route::post('/profile','updateProfile')->name('update.profile');

});


