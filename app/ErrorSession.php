<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorSession extends Model
{
    public const SUCCESS_COD = 'success';
    public const INFO_COD = 'info';
    public const WARNING_COD = 'warning';
    public const DANGER_COD = 'danger';
}
