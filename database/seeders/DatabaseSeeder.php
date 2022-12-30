<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run(): void
	{
		$this->call([
			UserSeeder::class,
			ProgramSeeder::class,
			ExerciseSeeder::class,
			WorkoutDaySeeder::class,
			WorkoutSeeder::class,
		]);
	}
}
