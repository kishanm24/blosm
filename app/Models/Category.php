<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory,Filterable;

    protected $fillable = ['name', 'slug','is_main','master_category_id','category_id'];

    protected $cast = [
        'is_main' => 'boolean'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    public function master_category()
    {
        return $this->belongsTo(MasterCategory::class, 'master_category_id');
    }

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
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

     public function attributes()
     {
         return $this->belongsToMany(Attribute::class, 'attribute_category');
     }


}

