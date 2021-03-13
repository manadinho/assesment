<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@user.com',
            'type' => 'user',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'type' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'super_admin@superadmin.com',
            'type' => 'super_admin',
            'password' => Hash::make('123456'),
        ]);
        DB::table('languages')->insert([
            'short_code' => 'ar',
            'is_active' => 1,
            'title' => 'العربي',
        ]);
        DB::table('languages')->insert([
            'short_code' => 'en',
            'is_active' => 1,
            'title' => 'English',
        ]);
    }
}
