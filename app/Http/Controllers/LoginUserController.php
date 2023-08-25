<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use DB;

class LoginUserController extends Controller
{
    public function loginuser()
    {
        // if (Auth::check()) {
        //     return redirect('dashboard');
        // } else {
            return view('user.loginuser');
        // }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $user = DB::table('users')->where('email', $request->email)->first();
            if ($user->role == 'admin') {
                return redirect('dashboard');
            } elseif ($user->role == 'pasien') {
                return redirect('homeuser');
            }
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
