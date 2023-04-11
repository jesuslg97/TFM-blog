<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryLang extends Model
{
    protected $table = 'category_lang';
    use SoftDeletes;

    public function Categories()
    {
        return $this->belongsTo(Categorie::class,'category_id');
    }

    public function Langs()
    {
        return $this->belongsTo(Language::class,'lang_id');
    }
}
