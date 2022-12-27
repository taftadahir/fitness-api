<?php

namespace App\Providers;

use App\Interfaces\AuthenticateRepositoryInterface;
use App\Repositories\v1\AuthenticateRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
		$this->app->bind(AuthenticateRepositoryInterface::class, AuthenticateRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
