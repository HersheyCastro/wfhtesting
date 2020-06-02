<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



use Illuminate\Database\Eloquent\SoftDeletes;

class Division55 extends Model {

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
    protected $table    = 'division55';
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
          'division_name',
          'color',
          'created_by',
          'active'
    ];


    


    

    

    

    


}