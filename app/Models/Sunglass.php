<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sunglass extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'brand',
        'type',
        'color',
        'lens_color',
        'price',
        'cost',
    ];
}
