<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomProductDetails extends Model
{
    use HasFactory;

    protected $fillable = ['order_item_id', 'details'];

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }
}
