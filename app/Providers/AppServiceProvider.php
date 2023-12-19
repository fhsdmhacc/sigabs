<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;
use TallStackUi\Facades\TallStackUi;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LogViewer::auth(function ($request) {
            return $request->user()
                && in_array($request->user()->email, [
                    'ashifahmadhakim@gmail.com',
                ]);
        });

        TallStackUi::personalize()
                    ->select('styled')
                    ->block('input.content')
                    ->replace('pl-2', 'pl-3');

        TallStackUi::personalize()
                    ->form('error')
                    ->block('text')
                    ->replace('font-medium', 'font-normal');
    }
}
