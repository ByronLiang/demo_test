<?php

use Illuminate\Database\Seeder;

class AuthorChatroomTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('author_chatroom')->delete();
        
        \DB::table('author_chatroom')->insert(array (
            0 => 
            array (
                'id' => 3,
                'author_id' => 1,
                'room_no' => 'Schuppe_room1',
                'listener' => 'common_user',
                'pay_rule' => NULL,
                'created_at' => '2018-08-05 11:47:29',
                'updated_at' => '2018-08-05 11:47:29',
            ),
            1 => 
            array (
                'id' => 4,
                'author_id' => 2,
                'room_no' => 'super_Jedidiah_02',
                'listener' => 'pay_user',
                'pay_rule' => NULL,
                'created_at' => '2018-08-05 11:47:58',
                'updated_at' => '2018-08-05 11:47:58',
            ),
            2 => 
            array (
                'id' => 5,
                'author_id' => 4,
                'room_no' => 'Abby_04',
                'listener' => 'common_user',
                'pay_rule' => NULL,
                'created_at' => '2018-08-05 11:49:17',
                'updated_at' => '2018-08-05 11:49:17',
            ),
            3 => 
            array (
                'id' => 6,
                'author_id' => 14,
                'room_no' => 'Jenny_14',
                'listener' => 'common_user',
                'pay_rule' => NULL,
                'created_at' => '2018-08-05 11:54:24',
                'updated_at' => '2018-08-05 11:54:24',
            ),
        ));
        
        
    }
}
