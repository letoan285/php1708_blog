<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        	['name' => 'Thể thao', 'slug'=>'the-thao'],
        	['name' => 'Xã hội', 'slug'=>'xa-hoi'],
        	['name' => 'Kinh tế', 'slug'=> 'kinh-te'],
        	['name' => 'Chính trị', 'slug' => 'chinh-tri'],
        	['name' => 'Pháp luật', 'slug' => 'phap-luat'],
        	['name' => 'Giải trí', 'slug' => 'giai-tri']
        ];
        DB::table('categories')->insert($categories);
    }
}
