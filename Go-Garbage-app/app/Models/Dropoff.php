<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
