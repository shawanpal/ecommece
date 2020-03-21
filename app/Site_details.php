<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site_details extends Model {
    
    protected $fillable = [
        'name', 'value', 'created_at', 'updated_at',
    ];
}
