<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkoutDay extends Model
{
    use HasFactory, SoftDeletes;

	protected $fillable = [
		'day_number',
		'is_rest_day'
	];

	protected $hidden = [
		'deleted_at',
		'deleted_by',
	];

	protected $casts = [
		'is_rest_day' => 'boolean',
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
		'deleted_at' => 'datetime',
	];

	public function program(): BelongsTo
	{
		return $this->belongsTo(Program::class, 'program_id');
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
