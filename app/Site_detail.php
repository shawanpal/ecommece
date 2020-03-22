<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site_detail extends Model {
    
    protected $fillable = [
        'name', 'value', 'created_at', 'updated_at',
    ];
}
