<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Len extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
    ];

    public function labs(){
        return $this->belongsToMany(Lab::class);
    }
}
