<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $permissionArr = array(
            array('name' => '添加用户', 'slug' => 'add_user'),
            array('name' => '删除用户', 'slug' => 'delete_user'),
            array('name' => '添加活动', 'slug' => 'add_event'),
            array('name' => '删除活动', 'slug' => 'delete_event')
        );

        foreach ($permissionArr as $perm) {
            $permission = \App\Models\Permission::create([
                'permission_name'   => $perm['name'],
                'permission_slug' => $perm['slug'],
                'permission_description' => '角色说明...',
            ]);

            DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [$permission->id, 1]);
        }
    }
}
