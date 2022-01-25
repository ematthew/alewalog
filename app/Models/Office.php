<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    
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
}
