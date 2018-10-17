<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['product_id','image'];

    public function getImageAttribute($value)
    {
        return asset('/upload/product/image/'.$value);
    }
}
