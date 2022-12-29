<?php

namespace App\Providers;

use App\Interfaces\AuthenticateRepositoryInterface;
use App\Interfaces\ExerciceRepositoryInterface;
use App\Interfaces\ProgramRepositoryInterface;
use App\Repositories\v1\AuthenticateRepository;
use App\Repositories\v1\ExerciseRepository;
use App\Repositories\v1\ProgramRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
	public function register(): void
	{
		$this->app->bind(AuthenticateRepositoryInterface::class, AuthenticateRepository::class);
		$this->app->bind(ExerciceRepositoryInterface::class, ExerciseRepository::class);
		$this->app->bind(ProgramRepositoryInterface::class, ProgramRepository::class);
	}

	public function boot(): void
	{
		//
	}
}
