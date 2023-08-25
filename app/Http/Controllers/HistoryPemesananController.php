<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Tabib;
use Illuminate\Http\Request;

class HistoryPemesananController extends Controller
{
    public function index()
    {
        $data = Pemesanan::where('user_id', auth()->user()->id)->get();
        return view('user.historypemesanan', [
            'data' => $data,
        ]);
    }

    public function selesai($id)
    {
        $data = Pemesanan::find($id);
        $tabib = Tabib::where('nama_tabib', $data->nama_tabib)->first();

        if ($tabib) { // Pastikan $tabib ditemukan sebelum mengupdate.
            $tabib->status = 0;
            $tabib->save();
        }

        if ($data) { // Pastikan $tabib ditemukan sebelum mengupdate.
            $data->status = 3;
            $data->save();
            return redirect('/historypemesanan');
        }
    }
}
