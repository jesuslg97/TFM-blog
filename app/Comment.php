<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    protected $table = 'comments';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function postLangs()
    {
        return $this->belongsTo(User::class,'postLang_id');
    }

}
