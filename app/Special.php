<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Special extends Model {

    protected $fillable = [
        'banner', 'special_title', 'title', 'sub_title', 'link', 'created_at', 'updated_at'
    ];

}
