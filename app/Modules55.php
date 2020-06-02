<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modules55 extends Model {

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'modules55';
    
    protected $fillable = [
          'sModuleName',
          'sModuleCode',
          'sTable',
          '_id'
    ];

    // public function modules55()
    // {
    //     return $this->belongsTo('App\Modules55', 'modules55_id', 'id');
    // }


    
    public function permissions55()
    {
        return $this->hasMany('App\Modules55Permissions55', 'modules55_id', 'id')->orderBy('iBitIndex');
    }

    public function roles55()
    {
        return $this->hasMany('App\Roles55Modules55', 'modules55_id', 'id');
    }
}