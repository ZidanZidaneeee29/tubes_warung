<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Product;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $products = Product::all();

        if ($products->isEmpty()) {
            echo "No products found. Please seed the products table first.\n";
            return;
        }

        foreach ($products as $index => $product) {
            Transaction::create([
                'code' => 'T00' . ($index + 1), // Kode transaksi dinamis (T001, T002, ...)
                'date' => Carbon::now()->subDays($index)->format('Y-m-d'), // Tanggal transaksi bervariasi
                'total' => rand(50000, 150000), // Total transaksi acak antara 50,000 hingga 150,000
                'product_id' => $product->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
