<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permissions55 extends Model {
    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'permissions55';
    
    protected $fillable = [
          'sPermissionName',
          'sPermissionCode'
    ];


    public function modules55()
    {
        return $this->belongsTo('App\Modules55Permissions55', 'permissions55_id', 'id');
    }
    
}