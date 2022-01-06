<?php

namespace Trin4ik\LaravelMiddlewareSetLocale;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use Trin4ik\LaravelMiddlewareSetLocale\Http\Middleware\SetLocale;

class MiddlewareSetLocaleServiceProvider extends ServiceProvider
{
	public function boot (Kernel $kernel) {

		if ($this->app->runningInConsole()) {
			$this->publishes([
				__DIR__ . '/../config/setlocale.php' => config_path('setlocale.php'),
			], 'config');
		}

		$kernel->pushMiddleware(SetLocale::class);
	}

	/**
	 * Register the application services.
	 */
	public function register () {
		$this->mergeConfigFrom(__DIR__ . '/../config/setlocale.php', 'setlocale');
	}
}