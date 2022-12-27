<?php

namespace App\Providers;

use App\Interfaces\AuthenticateRepositoryInterface;
use App\Interfaces\ExerciceRepositoryInterface;
use App\Repositories\v1\AuthenticateRepository;
use App\Repositories\v1\ExerciseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
		$this->app->bind(AuthenticateRepositoryInterface::class, AuthenticateRepository::class);
		$this->app->bind(ExerciceRepositoryInterface::class, ExerciseRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
