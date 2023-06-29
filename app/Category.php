<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';
    use SoftDeletes;

    public function categoryLangs()
    {
        return $this->hasMany(CategoryLang::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
