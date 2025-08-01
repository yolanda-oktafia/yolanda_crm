<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = ['Internet Personal', 'Internet Bisnis', 'Layanan Tambahan'];
        $statuses = ['Aktif', 'Tidak Aktif'];

        return view('products.create', compact('categories', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string',
            'status' => 'required|string',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Produk baru berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        // Data untuk dropdown
        $categories = ['Internet Personal', 'Internet Bisnis', 'Layanan Tambahan'];
        $statuses = ['Aktif', 'Tidak Aktif'];

        return view('products.edit', compact('product', 'categories', 'statuses'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil dihapus.');
    }
}
