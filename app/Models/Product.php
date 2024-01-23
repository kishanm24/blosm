<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['user_id', 'brand_id', 'name', 'description', 'price', 'quantity', 'image', 'is_custom'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

     // Relationship with Main Categories
     public function mainCategories()
     {
         return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'main_category_id');
     }

     // Relationship with Sub Categories
     public function subCategories()
     {
         return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'sub_category_id');
     }

}
