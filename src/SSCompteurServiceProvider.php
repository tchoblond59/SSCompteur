<?php

namespace Tchoblond59\SSCompteur;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class SSCompteurServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/assets/js' => public_path('/js/tchoblond59/sscompteur'),
        ], 'larahome-package');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'sscompteur');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        Event::listen('App\Events\MSMessageEvent', 'Tchoblond59\SSCompteur\EventListener\SSCompteurEventListener');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
