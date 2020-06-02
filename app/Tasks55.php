<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



use Illuminate\Database\Eloquent\SoftDeletes;

class Tasks55 extends Model {

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
    protected $table    = 'tasks55';
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
          'name',
          'description',
          'targets55_id',
          'color',
          'duration_s',
'duration_e',
          'percent',
          'order',
          'parent_id',
          'percent_completed',
          'created_by',
          'active',
          'weight',
          'means_verification',
          'evaluation'
    ];


    


    
    public function targets55()
    {
        return $this->hasOne('App\Targets55', 'id', 'targets55_id');
    }



    

    

    


}