<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



use Illuminate\Database\Eloquent\SoftDeletes;

class SuccessIndicators55 extends Model {

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
    protected $table    = 'successindicators55';
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
          'success_indicator_name',
          'strategicobjectives55_id',
          'created_by',
          'active'
    ];


    


    
    public function strategicobjectives55()
    {
        return $this->hasOne('App\StrategicObjectives55', 'id', 'strategicobjectives55_id');
    }



    

    

    


}