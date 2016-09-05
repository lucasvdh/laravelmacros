<?php namespace Lucasvdh\LaravelMacros;

use File;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{

	public function boot()
	{
		// Register styles to publish
		$this->publishes([
			__DIR__ . '/../resources/css/' => public_path('/css'),
		], 'styles');

		// Register scripts to publish
		$this->publishes([
			__DIR__ . '/../resources/js/' => public_path('/js'),
		], 'scripts');

		// Register images to publish
		$this->publishes([
			__DIR__ . '/../resources/img/' => public_path('/img'),
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