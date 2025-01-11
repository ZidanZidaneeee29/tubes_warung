<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product; // Pastikan Anda mengimpor model Product
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')->get(); // Mengambil transaksi dengan relasi produk
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all(); // Mengambil semua produk untuk dropdown
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
{
    $request->validate([
        'code' => 'required|string|max:7',
        'date' => 'required|date',
        'total' => 'required|numeric',
        'produk_id' => 'required|exists:products,id', // Pastikan nama kolom sesuai
    ]);

    // Jika menggunakan Carbon untuk memastikan format tanggal
    $date = \Carbon\Carbon::parse($request->date)->format('Y-m-d');

    // Simpan data transaksi
    Transaction::create([
        'code' => $request->code,
        'date' => $date, // Gunakan tanggal yang sudah diformat
        'total' => $request->total,
        'produk_id' => $request->produk_id,
    ]);

    return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan!');
}


}