<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory,Filterable;

    protected $fillable = ['name', 'type'];

    // Relationship with ProductAttributes
    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    // Relationship with AttributeValues
    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'attribute_category');
    }
}
