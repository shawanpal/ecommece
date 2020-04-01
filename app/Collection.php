<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model {

    protected $fillable = [
        'image', 'title', 'sub_title', 'link', 'created_at', 'updated_at'
    ];

}
