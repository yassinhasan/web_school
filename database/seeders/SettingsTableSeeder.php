<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("settings")->delete();
        $data= [
            ['key'=> 'website_email', 'value'=> 'figo781@gmail.com'],
            ['key'=> 'phone_number', 'value'=> '00966546035917'],
            ['key'=> 'zoom_email', 'value'=> 'hasanmeady781@gmail.com'],
            ['key'=> 'intro_text', 'value'=> "Hello.,I'm,Hassan,And, I'm,A Full,Stack,Developer,This Site ,Made By,, Hassan Meady"],
            ['key'=> 'chat_image', 'value'=> 'chat.jpg'],
            ['key'=> 'logo_image', 'value'=> 'logo.jpg'],
        ];
        DB::table('settings')->insert($data);
    }
}
