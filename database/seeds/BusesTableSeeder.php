<?php

use Illuminate\Database\Seeder;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //模拟创建十辆车
        factory(\App\Bus::class, 10)->create();
    }
}
