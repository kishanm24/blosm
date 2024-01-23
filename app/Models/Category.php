<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

     // Relationship with Products as Main Categories
     public function mainProducts()
     {
         return $this->belongsToMany(Product::class, 'category_product', 'main_category_id', 'product_id');
     }

     // Relationship with Products as Sub Categories
     public function subProducts()
     {
         return $this->belongsToMany(Product::class, 'category_product', 'sub_category_id', 'product_id');
     }
}

