<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles55Modules55 extends Model {
    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */

    protected $dates = ['deleted_at'];

    protected $table    = 'roles55_modules55';
    
    protected $fillable = ['roles55_id', 'modules55_id', 'iPermission'];

//    public $timestamps = false;

    public function roles55()
    {
        return $this->belongsTo('App\Roles55', 'roles55_id', 'id');
    }


    public function modules55()
    {
        return $this->belongsTo('App\Modules55', 'modules55_id', 'id');
    }

}