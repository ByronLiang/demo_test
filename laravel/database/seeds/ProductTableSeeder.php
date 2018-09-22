<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product')->delete();
        
        \DB::table('product')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'holo',
                'price' => 20,
                'online_date' => NULL,
                'author_id' => 1,
                'video' => 'http://pa9jr09c8.bkt.clouddn.com/1529138220090.mp4',
                'type' => '["1", "2"]',
                'recommend' => 0,
                'video_poster' => '["http://pa9jr09c8.bkt.clouddn.com/1529138220090.mp4?vframe/jpg/offset/5/w/200/h/150", "http://pa9jr09c8.bkt.clouddn.com/1529138220090.mp4?vframe/jpg/offset/92/w/200/h/150", "http://pa9jr09c8.bkt.clouddn.com/1529138220090.mp4?vframe/jpg/offset/181/w/200/h/150", "http://pa9jr09c8.bkt.clouddn.com/1529138220090.mp4?vframe/jpg/offset/187/w/200/h/150", "http://pa9jr09c8.bkt.clouddn.com/1529138220090.mp4?vframe/jpg/offset/194/w/200/h/150"]',
                'video_node' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Space Man',
                'price' => 10,
                'online_date' => NULL,
                'author_id' => 2,
                'video' => 'http://pa9jr09c8.bkt.clouddn.com/1529208658823.mp4',
                'type' => '["2", "3"]',
                'recommend' => 1,
                'video_poster' => '["http://pa9jr09c8.bkt.clouddn.com/1529208658823.mp4?vframe/jpg/offset/6/w/200/h/150", "http://pa9jr09c8.bkt.clouddn.com/1529208658823.mp4?vframe/jpg/offset/41/w/200/h/150", "http://pa9jr09c8.bkt.clouddn.com/1529208658823.mp4?vframe/jpg/offset/62/w/200/h/150", "http://pa9jr09c8.bkt.clouddn.com/1529208658823.mp4?vframe/jpg/offset/67/w/200/h/150", "http://pa9jr09c8.bkt.clouddn.com/1529208658823.mp4?vframe/jpg/offset/100/w/200/h/150", "http://pa9jr09c8.bkt.clouddn.com/1529208658823.mp4?vframe/jpg/offset/127/w/200/h/150"]',
                'video_node' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'World Cup',
                'price' => 5,
                'online_date' => NULL,
                'author_id' => 4,
                'video' => 'http://pa9jr09c8.bkt.clouddn.com/1530539981032.mp4',
                'type' => '["12", "11"]',
                'recommend' => 1,
                'video_poster' => '["http://pa9jr09c8.bkt.clouddn.com/1530539981032.mp4?vframe/jpg/offset/4/w/200/h/150", "http://pa9jr09c8.bkt.clouddn.com/1530539981032.mp4?vframe/jpg/offset/9/w/200/h/150"]',
                'video_node' => NULL,
            ),
        ));
        
        
    }
}
