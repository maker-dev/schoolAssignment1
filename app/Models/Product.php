<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = "CodePro";

    protected $keyType = 'string';

    protected $fillable = ["CodePro", "NomPro", "Color", "BuyPrice", "SellPrice", "QuantityStk"];

    public $incrementing = false;

    public $timestamps = false;

    public function orders()
    {
        return $this->belongsToMany(Order::class, "order__details", "product_code", "order_num")->withPivot("OrderQuantity");
    }
}
