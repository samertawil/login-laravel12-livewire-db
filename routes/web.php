<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Livewire\TechnicalSupport\TechSupportCreate;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],

    function () {
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });

        // Route::post('/logout', function () {
        //     return 'code is here';
        // })->name('logout');

        // Route::post('/home', function () {
        //     return 'code is here';
        // })->name('home');

        
        Route::prefix('support/')->middleware(['web'])->name('support.')->group(function () {
            Route::get('create', TechSupportCreate::class)->name('create');
        });
        
        

        include __DIR__ . '/login.php';
    }

    
);


 