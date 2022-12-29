<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('workout_days', function (Blueprint $table) {
			$table->id();
			$table->foreignId('program_id')->constrained('programs');
			$table->unsignedSmallInteger('day_number');
			$table->boolean('is_rest_day')->default(false);
			$table->foreignId('created_by')->constrained('users');
			$table->foreignId('updated_by')->constrained('users');
			$table->foreignId('deleted_by')->nullable()->constrained('users');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('workout_days');
	}
};
