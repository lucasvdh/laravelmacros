<?php namespace Lucasvdh\LaravelMacros;

use File;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{

	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../resources/css/laravel-macros.css' => base_path('public/css/laravel-macros.css'),
			__DIR__ . '/../resources/js/laravel-macros.js' => base_path('public/css/laravel-macros.js'),
			__DIR__ . '/../resources/img/dutch_license_plate.png' => base_path('public/img/dutch_license_plate.png'),
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