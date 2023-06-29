<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $table = 'posts';
    use SoftDeletes;

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function authors()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function postLangs()
    {
        return $this->hasMany(PostLang::class);
    }
}
