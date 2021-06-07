<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTreatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_id',
        'treatment_id',
        'price',
    ];
}
