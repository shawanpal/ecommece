<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = [
        'name', 'email', 'comment', 'post_id', 'is_approved', 'created_at', 'updated_at'
    ];

}
