<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Roles55 extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'roles55';
    
    protected $fillable = [
          'bActive',
          'sRoleName',
          '_id'
    ];

    protected $hidden = ['modules'];

    
    public function modules55()
    {
        return $this->hasMany('App\Roles55Modules55', 'roles55_id', 'id');
    }

    public function allows($gate)
    {
        return false;
        $keys = explode("_",$gate);

        //Get user Role
        $auth_role = Auth::user()->roles55_id;


        //Get all the allowed modules
        $aModules = Roles55Modules55::whereHas('modules55', function ($query) use ($keys){
            $query->where('sModuleCode', '=', $keys[0]);
        })->where('roles55_id', $auth_role)->first();


        //if Module is allowed in the role

        if($aModules){

            $allowed = $aModules->modules55_id;

//            $aPermissions =  Modules55Permissions55::whereHas('permissions55', function ($query) use ($key){
//                $query->where('sPermissionCode', '=', $key[1]);
//            })->where('modules55_id',$allowed)->first();

            $aPermissions =  Modules55Permissions55::with('permissions55')->where('modules55_id',$allowed)->orderBy('iBitIndex', 'ASC')->get();

            //check if permission exisrs
            if($aPermissions){

                $iLength = 0;
                $iLength = $aPermissions->count();
                $iPermission = 0;
                $iPermission = $aModules->iPermission;


                $aOriginalPermissions = array();

                foreach($aPermissions as $key => $value){
                    $aOriginalPermissions[] = $value->permissions55()->pluck('sPermissionCode')->first();
                }

                $index = array_search($keys[1], $aOriginalPermissions, 1);

                $value =  str_pad(decbin($iPermission), $iLength , '0', STR_PAD_LEFT);
                $iPermission_binary =  array_reverse(str_split($value));


                return (intval($iPermission_binary[$index]))? true: false;



            }else{
                return false;
            }



        }else{
            return false;
        }
    }


    
    
    
}