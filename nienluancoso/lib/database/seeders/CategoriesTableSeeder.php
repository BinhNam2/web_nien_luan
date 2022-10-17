<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
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
                'cate_name' => 'iphone',        
                'cate_slug' => str::slug('iphone') //Thay thế cho hàm str_slug
            ],
            [
                'cate_name' => 'samsung',        
                'cate_slug' => str::slug('samsung')
            ],
            [
                'cate_name' => 'Macbook',        
                'cate_slug' => str::slug('Macbook') //Thay thế cho hàm str_slug
            ]
        ];
        DB::table('vp_categories')->insert($data);
    }
}
