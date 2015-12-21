<?php namespace JetCMS\Website;

use Illuminate\Support\ServiceProvider;

class WebsiteServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
			$this->loadViewsFrom(__DIR__.'/../views', 'jetweb');
          	$this->loadTranslationsFrom(__DIR__ . '/../lang', 'jetweb');
	
            $this->publishes([
                __DIR__.'/../resources' => base_path('resources')
            ]);
			
			include __DIR__.'/../routes.php';
			include __DIR__.'/../helpers.php';
	}
        // ---
	/**
	 * Register the application services. 
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
        
}