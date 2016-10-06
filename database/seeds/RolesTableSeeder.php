<?php

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
        DB::table('roles')->delete();

        $roleArr = array(
            array('name' => 'admin', 'display_name' => 'administrator', 'description' => '超级管理员'),
            array('name' => 'news_admin', 'display_name' => '新闻管理', 'description' => '管理新闻'),
            array('name' => 'user_admin', 'display_name' => '用户管理', 'description' => '管理用户'),
        );

        foreach ($roleArr as $role) {
            $role = \App\Models\Role::create([
                'name'   => $role['name'],
                'display_name' => $role['display_name'],
                'description' => 'description',
            ]);

            DB::insert('insert into role_user (role_id, user_id) values (?, ?)', [$role->id, 1]);
        }

    }
}
