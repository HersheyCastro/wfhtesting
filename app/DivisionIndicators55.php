<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



use Illuminate\Database\Eloquent\SoftDeletes;

class DivisionIndicators55 extends Model {

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
    protected $table    = 'divisionindicators55';
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
          'successindicators55_id',
          'division55_id'
    ];


    


    
    public function successindicators55()
    {
        return $this->hasOne('App\SuccessIndicators55', 'id', 'successindicators55_id');
    }


    public function division55()
    {
        return $this->hasOne('App\Division55', 'id', 'division55_id');
    }



    

    

    


}