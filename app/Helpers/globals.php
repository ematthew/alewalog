<?php

use App\Models\Office;
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

?>