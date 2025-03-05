<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class LifeCamp extends Model
{
    use HasFactory, Sortable;
    protected $fillable = [
        "pid",
        "occupant",
        "prop_addr",
        "street_name",
        "asset_no",
        "cadastral_zone",
        "prop_type",
        "prop_use",
        "rating_dist",
        "annual_value",
        "rate_payable",
        "arrears",
        "penalty",
        "paid_amount",
        "grand_total",
        "category",
        "group",
        "active"
    ];

    protected $appends = ['total_print'];

    public $sortable = ['pid','occupant','prop_addr','street_name','asset_no','cadastral_zone','prop_type','prop_use','rating_dist','annual_value','rate_payable','arrears','penalty','paid_amount','grand_total','category','group','active'];


    public function getTotalPrintAttribute(){
        // body
        return TotalDemandPrint::where('office_id', $this->id)->count();
    }
}
