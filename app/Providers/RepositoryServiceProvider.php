<?php

namespace App\Providers;

use App\Interfaces\AuthenticateRepositoryInterface;
use App\Interfaces\ExerciceRepositoryInterface;
use App\Interfaces\ProgramRepositoryInterface;
use App\Interfaces\WorkoutDayRepositoryInterface;
use App\Repositories\v1\AuthenticateRepository;
use App\Repositories\v1\ExerciseRepository;
use App\Repositories\v1\ProgramRepository;
use App\Repositories\v1\WorkoutDayRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
	public function register(): void
	{
		$this->app->bind(AuthenticateRepositoryInterface::class, AuthenticateRepository::class);
		$this->app->bind(ExerciceRepositoryInterface::class, ExerciseRepository::class);
		$this->app->bind(ProgramRepositoryInterface::class, ProgramRepository::class);
		$this->app->bind(WorkoutDayRepositoryInterface::class, WorkoutDayRepository::class);
	}

	public function boot(): void
	{
		//
	}
}
