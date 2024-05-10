<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use stdClass;

class UserController extends Controller
{

    public function callSession(Request $request)
    {
        return redirect()->back()->with('status', 'Berhasil memanggil sesi');
    }

    public function getAdmin(User $user)
    {
        $products = Product::where('user_id', $user->id)->get();
        return view('admin_page', ['products' => $products, 'user' => $user]);
    }

    public function editProduct(Request $request, User $user, Product $product)
    {
        return view('edit_product', ['product' => $product, 'user' => $user]);
    }

    // public function updateProduct(Request $request, User $user, Product $product)
    // {

    //     if ($product->user_id === $user->id) {
    //         $product->nama = $request->nama;
    //         $product->stok = $request->stok;
    //         $product->berat = $request->berat;
    //         $product->harga = $request->harga;
    //         $product->deskripsi = $request->deskripsi;
    //         $product->kondisi = $request->kondisi;
    //         $product->gambar = $request->gambar;
    //         $product->save();
    //     }

    //     return redirect()->route('admin_page', ['user' => $user->id])->with('message', 'Berhasil update data');
    // }


    public function updateProduct(Request $request, User $user, Product $product)
    {
        // Validasi input
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048', // Ubah gambar jika diunggah
        ]);
    
        if ($product->user_id === $user->id) {
            // Update data produk
            $product->nama = $request->nama;
            $product->stok = $request->stok;
            $product->berat = $request->berat;
            $product->harga = $request->harga;
            $product->deskripsi = $request->deskripsi;
            $product->kondisi = $request->kondisi;
    
            // Ubah gambar jika diunggah
            if ($request->hasFile('gambar')) {
                // Simpan gambar baru
                $gambarPath = $request->file('gambar')->store('public/gambar');
                $product->gambar = basename($gambarPath);
            }
    
            // Simpan perubahan produk
            $product->save();
            
            return redirect()->route('admin_page', ['user' => $user->id])->with('message', 'Berhasil update data');
        }
    
    }


    public function deleteProduct(Request $request, User $user, Product $product)
    {
        if ($product->user_id === $user->id) {
            $product->delete();
        }
        return redirect()->back()->with('status', 'Berhasil menghapus data');
    }

    public function handleRequest(Request $request, User $user)
    {
        return view('handle_request', ['user' => $user]);
    }

    // public function postRequest(Request $request, User $user)
    // {

    //     Product::create([
    //         'user_id' => $user->id,
    //         'gambar' => $request->gambar,
    //         'nama' => $request->nama,
    //         'berat' => $request->berat,
    //         'harga' => $request->harga,
    //         'kondisi' => $request->kondisi,
    //         'stok' => $request->stok,
    //         'deskripsi' => $request->deskripsi,
    //     ]);

    //     // return redirect()->route('get_product');
    //     return redirect()->route('admin_page', ['user' => $user->id]);
    // }

        public function postRequest(Request $request, User $user)
    {
        // Validasi form
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048', // validasi untuk gambar
            // tambahkan validasi untuk input lainnya
        ]);

        // Simpan gambar ke penyimpanan lokal (storage/app/public/gambar)
        $gambarPath = $request->file('gambar')->store('public/gambar');

        // Ambil nama file gambar
        $gambarName = basename($gambarPath);

        // Buat record baru di database
        Product::create([
            'user_id' => $user->id,
            'gambar' => $gambarName,
            'nama' => $request->nama,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'kondisi' => $request->kondisi,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin_page', ['user' => $user->id]);
    }



    public function getProduct()
    {
        $products = Product::all();
        //. $user = User::find(1);
        //. $data = $user->products;
        return view('products')->with('products', $products);

    }


    public function getProfile(Request $request, User $user)
    {
        $user = User::with('summarize')->find($user->id);
        // dd($user);
        return view('profile', ['user' => $user]);
    }
}
