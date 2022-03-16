<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseFileStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const STATUS_NOT_SUBMITTED = 1;
    public const STATUS_PENDING = 2;
    public const STATUS_SCORED = 3;
}
