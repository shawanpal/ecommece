<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model {

    protected $fillable = [
        'product_id', 'name', 'value', 'created_at', 'updated_at',
    ];

}
