<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pengobatan;
use App\Models\Tabib;
use Illuminate\Http\Request;

class kelolaPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function index()
    {
        $data = Pemesanan::where('status', 0)->get();
        return view(
            'kelolaPemesanan.index',
            [
                'data' => $data
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengobatan = Pengobatan::all();
        $tab = Tabib::all();
        return view(
            'kelolaPemesanan.create',
            compact('tab','pengobatan')
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            return redirect()->route('kelolaPemesanan.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('kelolaPemesanan.create')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tabib = Pemesanan::all();
        $data = Pemesanan::where('id', $id)->get()->first();
        return view('kelolaPemesanan.edit', compact('data', 'pemesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Pemesanan::find($id);

        $data->nama_pasien = $request->post('nama_pasien');
        $data->jadwal = $request->post('jadwal');
        $data->jam = $request->post('jam');
        $data->alamat = $request->post('alamat');
        $data->jenis_pengobatan = $request->post('jenis_pengobatan');
        $data->nama_tabib = $request->post('nama_tabib');


        if ($data->save()) {
            return redirect()->route('kelolaPemesanan.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('kelolaPemesanan.edit', ($id))->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pemesanan::where('id', $id)->delete();
        return redirect('/kelolaPemesanan')->with('warning', 'Data berhasil dihapus');
    }


    
}
