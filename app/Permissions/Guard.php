<?php

namespace App\Permissions;
use App\Http\Controllers\Traits\PermissionTrait;
use App\Modules55Permissions55;
use App\Roles55Modules55;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: JhonRamos
 * Date: 10/10/2055
 * Time: 9:43 AM
 */
class Guard
{

    public static function allows($gate)
    {
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