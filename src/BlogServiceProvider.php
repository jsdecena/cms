<?php

namespace Jsd\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    	$this->loadViewsFrom(__DIR__.'/views', 'blog');

	    $this->publishes([
	        __DIR__.'/views' 					=> resource_path('views/vendor/blog'),
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
