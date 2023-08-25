<?php

namespace App\Http\Controllers;

use App\Models\Tabib;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class kelolaTabibController extends Controller
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
        $data = Tabib::where('status', 0)->get();
        return view(
            'kelolaTabib.index',
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
        return view(
            'kelolaTabib.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ambil = $request->file('gambar');
        $name = $ambil->getClientOriginalName();
        $namaFileBaru = uniqid() . '_' . $name; // Menambahkan _ untuk memastikan uniknya nama file
        $destinationPath = public_path('images'); // Path untuk menyimpan gambar

        $ambil->move($destinationPath, $namaFileBaru);

        $data = new Tabib();
        $data->nama_tabib = $request->nama_tabib;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->gambar = $namaFileBaru; // Menyimpan nama file gambar
        $data->nomor_sertifikasi = $request->nomor_sertifikasi;
        $data->keahlian = $request->keahlian;
        $data->nomor_hp = $request->nomor_hp;
        $data->status = $request->status;

        if ($data->save()) {
            return redirect()->route('kelolaTabib.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('kelolaTabib.create')->with('error', 'Data gagal ditambahkan');
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
        $tabib = Tabib::all();
        $data = Tabib::where('id', $id)->get()->first();
        return view('kelolaTabib.edit', compact('data', 'tabib'));
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
    $data = Tabib::find($id);
    
    $ambil = $request->file('gambar');
    
    if ($ambil) { // Periksa apakah ada gambar yang diunggah
        $name = $ambil->getClientOriginalName();
        $namaFileBaru = uniqid() . '_' . $name; // Menambahkan _ untuk memastikan uniknya nama file
        $destinationPath = public_path('images'); // Path untuk menyimpan gambar

        $ambil->move($destinationPath, $namaFileBaru);
        
        // Hapus gambar lama jika ada
        if ($data->gambar) {
            $oldImagePath = public_path('images') . '/' . $data->gambar;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $data->gambar = $namaFileBaru; // Update nama gambar dalam model
    }

    $data->nama_tabib = $request->post('nama_tabib');
    $data->tanggal_lahir = $request->post('tanggal_lahir');
    $data->jenis_kelamin = $request->post('jenis_kelamin');
    $data->nomor_sertifikasi = $request->post('nomor_sertifikasi');
    $data->keahlian = $request->post('keahlian');
    $data->nomor_hp = $request->post('nomor_hp');
    $data->status = $request->post('status');

    if ($data->save()) {
        return redirect()->route('kelolaTabib.index')->with('success', 'Data berhasil diubah');
    } else {
        return redirect()->route('kelolaTabib.edit', $id)->with('error', 'Data gagal diubah');
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
        $data = Tabib::where('id', $id)->delete();
        return redirect('/kelolaTabib')->with('warning','Data berhasil dihapus');
        
    }

}
