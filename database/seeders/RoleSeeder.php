<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_of_roles = [
        	"Admin",
        	"Data Officer",
        	"Payment Officer",
        	"Print Notice Officer",
        	"Demand Notice Officer",
        ];

        foreach ($list_of_roles as $key => $role) {
        	$already_exist = Role::where("name", $role)->first();
        	if($already_exist == null){
        		$new_role = new Role();
        		$new_role->name = $role;
        		$new_role->save();
        	}
        }
    }
}
