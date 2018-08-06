<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => 'Admin',
        ]);

        DB::table('roles')->insert([
            'role' => 'Member',
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator',
            'email'=> 'administrator@admin.com',
            'password'=> Hash::make('administrator'),
            'role_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email'=> 'user@user.com',
            'password'=> Hash::make('secret'),
            'role_id' => 2,
        ]);
    }
}
