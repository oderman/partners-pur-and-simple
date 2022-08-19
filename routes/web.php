<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PartnerController;




Route::controller(PageController::class)->group(function () {     

    Route::get('/',                'home')->name('home');
    //Route::get('blog/{post:slug}', 'post')->name('post');

});

//Route::redirect('dashboard', 'posts')->name('dashboard');

Route::resource('pages', PageController::class)->middleware('auth')->except(['show']);

Route::resource('partners', PartnerController::class)->middleware('auth')->except(['show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
