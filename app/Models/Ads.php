<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'user_id',
        'nickname',
        'description',
        'description',
        'image',
        'condition',
        'city',
    ];
}
