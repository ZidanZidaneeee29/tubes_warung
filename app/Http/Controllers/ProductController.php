<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Mengambil semua data produk
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:5|unique:products,code',
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        Product::create([
            'code' => $request->code,
            'name' => $request->name,
            'stock' => $request->stock,
            'harga' => $request->harga,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
{
    $product = Product::findOrFail($id); // Mencari produk berdasarkan ID
    return view('products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'code' => 'required|string|max:5|unique:products,code,' . $id,
        'name' => 'required|string|max:255',
        'stock' => 'required|integer|min:0',
        'harga' => 'required|numeric|min:0',
    ]);

    $product = Product::findOrFail($id); // Mencari produk berdasarkan ID
    $product->update([
        'code' => $request->code,
        'name' => $request->name,
        'stock' => $request->stock,
        'harga' => $request->harga,
    ]);

    return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
}

public function destroy($id)
{
    $product = Product::findOrFail($id); // Cari produk berdasarkan ID
    $product->delete(); // Hapus produk

    return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
}


}
