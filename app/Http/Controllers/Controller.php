<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use App\Models\User;
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
    public function createMerchant()
    {
        return view('createmerchant');
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nama' => 'required',
    //         'harga' => 'required|numeric',
    //         'stok' => 'required|numeric',
    //         'berat' => 'required|numeric',
    //         'gambar' => 'required|url',
    //         'kondisi' => 'required|in:Baru,Bekas',
    //         'deskripsi' => 'required',
    //     ]);

    //     Product::create($validatedData);

    //     return redirect('/products/list');
    // }


    public function store(Request $request)
{
    $user = User::find(1); // Mengambil data user dengan ID tertentu

    $validatedData = $request->validate([
        'nama' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'berat' => 'required|numeric',
        'gambar' => 'required|url',
        'kondisi' => 'required|in:Baru,Bekas',
        'deskripsi' => 'required',
    ]);

    // Menyimpan data produk yang terkait dengan user
    $product = $user->products()->create($validatedData);

    return redirect('/products');
}

public function storeMerchant(Request $request)
{
    $user = User::find(2); // Mengambil data user dengan ID tertentu

    $validatedData = $request->validate([
        'nama' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'berat' => 'required|numeric',
        'gambar' => 'required|url',
        'kondisi' => 'required|in:Baru,Bekas',
        'deskripsi' => 'required',
    ]);

    // Menyimpan data produk yang terkait dengan user
    $product = $user->products()->create($validatedData);

    return redirect('/products');
}




    // public function list()
    // {
    //     $products = Product::all();
    //     return view('list', compact('products'));
    // }

    // public function list()
    // {
    //     // Mengambil semua data produk dengan foreign key user_id = 1
    //     $products = Product::where('user_id', 1)->get();
        
    //     return view('list', compact('products'));
    // }

    public function list($id)
    {
        // Mengambil semua data produk dengan foreign key user_id = 1
        $products = Product::where('user_id', $id)->get();
        
        return view('list', compact('products'));
    }

    public function listMerchant($id)
    {
        // Mengambil semua data produk dengan foreign key user_id = 1
        $products = Product::where('user_id', $id)->get();
        
        return view('listmerchant', compact('products'));
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

        return redirect('/products');
    }

    public function destroy(Product $product)
    {
    $product->delete();

    return redirect('/products');
    }

    // public function profile()
    // {
    //     return view('profile');
    // }

}
