<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MenuRole;

class Menu extends Model
{
    use HasFactory;


    public function menuRoles(){
        return $this->hasMany(MenuRole::class);
    }
}
