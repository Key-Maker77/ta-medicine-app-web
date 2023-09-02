<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function penggunaadmin()
    {
        $admin = User::where('role','admin')->get();
        return view('pengguna.admin', compact('admin'));
    }

    public function penggunapasien()
    {
        $pasien = User::where('role','pasien')->get();
        return view('pengguna.pasien', compact('pasien'));
    }

    public function destroyadmin($id)
    {
        $data = User::where('id', $id)->delete();
        return redirect('/penggunaadmin')->with('warning', 'Data berhasil dihapus');
    }

    public function destroypasien($id)
    {
        $data = User::where('id', $id)->delete();
        return redirect('/penggunapasien')->with('warning', 'Data berhasil dihapus');
    }

    public function create()
    {
        return view(
            'pengguna.create');
    }

    public function store(Request $request)
    {
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->role = $request->role;


        if ($data->save()) {
            return redirect()->route('tambahdata')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('pengguna.create')->with('error', 'Data gagal ditambahkan');
        }
    }


}
