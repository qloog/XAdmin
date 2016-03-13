<?php

use Illuminate\Database\Seeder;
use App\Models\User;

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

        User::create([
            'username'   => 'admin_demo',
            'email' => 'admin@test.com',
            'password' => bcrypt(12345678),
            'status' => 1
        ]);
    }
}
