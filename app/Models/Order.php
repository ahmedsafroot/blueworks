<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function items(){
        return $this->belongsToMany(Item::class, 'item_order');
    }
    public function dineInOrder(){
        return $this->hasOne(DineinOrder::class);
    }
    public function deliveryOrder(){
        return $this->hasOne(DeliveryOrder::class);
    }
    public function items_orders(){
        return $this->hasMany(ItemOrder::class);
    }
}
