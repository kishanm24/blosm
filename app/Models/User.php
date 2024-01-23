<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens as PassportHasApiTokens;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes,PassportHasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'mobile_number',
        'password','avatar','role','status','description','is_approved','status',
        'vendor_type'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // public function vendor()
    // {
    //     return $this->hasOne(Vendor::class);
    // }

    // Relationship with Vendor's Products
    // public function vendorProducts()
    // {
    //     return $this->hasManyThrough(Product::class, Vendor::class);
    // }

    public function findForPassport($identifier) {
        return $this->orWhere('email', $identifier)->orWhere('mobile_number', $identifier)->first();
    }

}
