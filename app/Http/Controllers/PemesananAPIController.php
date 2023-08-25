<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Pemesanan;

class PemesananAPIController extends Controller
{
    public function createPemesanan(Request $request)
    {
        $data = new Pemesanan();
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
            return response()->json(['message' => 'Data berhasil ditambahkan', 'data' => $data], 200);
        } else {
            return response()->json(['message' => 'Data gagal ditambahkan'], 500);
        }
    }

    public function show($id)
    {
        $pemesanas = Pemesanan::find($id);
        return response()->json(['message'=>'success', 'data'=>$pemesanas]);
    }

}




