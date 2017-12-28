<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
        	['name'=> 'Nhười lớn', 'slug' =>'nguoi-lon'],
        	['name'=> 'Thích ăn chơi', 'slug'=> 'thich-an-choi'],
        	['name'=> 'Khám phá', 'slug'=> 'kham-pha'],
        	['name'=> 'Người việt năm châu', 'slug'=> 'nguoi-viet-nam-chau'],
        	['name'=> 'Sinh viên', 'slug'=> 'sinh-vien']
        ];
        DB::table('tags')->insert($tags);
    }
}
