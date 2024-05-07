<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // public function userProfile(){
    //     //mengambil data user beserta profile nya
    //     $users = User::latest()->get();

    //     return view('profile', compact('users'));
    // }


    // public function userProfile(){
    //     // Mengambil data user dengan id 1
    //     $user = User::findOrFail(1);

    //     // Mengirim data user ke view profile
    //     return view('profile', compact('user'));
    // }

    public function userProfile($id)
    {
        // Mengambil data user dengan id yang diberikan
        $user = User::findOrFail($id);

        return view('profile', compact('user'));
    }

    public function userProfileMerchant($id)
    {
        // Mengambil data user dengan id yang diberikan
        $user = User::findOrFail($id);

        return view('profilemerchant', compact('user'));
    }


    public function createUserProfile()
    {
        // Membuat user baru
        $user = new User();
        $user->nama = 'Gede';
        $user->email = 'gede@gmail.com';
        $user->gender = 'male';
        $user->umur = 21;
        $user->tgl_lahir = '2003-05-07';
        $user->alamat = 'Jl. Cemara No. 321';
        $user->save();

        //Membuat profile baru
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->nama_toko = 'Toko Serba Ada';
        $profile->rate = 5;
        $profile->produk_terbaik = 'PC Kentang';
        $profile->deskripsi = 'toko ini termurah di muka bumi';
        $profile->save();
        
    }
}
