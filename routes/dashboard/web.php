<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Models\Video;
use Illuminate\Support\Facades\Route;



    Route::controller(AdminController::class)->group(function () {
        Route::get('home', 'index')->name('home');
        Route::get('logout', 'logout')->name('logout');
        Route::get('/notifications/MarkReadAll', 'MarkReadAll')->name('notifications.MarkReadAll');
        Route::get('/notifications/all','notificationsAll')->name('notifications.all');
        Route::post('/notifications/read', 'read')->name('notification.read');


});

    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'showLoginForm')->name('login');
        Route::post('login', 'login');
    });






Route::group(['middleware' => 'auth:admin'], function () {

    Route::view('/index', 'dashboard.index')->name('index');

    Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'list')->name('list');
            Route::post('/delete', 'destroy')->name('destroy');
            Route::get('/data', 'fetchdata')->name('ajax.data');
            Route::POST('/update', 'update')->name('update');
        });
    });


    Route::group(['as' => 'post.', 'prefix' => 'post'], function () {
        Route::controller(PostController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'list')->name('list');
            Route::post('/delete', 'destroy')->name('destroy');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::POST('/update/{id}', 'update')->name('update');
        });
    });


    Route::group(['as' => 'article.', 'prefix' => 'article'], function () {
        Route::controller(ArticleController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'list')->name('list');
            Route::post('/delete', 'destroy')->name('destroy');
            Route::post('/status', 'status')->name('status');
            Route::get('/data', 'fetchdata')->name('ajax.data');
        });
    });

    Route::group(['as' => 'comment.', 'prefix' => 'comment'], function () {
        Route::controller(CommentController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'list')->name('list');
            Route::post('/delete', 'destroy')->name('destroy');
            Route::post('/status', 'status')->name('status');
            Route::get('/data', 'fetchdata')->name('ajax.data');
        });
    });

    Route::group(['as' => 'settings.', 'prefix' => 'settings'], function () {
        Route::controller(SettingsController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
        });
    });


    Route::group(['as' => 'gallery.', 'prefix' => 'gallery'], function () {
        Route::controller(GalleryController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/list', 'list')->name('list');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/destroy', 'destroy')->name('destroy');
            Route::post('/upload', 'upload')->name('images.upload');
            Route::post('/edit/upload', 'editUpload')->name('images.edit-upload');
            Route::post('/delete', 'delete')->name('images.delete');
            Route::post('/delete/image', 'deleteImage')->name('image.delete');
        });
    });


    Route::group(['as' => 'video.', 'prefix' => 'video'], function () {
        Route::controller(VideoController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::post('/delete', 'destroy')->name('destroy');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::POST('/update/{id}', 'update')->name('update');
        });
    });

        Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/list', 'list')->name('list');
            Route::get('/create', 'create')->name('create');
            Route::post('/delete', 'destroy')->name('destroy');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::POST('/update/{id}', 'update')->name('update');
        });

    });

    Route::group(['as' => 'page.', 'prefix' => 'page'], function () {
        Route::controller(PagesController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/list', 'list')->name('list');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/data', 'fetchdata')->name('ajax.data');
            Route::post('/delete', 'destroy')->name('destroy');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::POST('/update/{id}', 'update')->name('update');
        });

    });


    Route::group(['as' => 'inbox.', 'prefix' => 'inbox'], function () {
        Route::controller(InboxController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/list', 'list')->name('list');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/send/{id}', 'send')->name('send');
            Route::post('/delete', 'destroy')->name('destroy');

        });

    });
});


