<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    public function getUnselectedTreatments(){
        $treatments = Treatment::all();
        $selectedTreatmentsIds = $this->treatments->pluck('id')->toArray();
        return $treatments->except($selectedTreatmentsIds)->pluck('name', 'id');
    }

    public function getUnselectedLens(){
        $lens = Len::all();
        $selectedLensIds = $this->lens->pluck('id')->toArray();
        return $lens->except($selectedLensIds)->pluck('name', 'id');
    }

    public function treatments(){
        return $this->belongsToMany(Treatment::class)->withPivot('price');
    }

    public function lens(){
        return $this->belongsToMany(Len::class)->withPivot('price');
    }
}
