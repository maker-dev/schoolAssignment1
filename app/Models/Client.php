<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = "CodeCli";

    protected $keyType = 'string';

    protected $fillable = ["CodeCli", "NomCli", "CatCli", "VilCli"];

    public $incrementing = false;

    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class, "client_code");
    }
}