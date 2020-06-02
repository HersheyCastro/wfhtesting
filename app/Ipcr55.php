<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



use Illuminate\Database\Eloquent\SoftDeletes;

class Ipcr55 extends Model {

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
    protected $table    = 'ipcr55';
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
          'ipcr_name',
          'semester',
          'year',
          'status55_id',
          'created_by',
          'active'
    ];


    


    
    public function status55()
    {
        return $this->hasOne('App\Status55', 'id', 'status55_id');
    }
    public function users55()
    {
        return $this->belongsTo('App\Users55', 'user_id', 'id');
    }



    

    

    


}