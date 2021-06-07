<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'order_id',
        'observations',
        'quantity',
        'type',
    ];

    public function item(){
        switch($this->type){
            case "frame":
                return $this->hasOne(Frame::class);
            break;
            
            case "sunglass":
                return $this->hasOne(Sunglass::class);
            break;

            case "lens":
                return $this->hasOne(LabLen::class);
            break;

            case "treatment":
                return $this->hasOne(LabTreatment::class);
            break;
        }
    }
}
