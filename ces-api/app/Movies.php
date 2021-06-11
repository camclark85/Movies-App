<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'image',
        'genre_id'
    ];
}
