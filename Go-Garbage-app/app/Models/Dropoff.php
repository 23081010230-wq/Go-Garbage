<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dropoff extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'weight',
        'status',
        'verified_at',
        'points',
    ];
}
