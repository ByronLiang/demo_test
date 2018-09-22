<?php

use Illuminate\Database\Seeder;

class ProductCatagoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_catagory')->delete();
        
        \DB::table('product_catagory')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 2,
                'catagory_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 2,
                'catagory_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'product_id' => 1,
                'catagory_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'product_id' => 1,
                'catagory_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'product_id' => 3,
                'catagory_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'product_id' => 3,
                'catagory_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
