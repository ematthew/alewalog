<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalDemandPrint extends Model
{
    use HasFactory;

    public function addOne($payload)
    {
        foreach($payload->office_ids as $key => $value){
            $total_demand_print = new TotalDemandPrint();
            $total_demand_print->office_id = $value;
            $total_demand_print->save();
        }   
    }
}
