<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    protected $fillable = [
        'title', 'image', 'descriptions', 'hits', 'post_by', 'alias', 'is_active', 'is_deleted', 'created_at', 'updated_at'
    ];

}
