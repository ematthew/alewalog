<?php

use App\Models\Office;
use Carbon\Carbon;

if(!function_exists("totalOffice")){
	function totalOffice(){
		return Office::count();	
	}
}

?>