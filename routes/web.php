<?php

use App\Livewire\Home;
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Livewire\RegisterForAid\Create as RegisterForAidCreate;
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


        
        Route::prefix('support/')->middleware(['web'])->name('support.')->group(function () {
            Route::get('create', TechSupportCreate::class)->name('create');
        });
        

        Route::get('/', Home::class)->middleware('auth:web')->name('home');

        Route::get('aid/create',RegisterForAidCreate::class)->middleware('auth:web')->name('aid.create');

        include __DIR__ . '/login.php';

    }
  
);

 Route::get('testapi',[TestController::class,'index']);
 