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
            array('name' => '超级管理员', 'slug' => 'administrator'),
            array('name' => '华北大区管理员', 'slug' => 'northern_admin'),
            array('name' => '华东大区管理员', 'slug' => 'eastern_admin'),
            array('name' => '华南大区管理员', 'slug' => 'south_admin')
        );

        foreach ($roleArr as $role) {
            $role = \App\Models\Role::create([
                'role_name'   => $role['name'],
                'role_slug' => $role['slug'],
                'role_description' => '角色说明...',
            ]);

            DB::insert('insert into role_user (role_id, user_id) values (?, ?)', [$role->id, 1]);
        }

    }
}
