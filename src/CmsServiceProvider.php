<?php

namespace Jsdecena\Cms;

use Illuminate\Support\ServiceProvider;

class CMsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    	$this->loadViewsFrom(__DIR__.'/views', 'cms');

	    $this->publishes([
	        __DIR__.'/views' 					=> resource_path('views/vendor/cms/'),
	        __DIR__.'/database/migrations' 		=> database_path('migrations'),
	        __DIR__.'/database/seeds' 			=> database_path('seeds')
	    ]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
    }
}
