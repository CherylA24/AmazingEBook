<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'role_id'=>1,
            'gender_id'=>1,
            'first_name'=>'admin',
            'middle_name'=>'kece',
            'last_name'=>'bingitz',
            'email'=>'admin123@admin.com',
            'display_picture_link'=>'images/adminkece.jpeg',
            'password'=>Hash::make('admin123')
        ]);
        DB::table('accounts')->insert([
            'role_id'=>2,
            'gender_id'=>2,
            'first_name'=>'user',
            'middle_name'=>'cantiq',
            'last_name'=>'warbiasyah',
            'email'=>'user123@user.com',
            'display_picture_link'=>'images/usercntq.jpeg',
            'password'=>Hash::make('cantiq123')
        ]);
    }
}
