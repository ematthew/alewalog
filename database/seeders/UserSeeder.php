<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'id' => 1,
                'user_type' => "super",


            ],
        ];

        foreach ($users as $key => $value) {
            $already_exist = User::where("id", $value['id'])->first();
            if($already_exist !== null){
                $user = User::where("id", 1)->findorFail($value['id']);
                $user->user_type = $value['user_type'];
                // $user->referral_token = $value['referral_token'];
                $user->update();
            }
        }
    }
}
