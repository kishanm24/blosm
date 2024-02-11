<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCategory extends Model
{
    use HasFactory,Filterable;
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class); // Assuming you have a Product model
    }

}
