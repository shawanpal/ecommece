<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

    protected $fillable = [
        'icon', 'title', 'descriptions', 'created_at', 'updated_at'
    ];

}
