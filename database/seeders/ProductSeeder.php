<?php
namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'code' => 'P001',
            'name' => 'Produk A',
            'stock' => 50,
            'harga' => 15000.00,
            'created_at' =>now(),
            'updated_at' =>now(),

        ]);

        Product::create([
            'code' => 'P002',
            'name' => 'Produk B',
            'stock' => 30,
            'harga' => 20000.00,
        ]);

        Product::create([
            'code' => 'P003',
            'name' => 'Produk C',
            'stock' => 20,
            'harga' => 10000.00,
        ]);
    }
}
