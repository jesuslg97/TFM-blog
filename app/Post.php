<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $table = 'posts';
    use SoftDeletes;

    public function Categories()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    public function Authors()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
