<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $fillable = [
        'cid', 'name', 'alias', 'created_at', 'updated_at'
    ];

}
