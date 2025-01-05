<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seeder untuk tabel kategori
        DB::table('kategori')->insert([
            ['name' => 'Electronics'],
            ['name' => 'Clothing'],
            ['name' => 'Home Appliances'],
        ]);

        // Seeder untuk tabel produk
        DB::table('produk')->insert([
            ['name' => 'Laptop', 'category_id' => 1, 'price' => 1000],
            ['name' => 'T-shirt', 'category_id' => 2, 'price' => 20],
            ['name' => 'Washing Machine', 'category_id' => 3, 'price' => 500],
        ]);

        // Seeder untuk tabel user
        DB::table('user')->insert([
            ['name' => 'John Doe', 'email' => 'john@example.com'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
        ]);

    }
}
