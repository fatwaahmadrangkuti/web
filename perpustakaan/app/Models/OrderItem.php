<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'buku_id', 'quantity', 'price'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}