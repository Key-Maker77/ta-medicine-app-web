<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengobatan;
use App\Models\Tabib;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pemesanan()
    {
        $pengobatan = Pengobatan::all();
        $tab = Tabib::where('status', 0)->get();
        return view(
            'user.pemesanan',
            compact('tab','pengobatan')
        );
    }

    public function store(Request $request)
    {
        $data = new Pemesanan();
        $data-> user_id = auth()->user()->id;
        $data->nama_pasien = $request->nama_pasien;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->no_hp = $request->no_hp;
        $data->jadwal = $request->jadwal;
        $data->jam = $request->jam;
        $data->alamat = $request->alamat;
        $data->jenis_pengobatan = $request->jenis_pengobatan;
        $data->nama_tabib = $request->nama_tabib;
        $data->harga = $request->harga;
        $data->status = $request->status;


        if ($data->save()) {
            return redirect('/statuspemesanan/'.$data->id.'');
        } else {
            return redirect()->route('pemesanan')->with('error', 'Data gagal ditambahkan');
        }
    }
}
