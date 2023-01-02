<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('workout_exercises', function (Blueprint $table) {
			$table->id();
			$table->foreignId('workout_id')->constrained('workouts');
			$table->uuid('exercise_id')->references('id')->on('exercises');
			$table->unsignedSmallInteger('order')->nullable();
			$table->unsignedSmallInteger('reps')->nullable();
			$table->unsignedSmallInteger('sets')->nullable();
			$table->unsignedSmallInteger('weight')->nullable();
			$table->foreignId('created_by')->constrained('users');
			$table->foreignId('updated_by')->constrained('users');
			$table->foreignId('deleted_by')->nullable()->constrained('users');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::dropIfExists('workout_exercises');
	}
};
