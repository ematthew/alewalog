<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Nasarawa;

class NasarawaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection->all());

        foreach ($collection as $key => $row) 
        {
            // dd($collection);

            // skip the first row
            if($row[0] == "pid"){
                // skip
            }else{

                // check if already exist!
                $already_exist = Nasarawa::where('pid', $row[0])->first();
                if($already_exist){

                    dd('here');
                    Nasarawa::create([
                        "pid"           => $row[0],
                        "occupant"      => $row[1],
                        "prop_addr"     => $row[2],
                        "street_name"   => $row[3],
                        "asset_no"      => $row[4],
                        "cadastral_zone"=> $row[5],
                        "prop_type"     => $row[6],
                        "prop_use"      => $row[7],
                        "rating_dist"   => $row[8],
                        "annual_value"  => $row[9],
                        "rate_payable"  => $row[10],
                        "arrears"       => $row[11],
                        "penalty"       => $row[12],
                        "grand_total"   => $row[13],
                        "paid_amount"   => $row[14],
                        "category"      => $row[15],
                        "group"         => $row[16],
                        "active"        => $row[17],
                    ]);
                }
            }
        }
    }
}
