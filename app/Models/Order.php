<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'user_id',
    ];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }

    public function client(){
        return $this->hasOne(Client::class);
    }

}
