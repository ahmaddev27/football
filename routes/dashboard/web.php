<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Models\Video;
use Illuminate\Support\Facades\Route;


Route::group(['as' => 'admin.'], function () {
    Route::get('home', [AdminController::class, 'index'])->name('home');
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
});


Route::group(['middleware' => 'auth:admin'], function () {


    Route::get('/index', function () {
        return view('dashboard.index');
    })->name('index');

    Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/list', [CategoryController::class, 'list'])->name('list');
        Route::post('/delete', [CategoryController::class, 'destroy'])->name('destroy');
        Route::get('/data', [CategoryController::class, 'fetchdata'])->name('ajax.data');
        Route::POST('/update', [CategoryController::class, 'update'])->name('update');

    });


    Route::group(['as' => 'post.', 'prefix' => 'post'], function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/list', [PostController::class, 'list'])->name('list');
        Route::post('/delete', [PostController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
        Route::POST('/update/{id}', [PostController::class, 'update'])->name('update');

    });


    Route::group(['as' => 'article.', 'prefix' => 'article'], function () {
        Route::get('/', [ArticleController::class, 'index'])->name('index');
        Route::get('/create', [ArticleController::class, 'create'])->name('create');
        Route::post('/store', [ArticleController::class, 'store'])->name('store');
        Route::get('/list', [ArticleController::class, 'list'])->name('list');
        Route::post('/delete', [ArticleController::class, 'destroy'])->name('destroy');
        Route::post('/status', [ArticleController::class, 'status'])->name('status');
        Route::get('/data', [ArticleController::class, 'fetchdata'])->name('ajax.data');


    });


    Route::group(['as' => 'comment.', 'prefix' => 'comment'], function () {
        Route::get('/', [CommentController::class, 'index'])->name('index');
        Route::get('/create', [CommentController::class, 'create'])->name('create');
        Route::post('/store', [CommentController::class, 'store'])->name('store');
        Route::get('/list', [CommentController::class, 'list'])->name('list');
        Route::post('/delete', [CommentController::class, 'destroy'])->name('destroy');
        Route::post('/status', [CommentController::class, 'status'])->name('status');
        Route::get('/data', [CommentController::class, 'fetchdata'])->name('ajax.data');


    });


    Route::group(['as' => 'settings.', 'prefix' => 'settings'], function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::post('/store', [SettingsController::class, 'store'])->name('store');

    });


    Route::group(['as' => 'gallery.', 'prefix' => 'gallery'], function () {
        Route::get('/', [GalleryController::class, 'index'])->name('index');
        Route::get('/list', [GalleryController::class, 'list'])->name('list');
        Route::get('/create', [GalleryController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('edit');
        Route::post('/destroy', [GalleryController::class, 'destroy'])->name('destroy');
        Route::post('/upload', [GalleryController::class, 'upload'])->name('images.upload');
        Route::post('/edit/upload', [GalleryController::class, 'editUpload'])->name('images.edit-upload');
        Route::post('/delete', [GalleryController::class, 'delete'])->name('images.delete');
        Route::post('/delete/image', [GalleryController::class, 'deleteImage'])->name('image.delete');


    });


    Route::group(['as' => 'video.', 'prefix' => 'video'], function () {
        Route::get('/', [VideoController::class, 'index'])->name('index');
        Route::get('/create', [VideoController::class, 'create'])->name('create');
        Route::post('/store', [VideoController::class, 'store'])->name('store');
        Route::post('/delete', [VideoController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [VideoController::class, 'edit'])->name('edit');
        Route::POST('/update/{id}', [VideoController::class, 'update'])->name('update');

    });

    Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/list', [UserController::class, 'list'])->name('list');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/data', [UserController::class, 'fetchdata'])->name('ajax.data');
        Route::post('/delete', [UserController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::POST('/update/{id}', [UserController::class, 'update'])->name('update');

    });


});


