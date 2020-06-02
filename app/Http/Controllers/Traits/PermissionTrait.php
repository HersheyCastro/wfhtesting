<?php

namespace App\Http\Controllers\Traits;

use App\Modules55;
use App\Modules55Permissions55;
use App\Permissions55;
use App\Roles55Modules55;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Laraveldaily\Quickadmin\Models\Menu;

trait PermissionTrait
{
    public function allows($gate)
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

    private function getPermissions($module_id)
    {
       $aPermissions =  Modules55Permissions55::where('modules55_id', $module_id)->orderBy('iBitIndex')->pluck('permissions55_id');

        return json_decode($aPermissions);
    }

    private function getMaxBitIndex($module_id)
    {
        $iMax =  Modules55Permissions55::where('modules55_id', $module_id)->max('iBitIndex');

        return $iMax;
    }



    public function getModules($role_id){
        $aModules = Roles55Modules55::where('roles55_id', $role_id)->pluck('modules55_id');

        return json_decode($aModules);
    }

    public function getModulesThatUsesPermission($permission_id){
        //get all the modules that uses this permission
        $modules55_all = Modules55::whereHas('permissions55', function ($query) use ($permission_id){
            $query->where('permissions55_id', $permission_id);
        })->pluck('id');

        return $modules55_all;
    }

    public function unlinkPermission($permission_id){
        //get all the modules that uses this permission
        $aModules55All = Modules55::whereHas('permissions55', function ($query) use ($permission_id){
            $query->where('permissions55_id', $permission_id);
        })->with('permissions55')->get();

        $aModuleRoles = array();
        $aRemoveIndex = array();
        $aModulePermissions = array(); //all permission in the module
        $aPermissionCount = array();

        //get all the permissions in a module
        foreach($aModules55All as $value) {
            $aModuleRoles[$value->id] = ['role' => $value->roles55()->pluck('roles55_id'), 'iPermission' => $value->roles55()->pluck('iPermission')] ; //role it belongs
            $aPermissionCount[$value->id] =  count($value['permissions55']);
            foreach($value['permissions55'] as $key =>$data) {
                $aModulePermissions[$value->id][] = $data->permissions55_id;
                if($data->permissions55_id == $permission_id)
                    $aRemoveIndex[$value->id] = $key;
            }
        }


        foreach($aModuleRoles as $module_id => $module_roles) {
            $iPermission_binary = array();
            $iPermission_binary_spliced = array();
            $iPermission_decimal = array();

            foreach($module_roles['iPermission'] as $key => $data){
                $value =  str_pad(decbin($data), $aPermissionCount[$module_id] , '0', STR_PAD_LEFT);
                $iPermission_binary[] =  array_reverse(str_split($value));
            }

            foreach ($iPermission_binary as $value) {
                array_splice($value, $aRemoveIndex[$module_id], 1);
                $iPermission_binary_spliced[] =  $value;
                $iPermission_decimal[] = bindec(implode('',array_reverse($value))); //bin to dec
            }

            foreach($module_roles['role'] as $key => $data){
                Roles55Modules55::where('roles55_id', $data)->where('modules55_id', $module_id)->update(['iPermission' => $iPermission_decimal[$key]]);
            }



//            return array(
//                'Original Reversed' => $iPermission_binary,
//                'Spliced' => $iPermission_binary_spliced,
//                'Decimal Value' => $iPermission_decimal,
//
//            );

        }


////        return 0;
//		return array(
//			'Module Roles' => $aModuleRoles,
//			'Module Permissions' => $aModulePermissions,
//            'Permission Count' => $aPermissionCount,
//            'To Remove' => $aRemoveIndex
//		);

    }

    private function syncModulePermissions($aPermissions, $module_id)
    {
        $current = $this->getPermissions($module_id);

        if (isset($aPermissions)) {
            $to_delete = array_diff($current, $aPermissions);
            $to_add = array_diff($aPermissions, $current);
        } else {
            $to_add = [];
            $to_delete = $current;
        }

        $BitIndex_next = $this->getMaxBitIndex($module_id);
        $min_matched_count = $to_delete <= $to_add ? count($to_delete) : count($to_add);

        if (!empty($to_delete) && empty($to_add)) {
            $to_remove = array(); //
            //find the position of if to be deleted in the array
            foreach($to_delete as $id) {
                $to_remove[] = $id;
                $this->unlinkPermission($id);
            }

            Modules55Permissions55::where('modules55_id', $module_id)->whereIn('permissions55_id', $to_remove)->delete();


        }

        if(!empty($to_add)  && empty($to_delete)) {
            $BitIndex_next =  $this->getMaxBitIndex($module_id);
            foreach($to_add as $id) {
                Modules55Permissions55::create(['iBitIndex' => $BitIndex_next + 1, 'modules55_id' => $module_id, 'permissions55_id' => intval($id)]);
            }
        }

        if (!empty($to_delete) && !empty($to_add)) {
            $to_remove = array(); //
            //find the position of if to be deleted in the array

            foreach($to_delete as $id) {
                $to_remove[] = $id;
                $this->unlinkPermission($id);
            }

            Modules55Permissions55::where('modules55_id', $module_id)->whereIn('permissions55_id', $to_remove)->delete();

            foreach($to_add as $id) {
                Modules55Permissions55::create(['iBitIndex' => $BitIndex_next + 1, 'modules55_id' => $module_id, 'permissions55_id' => intval($id)]);
            }

        }

    }

    private function syncRoleModulePermissions($aModules, $aPermissions, $role_id)
    {
        $current = $this->getModules($role_id);


        if(isset($aModules)){
            $to_delete = array_diff($current, $aModules);
            $to_add = array_diff($aModules, $current);
        }else{
            $to_add = [];
            $to_delete = $current;
        }

//
//        return array(
//			'Modules' => $aModules,
//			'Permissions' => $aPermissions,
//            'ToDelete' => $to_delete,
//		);

        //same elements update
        foreach($aModules as $key => $value) {
            Roles55Modules55::where('roles55_id', $role_id)->where('modules55_id', $value)->update([ 'roles55_id' => $role_id, 'iPermission' => bindec(implode("",array_reverse($aPermissions[$key]))), 'modules55_id' =>$value]);
        }

        $min_matched_count = $to_delete <= $to_add ? count($to_delete) : count($to_add);

        for($i=0; $i<$min_matched_count; $i++) {
            Roles55Modules55::where('roles55_id', $role_id)->where('modules55_id', array_shift($to_delete))->update([ 'roles55_id' => $role_id, 'iPermission' => bindec(implode("",array_reverse($aPermissions[array_search(array_shift($to_add),$aModules)] ))), 'modules55_id' =>array_shift($to_add)]);
        }

        if (!empty($to_delete)) {

            Roles55Modules55::where('roles55_id', $role_id)->whereIn('modules55_id', $to_delete)->delete();
        }

        if(!empty($to_add)) {
            foreach($to_add as $id) {
                Roles55Modules55::create([ 'roles55_id' => $role_id, 'iPermission' => bindec(implode("",array_reverse($aPermissions[array_search($id,$aModules)]))), 'modules55_id' =>intval($id)]);
            }

        }
//
//        return array(
//			'Modules' => $aModules,
//			'Permissions' => $aPermissions,
//		);

    }



    /**
     * @param $request
     *
     * @return array
     */
    private function parseData($request)
    {
        $role     = $request->user()->role_id;
        $route    = explode('.', $request->route()->getName());
        $official = [
            'menu',
            'users',
            'files',
            'roles',
            'forms',
            'projects',
            'download',
            'actions'
        ];
        if (in_array($route[0], $official)) {
            return [$role, config('admincms.defaultRole')];
        } else {
            $menuName = $route[1];
        }
        $menu = Menu::where('name', ucfirst($menuName))->firstOrFail();

        return [$role, $menu];
    }
}