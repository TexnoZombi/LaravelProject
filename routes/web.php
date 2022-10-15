<?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;

    Route::get('/', function () {
        return view('index.home');
    })->name('home');

    Route::get('/help', function () {
        return view('help');
    })->name('help');
    Route::get('/contacts', function () {
        return view('contacts');
    })->name('contacts');

    Route::get('/adsAdd', function () {
        return view('adsAdd');
    })->name('adsAdd');

    Route::controller(helpController::class)->group(function () {
        Route::get('/helpAll','all' )->middleware('admin')->name('helpAll');
        Route::post('/helpSubmit','helpAdd' )->name('helpSubmit');
        Route::get('/help/{id}/delete','helpDelete' )->name('helpDelete');   
    });

    Route::controller(adsController::class)->group(function () {
        Route::get('/ads','all' )->name('ads');
        Route::get('/adsSearch','adsSearch' )->name('adsSearch');
        Route::get('/adsAdd','adsAdd' )->middleware('auth')->name('adsAdd');
        Route::post('/adsAdd','adsAddSubmit' )->middleware('auth')->name('adsAddSubmit');
        Route::get('/adsPublished','adsPublished' )->middleware('admin')->name('adsPublished');
        Route::get('/adsNotPublished','adsNotPublished' )->middleware('admin')->name('adsNotPublished');
        Route::get('/ads/{id}/view','adsView' )->name('adsView');
        Route::get('/ads/{id}/edit','adsEdit' )->name('adsEdit');
        Route::get('/ads/{id}/check','adsСheck' )->name('adsСheck');
        Route::get('/ads/{id}/delete','adsDelete' )->name('adsDelete');
        Route::post('/ads/{id}/editSubmit','adsEditSubmit' )->name('adsEditSubmit');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('auth_home');
    Auth::routes();
