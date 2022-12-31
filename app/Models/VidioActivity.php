<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VidioActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'youtube_embed',
    ];
}
