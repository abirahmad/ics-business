<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            ['role' => 'Admin'],
            ['role' => 'Customer'],
            ['role' => 'Seller'],
        ]);

        DB::table('user_status')->insert([
            ['status' => 'Active'],
            ['status' => 'Inactive'],
        ]);

        User::create([
            'name' => 'Abir Ahmad',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 1,
            'shop_name' => 'Bata',
            'shop_url' => 'bata',
            'role_id' => 1,
            'status_id' => 1,
        ]);

        User::create([
            'name' => 'Test Seller',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('123456'),
            'shop_name' => 'Test Shop',
            'shop_url' => 'test-shop',
            'role_id' => 3,
            'status_id' => 1,
        ]);

        User::create([
            'name' => 'Abir Ahmad',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('123456'),
            'shop_name' => 'Bata',
            'shop_url' => 'bata',
            'role_id' => 2,
            'status_id' => 1,
        ]);
    }
}
