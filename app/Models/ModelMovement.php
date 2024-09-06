<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMovement extends Model
{
    use HasFactory;

    protected $table = 'movements';

    protected $fillable = [
        'id',
        'name',
    ];
}
