<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkoutExercise extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'order',
		'sets',
		'reps',
		'weight'
	];

	protected $hidden = [
		'deleted_at',
		'deleted_by',
	];

	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
		'deleted_at' => 'datetime',
	];

	public function workout(): BelongsTo
	{
		return $this->belongsTo(Workout::class, 'workout_id');
	}

	public function exercise(): BelongsTo
	{
		return $this->belongsTo(Exercise::class, 'exercise_id');
	}

	public function createdBy(): BelongsTo
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	public function updatedBy(): BelongsTo
	{
		return $this->belongsTo(User::class, 'updated_by');
	}

	public function deletedBy(): BelongsTo
	{
		return $this->belongsTo(User::class, 'deleted_by');
	}
}
