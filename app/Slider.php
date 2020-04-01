<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model {

    protected $fillable = [
        'image', 'title', 'sub_title', 'link', 'created_at', 'updated_at'
    ];

}
