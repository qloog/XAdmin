<?php

use Illuminate\Database\Seeder;
use App\Models\User;
require_once __DIR__ . '/../../vendor/autoload.php';

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('role_user')->delete();

        // init super admin
        User::create([
            'username'   => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt(12345678),
            'status' => 1
        ]);

        $faker = Faker\Factory::create('zh_CN');

        for ($i=0; $i<30; $i++) {

            $role = User::create([
                'username'   => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt(12345678),
                'status' => 1
            ]);
        }
    }
}
