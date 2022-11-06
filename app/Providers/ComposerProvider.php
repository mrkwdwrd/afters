<?php

namespace App\Providers;

use App\Composers\MenuComposer;
use App\Composers\CartComposer;
use App\Composers\NotificationComposer;
use Illuminate\Support\ServiceProvider;
use App\Composers\ProductListComposer;

class ComposerProvider extends ServiceProvider
{
    // TODO: check if this is current way of doing this

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->view->composer(['partials._nav', 'partials._footer'], MenuComposer::class);

        $this->app->view->composer(['partials._cart'], CartComposer::class);

        $this->app->view->composer(['partials._notification'], NotificationComposer::class);

        $this->app->view->composer('partials._product_lists', ProductListComposer::class);
    }
}
