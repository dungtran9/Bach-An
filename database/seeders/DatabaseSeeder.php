<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use ProductsTableSeeder;
use UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new \App\User();
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $product = new \App\Product();
        $product->name = "Apple Macbook Pro Touch Bar 2019 MV962";
        $product->price = 44450000;
        $product->decs = "Apple Macbook Pro Touch Bar 2019 MV962 - 13 Inches (i5/ 8GB/ 256GB) - Hàng Chính Hãng";
        $product->qty = 26;
        $product->image = "https://salt.tikicdn.com/cache/280x280/ts/product/4f/df/60/98a0be169cc6c1fd9a3d9a5b5eed4e02.jpg";
        $product->save();

        $product = new \App\Product();
        $product->name = "Apple Macbook Pro Touch Bar 2019 - 13 inches";
        $product->price = 41999000;
        $product->decs = "Apple Macbook Pro Touch Bar 2019 - 13 inches (i5/ 8GB/ 256GB) - Hàng Nhập Khẩu Chính Hãng";
        $product->qty = 56;
        $product->image = "https://salt.tikicdn.com/cache/280x280/ts/product/ce/22/c5/4bf5df5b0644c79e5ee28b11a3aea1ab.jpg";
        $product->save();
        // User::factory(10)->create();
//        $this->call(UsersTableSeeder::class);
//        $this->call(ProductsTableSeeder::class);

    }
}
