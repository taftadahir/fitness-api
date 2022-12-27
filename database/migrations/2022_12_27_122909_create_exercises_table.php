<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('exercises', function (Blueprint $table) {
			$table->id();
			$table->string('u_id')->nullable();
			$table->string('name');
			$table->text('description')->nullable();
			$table->boolean('active')->default(true);

			$table->foreignId('created_by')->constrained('users');
			$table->foreignId('updated_by')->constrained('users');
			$table->foreignId('deleted_by')->nullable()->constrained('users');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::dropIfExists('exercises');
	}
};
