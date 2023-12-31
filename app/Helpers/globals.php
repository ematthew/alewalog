<?php

use App\Models\Office;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\Menu;
use App\Models\MenuRole;
use Carbon\Carbon;

if(!function_exists("totalOffice")){
	function totalOffice(){
		return Office::count();	
	}
}

if(!function_exists("totalRate")){
	function totalRate(){
		return Office::sum('rate_payable');	
	}
}

if(!function_exists("totalgrand")){
	function totalgrand(){
		return Office::sum('grand_total');	
	}
}

if(!function_exists("totalvalue")){
	function totalvalue(){
		return Office::sum('annual_value');	
	}
}

if(!function_exists("amount")){
	function amount(){
		return Office::sum('paid_amount');	
	}
}


if(!function_exists("checkIfHasMenuAccess")){
	function checkIfHasMenuAccess($routeName, $user_id){
		$route = str_replace(".index", "", $routeName);
        $user_role_ids = UserRole::where('user_id', $user_id)->get()->pluck('role_id');
        $menu = Menu::where('route', $route)->first();
        if($menu !== null){
            $menu_role = MenuRole::whereIn('role_id', $user_role_ids)->where('menu_id', $menu->id)->first();
            if($menu_role == null){
                return false;
            }else{
            	return true;
            }
        }
	}
}

?>