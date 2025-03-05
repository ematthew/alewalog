<?php

namespace App\Imports;

use App\Models\Jahi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JahiImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Calculate derived values
        // $annual_value = floatval($row['annual_value'] ?? 0);
        // $arrears = floatval($row['arrears'] ?? 0);
        // $rate_payable = 0.04 * $annual_value;
        // $penalty = 0.10 * $arrears;
        // $paid_amount = floatval($row['paid_amount'] ?? 0);
        // $grand_total = $rate_payable + $arrears + $penalty - $paid_amount;

        // Create new record
        return Jahi::create([
            'pid' => $row['pid'] ?? '',
            'occupant' => $row['occupant'] ?? '',
            'prop_addr' => $row['prop_addr'] ?? '',
            'street_name' => $row['street_name'] ?? '',
            'asset_no' => $row['asset_no'] ?? '',
            'cadastral_zone' => $row['cadastral_zone'] ?? '',
            'prop_type' => $row['prop_type'] ?? '',
            'prop_use' => $row['prop_use'] ?? '',
            'rating_dist' => $row['rating_dist'] ?? '',
            'annual_value' => $row['annual_value'],
            'rate_payable' => $row['rate_payable'],
            'arrears' => $row['arrears'],
            'penalty' => $row['penalty'],
            'paid_amount' => $row['paid_amount'],
            'grand_total' => $row['grand_total'],
            'category' => $row['category'] ?? '',
            'group' => $row['group'] ?? '',
            'active' => $row['active'] ?? 1,
        ]);


        // return Jahi::create([
        //     "pid"           => $row[0],
        //     "occupant"      => $row[1],
        //     "prop_addr"     => $row[2],
        //     "street_name"   => $row[3],
        //     "asset_no"      => $row[4],
        //     "cadastral_zone"=> $row[5],
        //     "prop_type"     => $row[6],
        //     "prop_use"      => $row[7],
        //     "rating_dist"   => $row[8],
        //     "annual_value"  => $row[9],
        //     "rate_payable"  => $row[10],
        //     "arrears"       => $row[11],
        //     "penalty"       => $row[12],
        //     "paid_amount"   => $row[13],
        //     "grand_total"   => $row[14],
        //     "category"      => $row[15],
        //     "group"         => $row[16],
        //     "active"        => $row[17],
        // ]);
    }
} 