<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','sub_category_id','title','slug','company','version','requires_android','description','icon','file','file_size'];

    public function getIconAttribute($value)
    {
        return asset('/upload/product/icon_64x64/'.$value);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function subCategory()
    {
        return $this->belongsTo('App\Models\SubCategory');
    }
    public function images()
    {
        return $this->hasMany('App\Models\Photo');
    }
}
