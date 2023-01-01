<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('workout_progress', function (Blueprint $table) {
            $table->id();
			$table->foreignId('workout_exercise_id')->constrained('workout_exercises');
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
        Schema::dropIfExists('workout_progress');
    }
};
