<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeCategory extends Model
{
    use HasFactory;

    protected $table = 'attribute_category';

    protected $fillable = ['attribute_id', 'category_id'];

    // Relationship with Attribute
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
        return $this->belongsTo(Category::class);
    }
}
