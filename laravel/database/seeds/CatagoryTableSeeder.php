<?php

use Illuminate\Database\Seeder;

class CatagoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('catagory')->delete();
        
        \DB::table('catagory')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '艺术',
                'created_at' => NULL,
                'updated_at' => NULL,
                'img_url' => '/upload/1530423818647.jpg',
                'number' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '科学',
                'created_at' => NULL,
                'updated_at' => NULL,
                'img_url' => NULL,
                'number' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '科幻',
                'created_at' => NULL,
                'updated_at' => NULL,
                'img_url' => '/upload/1529124562978.jpg',
                'number' => 3,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '易经',
                'created_at' => NULL,
                'updated_at' => NULL,
                'img_url' => NULL,
                'number' => 5,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '电影',
                'created_at' => NULL,
                'updated_at' => NULL,
                'img_url' => '/upload/1530423853848.jpg',
                'number' => 4,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '魔术',
                'created_at' => NULL,
                'updated_at' => NULL,
                'img_url' => '/upload/1531922569595.jpg',
                'number' => 6,
            ),
            6 => 
            array (
                'id' => 9,
                'name' => '萧乐',
                'created_at' => NULL,
                'updated_at' => NULL,
                'img_url' => NULL,
                'number' => 7,
            ),
            7 => 
            array (
                'id' => 10,
                'name' => '安静',
                'created_at' => NULL,
                'updated_at' => NULL,
                'img_url' => NULL,
                'number' => 8,
            ),
            8 => 
            array (
                'id' => 11,
                'name' => '流行乐',
                'created_at' => NULL,
                'updated_at' => NULL,
                'img_url' => NULL,
                'number' => 9,
            ),
            9 => 
            array (
                'id' => 12,
                'name' => '宠物乐园',
                'created_at' => NULL,
                'updated_at' => NULL,
                'img_url' => 'http://pa9jr09c8.bkt.clouddn.com/1529120952648.jpg',
                'number' => 10,
            ),
        ));
        
        
    }
}
