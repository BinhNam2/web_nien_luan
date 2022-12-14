<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'email' => 'binhnam1@gmail.com',
                'password' => bcrypt('123456'),
                'level' => 1
            ],
            [
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'level' => 1
            ],
            [
                
                    'email' => 'aitrinh@gmail.com',
                    'password' => bcrypt('123456'),
                    'level' => 1
                   
            ]           
        ];
        DB::table('vp_users')->insert($data);
    }
}
