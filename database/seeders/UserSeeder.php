<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run(): void
	{
		User::create(
			[
				'name' => 'system',
				'first_name' => 'System',
				'last_name' => 'System',
				'gender' => 'no-gender',
				'birthday' => now(),
				'height' => 0,
				'weight' => 0,
				'email' => 'system@system.com',
				'password' => 'pass',
			],
		);
	}
}
