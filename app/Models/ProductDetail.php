<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'product_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'size', 'price', 'quantity'];

    /**
     * Get the product associated with the product detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
