<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
    protected $fillable=[
        'supplier_name',
        'business_name',
        'email',
        'supplier_contact',
        'product_name',
        'category_name',
    ];

    
}
