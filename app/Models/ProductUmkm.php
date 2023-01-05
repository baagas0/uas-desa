<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUmkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'price',
        'owner',
        'phone_number',
    ];
}
