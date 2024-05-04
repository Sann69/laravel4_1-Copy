<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('index');
    }

    public function showProducts()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'berat' => 'required|numeric',
            'gambar' => 'required|url',
            'kondisi' => 'required|in:Baru,Bekas',
            'deskripsi' => 'required',
        ]);

        Product::create($validatedData);

        return redirect('/products/list');
    }

    public function list()
    {
        $products = Product::all();
        return view('list', compact('products'));
    }

    public function edit(Product $product)
    {
    return view('edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'berat' => 'required|numeric',
            'gambar' => 'required|url',
            'kondisi' => 'required|in:Baru,Bekas',
            'deskripsi' => 'required',
        ]);

        $product->update($validatedData);

        return redirect('/products/list');
    }

    public function destroy(Product $product)
    {
    $product->delete();

    return redirect('/products/list');
    }

}
