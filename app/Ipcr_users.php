<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ipcr_users extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at','created_at','updated_at'];
}
