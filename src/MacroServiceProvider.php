<?php namespace Lucasvdh\LaravelMacros;

use File;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{

	public function boot()
	{
		// Register styles to publish
		$this->publishes([
			__DIR__ . '/../resources/assets/css/' => public_path('/css'),
		], 'styles');

		// Register scripts to publish
		$this->publishes([
			__DIR__ . '/../resources/assets/js/' => public_path('/js'),
		], 'scripts');

		// Register images to publish
		$this->publishes([
			__DIR__ . '/../resources/assets/img/' => public_path('/img'),
		], 'images');

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