<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Hash; 


use Illuminate\Database\Eloquent\SoftDeletes;

class Users55 extends Authenticatable {

    use SoftDeletes;
    use Notifiable;
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
    protected $table    = 'users55';
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
          'firstname',
          'email',
          'password',
          'roles55_id',
          'remember_token'
    ];


    


    
    public function roles55()
    {
        return $this->hasOne('App\Roles55', 'id', 'roles55_id');
    }



    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        $this->attributes['password'] = Hash::make($input);
    }


  public function division()
    {
        return $this->belongsTo(Division55::class, 'division_id');
    }

    

    


}