<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    protected $table = 'comments';

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
