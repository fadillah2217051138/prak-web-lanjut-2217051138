<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($nama =''){
        $data = [
            'nama' => $nama,
            'kelas' => 'A',
            'npm' => '2217051138'        
        ];
        return view('profile', $data);
    }
}
