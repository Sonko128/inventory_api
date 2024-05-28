<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    use HasFactory;

    protected $fillable=[
        'item_code',
        'item_name',
        'cost_price',
        'quantity',
        'unites',  
        'selling_price',
        'stock_in',
        'reciept',
        'expire_date',
        'item_category',
        'supplier_id',
    ];
    public function sale()
    {
        return $this->hasMany(Sells::class, 'product_id');
    }
    public function supplier()
    {
        return $this->hasMany(Suppliers::class,'supplier_id');
    }
    
}
