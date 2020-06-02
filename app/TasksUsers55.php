<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



use Illuminate\Database\Eloquent\SoftDeletes;

class TasksUsers55 extends Model {

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
    protected $table    = 'tasksusers55';
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
          'tasks55_id',
          'users55_id'
    ];


    


    
    public function tasks55()
    {
        return $this->hasOne('App\Tasks55', 'id', 'tasks55_id');
    }


    public function users55()
    {
        return $this->hasOne('App\Users55', 'id', 'users55_id');
    }



    

    

    


}