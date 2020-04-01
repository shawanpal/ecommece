<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = [
        'title', 'images', 'regular_price', 'sale_price', 'stock', 'alias', 'is_active', 'is_top_collection', 'is_new_product', 'is_best_seller', 'is_featured', 'is_deleted', 'created_at', 'updated_at'
    ];

}
