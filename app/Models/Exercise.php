<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'u_id',
		'name',
		'description',
		'active',
	];

	protected $hidden = [
		'deleted_at',
		'deleted_by',
	];

	protected $casts = [
		'active' => 'boolean',
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
		'deleted_at' => 'datetime',
	];

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
