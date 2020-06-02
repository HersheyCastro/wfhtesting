<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modules55Permissions55 extends Model {
    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'modules55_permissions55';
    
    protected $fillable = ['modules55_id', 'permissions55_id', 'iBitIndex'];

//    public $timestamps = false;

    public function modules55()
    {
        return $this->belongsTo('App\Modules55', 'modules55_id', 'id');
    }


    public function permissions55()
    {
        return $this->belongsTo('App\Permissions55', 'permissions55_id', 'id');
    }

}