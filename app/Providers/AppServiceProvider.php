<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Patterns\Strategy\NameStrategyInterface;
use App\Patterns\Strategy\UpperCaseStrategy;
use App\Patterns\Strategy\NameContext;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
		// Strategy default binding (DIP): bind interface to concrete
		$this->app->bind(NameStrategyInterface::class, UpperCaseStrategy::class);

		// NameContext receives the current strategy via the container
		$this->app->bind(NameContext::class, function ($app) {
			return new NameContext($app->make(NameStrategyInterface::class));
		});
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
