<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //创建管理员角色，角色权限为 9
        Role::create([
            'name' => 'admin',
            'description' => '拥有管理员权限',
            'level' => 9
        ]);

        //创建普通用户角色，角色权限为 0
        Role::create([
            'name' => 'user',
            'description' => '拥有普通用户权限',
            'level' => 0
         ]);


    }
}
