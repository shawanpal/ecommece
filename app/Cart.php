<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

    protected $fillable = [
        'product_id', 'user_id', 'quantity', 'ip', 'variation', 'cart_from', 'created_at', 'updated_at'
    ];

}
