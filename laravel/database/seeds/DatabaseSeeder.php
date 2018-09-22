<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (config('app.env') == 'test') {
            $this->call(TestSeed::class);
            $this->call(AdminTableSeeder::class);
            $this->call(AuthorSeed::class);
            $this->call('ProductTableSeeder');
            $this->call('CatagoryTableSeeder');
            $this->call('AuthorChatroomTableSeeder');
            $this->call('ProductCatagoryTableSeeder');
    } else {
            $this->call(AdminTableSeeder::class);
        }
    }
}
