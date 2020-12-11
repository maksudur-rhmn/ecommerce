<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function belongTo()
    {
        return $this->belongsTo('App\Models\SubCategory', 'sub_category_id', 'id');
    }

    public function hasColors()
    {
        return $this->hasOne('App\Models\Color', 'product_id', 'id');
    }

    public function hasSizes()
    {
        return $this->hasOne('App\Models\Size', 'product_id', 'id');
    }

    public function hasImages()
    {
        return $this->hasMany('App\Models\ProductMultipleImage');
    }
}
