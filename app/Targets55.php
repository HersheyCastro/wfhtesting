<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



use Illuminate\Database\Eloquent\SoftDeletes;

class Targets55 extends Model {

    use SoftDeletes;
    
    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    /**
    * The database table used by the model.
    *
    * @var string
    *
    */
    protected $table    = 'targets55';
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
          'name',
          'description',
          'users55_id',
          'duration_s',
'duration_e',
          'percent',
          'created_by',
          'active',
          'successindicators55_id',
          'ipcr55_id'
    ];


    


    
    public function users55()
    {
        return $this->hasOne('App\Users55', 'id', 'users55_id');
    }


    public function successindicators55()
    {
        return $this->hasOne('App\SuccessIndicators55', 'id', 'successindicators55_id');
    }


    public function ipcr55()
    {
        return $this->hasOne('App\Ipcr55', 'id', 'ipcr55_id');
    }



    

    

    


}