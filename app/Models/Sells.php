<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sells extends Model
{
    use HasFactory;
    //protected $primaryKey = 'sell_id';
    protected $fillable=[
        'product_id',
        'product_code',
        'product_name',
        'quantity',
        'unites',
        'selling_price',
        'stock_in',
        'product_category',
        'reciept_no',
        'user_id',
    ];
    public function product_sold(){
        return $this->belongsTo(users::class, 'user_id');
    }

    public function user(){
        return $this->hasMany(users::class,'user_id');
    }
}
