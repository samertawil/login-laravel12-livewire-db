<?php

use App\Livewire\Home;
use Livewire\Livewire;
use App\Http\Middleware\CheckToEdit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Middleware\CheckToRegister;
use App\Livewire\TechnicalSupport\Create as TechSupportCreate;
use App\Livewire\TechnicalSupport\Show as TechSupportShow;
use App\Livewire\RegisterForAid\Edit as RegisterForAidEdit;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Livewire\RegisterForAid\Create as RegisterForAidCreate;


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
            Route::get('show', TechSupportShow::class)->name('show');
        });
        

        Route::get('/', Home::class)->middleware('auth:web')->name('home');

        Route::get('aid/create',RegisterForAidCreate::class)->middleware('auth:web')->middleware(CheckToRegister::class)->name('aid.create');
        Route::get('aid/edit',RegisterForAidEdit::class)->middleware('auth:web')->middleware(CheckToEdit::class)->name('aid.edit');

        include __DIR__ . '/login.php';

    }
  
);

 Route::get('testapi',[TestController::class,'index']);
 