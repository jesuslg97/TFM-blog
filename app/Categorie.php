<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    protected $table = 'categories';
    use SoftDeletes;

    public function categorieLangs()
    {
        return $this->hasMany(CategoryLang::class);
    }
}
