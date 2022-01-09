<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Office;

class OfficeImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) 
        {
            // skip the first row
            if($row[0] !== "pid"){

                // check if already exist!
                $already_exist = Office::where('pid', $row[0])->first();
                if($already_exist !== null){

                    // insert into office table
                    Office::create([
                        "pid"           => $row[0],
                        "occupant"      => $row[1],
                        "prop_addr"     => $row[2],
                        "street_name"   => $row[3],
                        "asset_no"      => $row[4],
                        "cadastral_zone" => $row[5],
                        "prop_type"     => $row[6],
                        "prop_use"      => $row[7],
                        "rating_dist"   => $row[8],
                        "annual_value"  => $row[9],
                        "rate_payable"  => $row[10],
                        "arrears"       => $row[11],
                        "penalty"       => $row[12],
                        "grand_total"   => $row[13],
                        "category"      => $row[14],
                        "group"         => $row[15],
                        "active"        => $row[16],
                    ]);
                }
            }
        }
    }
}
