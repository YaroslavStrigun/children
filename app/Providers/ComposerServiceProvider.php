<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer(
            ['layouts.header'], 'App\Http\ViewComposers\CategoryComposer'
        );

        View::composer(
            ['layouts.footer'], 'App\Http\ViewComposers\CategoryComposer'
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
