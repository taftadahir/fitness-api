<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('workouts', function (Blueprint $table) {
			$table->id();
			$table->foreignId('workout_day_id')->nullable()->constrained('workout_days');
			$table->unsignedSmallInteger('order')->nullable();
			$table->foreignId('created_by')->constrained('users');
			$table->foreignId('updated_by')->constrained('users');
			$table->foreignId('deleted_by')->nullable()->constrained('users');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::dropIfExists('workouts');
	}
};
