<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->delete();
        $data= [
            'name' =>'hasan',
            'email' => 'hasanmeady781@gmail.com' ,
            'password'=> Hash::make('hasan123456'),
            'clear_password'=> 'hasan123456'
        ];
        DB::table('users')->insert($data);
    }

}
