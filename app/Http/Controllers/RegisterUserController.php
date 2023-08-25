<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;

class RegisterUserController extends Controller
{
    public function register()
    {
        return view('user.registeruser');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->post('nama');
        $user->email = $request->post('email');
        $user->password = Hash::make($request->post('password'));
        $user->role = 'pasien';
        $user->save();

        if ($user) {
            //redirect dengan pesan sukses
            return redirect()->route('loginuser')->with(['success' => 'Data Saved Successfully!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('register')->with(['error' => 'Data Save Failed!']);
        }
    }
}
