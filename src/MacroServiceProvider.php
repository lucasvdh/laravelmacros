<?php namespace Lucasvdh\LaravelMacros;

use File;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{

	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../resources/css/' => public_path('css/'),
			__DIR__ . '/../resources/js/' => public_path('js/'),
			__DIR__ . '/../resources/img/' => public_path('img/'),
		]);

		// Require macro files
		foreach(File::glob(__DIR__ . '/Macros/*.php') as $macro) require $macro;
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

	}
}