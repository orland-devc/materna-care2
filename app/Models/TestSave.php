<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestSave extends Model
{
    protected $fillable = [
        'caption',
        'description',
    ];

    protected $casts = [
        'caption' => 'string',
        'description' => 'string',
    ];
}
