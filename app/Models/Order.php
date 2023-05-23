<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = "NumOrd";

    protected $keyType = 'string';

    protected $fillable = ["NumOrd", "DateOrd", "client_code"];

    public $incrementing = false;

    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo(Client::class, "client_code");
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order__details', "order_num", "product_code")->withPivot("OrderQuantity");
    }
}
