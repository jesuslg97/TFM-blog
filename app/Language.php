<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    protected $table = 'langs';
    use SoftDeletes;

    public function postLangs()
    {
        return $this->hasMany(PostLang::class);
    }
}
