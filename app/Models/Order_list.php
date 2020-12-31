<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_list extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getproducts()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function getuser()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
