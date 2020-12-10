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
        return $this->belongsTo('App\SubCategory', 'product_id', 'id');
    }
}
