<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Home;
use App\Livewire\Index;
use App\Livewire\Questions\CreateQuestion;
use App\Livewire\Questions\QuestionIndex;
use App\Livewire\Recognize;
use App\Livewire\Result;
use App\Livewire\Verification;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'guest'
])
->group(function () {
    Route::get('/', Index::class)
        ->name('index');

    Route::get('verification', Verification::class)
        ->name('verification');

    Route::get('recognize/{student}', Recognize::class)
        ->name('recognize');

    Route::get('result/{student}', Result::class)
        ->name('result');

    Route::get('login', Login::class)
        ->name('login');

    Route::get('forgot-password', ForgotPassword::class)
        ->name('password.request');

    Route::get('reset-password/{token}', ResetPassword::class)
        ->name('password.reset');
});

Route::middleware([
    'auth'
])
->group(function () {
    Route::get('home', Home::class)
        ->name('home');

    Route::middleware([
        'verified'
    ])
    ->group(function () {
        Route::group([
            'prefix'=>'questions',
            'as'=>'questions.'
        ], function () {
            Route::get('/', QuestionIndex::class)
            ->name('index');

            Route::get('create', CreateQuestion::class)
                ->name('create');
        });
    });
});
