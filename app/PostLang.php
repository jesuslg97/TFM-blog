<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostLang extends Model
{
    protected $table = 'postLangs';
    use SoftDeletes;

    public function Posts()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function Langs()
    {
        return $this->belongsTo(Lang::class,'lang_id');
    }
}
