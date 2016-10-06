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
            array('name' => 'add_user', 'display_name' => '添加用户'),
            array('name' => 'delete_user', 'display_name' => '删除用户'),
            array('name' => 'add_news', 'display_name' => '添加新闻'),
            array('name' => 'edit_news', 'display_name' => '编辑新闻')
        );

        foreach ($permissionArr as $perm) {
            $permission = \App\Models\Permission::create([
                'name'   => $perm['name'],
                'display_name' => $perm['display_name'],
                'description' => '',
            ]);

            DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [$permission->id, 1]);
        }
    }
}
