<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

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
}
