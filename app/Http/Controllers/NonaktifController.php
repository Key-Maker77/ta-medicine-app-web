<?php

namespace App\Http\Controllers;

use App\Models\Tabib;

use Illuminate\Http\Request;

class NonaktifController extends Controller
{
    public function nonaktif($id)
    {
        $data = Tabib::find($id);

        if ($data) {
            $data->status = 1; 
            $data->save();     
            return redirect()->back()->with('success', 'Tabib Tidak Aktif.');
        } else {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }
    }

    public function vNonAktif()
    {
        $nonaktif = Tabib::where('status', 1)->get();
        return view('kelolaTabib.nonaktif', compact('nonaktif'));
    }

    public function aktif($id)
    {
        $data = Tabib::find($id);

        if ($data) {
            $data->status = 0; 
            $data->save();     
            return redirect()->back()->with('success', 'Tabib Aktif.');
        } else {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }
    }
    public function vAktif()
    {
        $aktif = Tabib::where('status', 0)->get();
        return view('kelolaTabib.index', compact('aktif'));
    }
}
