<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class MenuRole extends Model
{
    use HasFactory;

    protected $appends = ['role'];

    public function getRoleAttribute(){

    	return Role::where('id', $this->role_id)->first();
    }
}
