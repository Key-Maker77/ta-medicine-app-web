<?php

namespace App\Http\Controllers;

use App\Models\Pengobatan;
use Illuminate\Http\Request;

class kelolaPengobatanController extends Controller
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
        $data = Pengobatan::all();
        return view(
            'kelolaPengobatan.index',
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
            'kelolaPengobatan.create');
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

        $data = new Pengobatan();
        $data -> nama_pengobatan = $request->nama_pengobatan;
        $data->gambar = $namaFileBaru;
        $data -> penjelasan = $request->penjelasan;
        $data -> manfaat = $request->manfaat;


        if ($data -> save()){
            return redirect()->route('kelolaPengobatan.index')->with('success','Data berhasil ditambahkan');
        }
        else{
            return redirect()->route('kelolaPengobatan.create')->with('error','Data gagal ditambahkan');
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
        $pengobatan = Pengobatan::all();
        $data = Pengobatan::where('id', $id)->get()->first();
        return view('kelolaPengobatan.edit', compact('data', 'pengobatan'));
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
    $data = Pengobatan::find($id);

    $ambil = $request->file('gambar');

    if ($ambil) { // Periksa apakah ada gambar yang diunggah
        $name = $ambil->getClientOriginalName();
        $namaFileBaru = uniqid() . '_' . $name; // Menambahkan _ untuk memastikan uniknya nama file
        $destinationPath = public_path('images'); // Path untuk menyimpan gambar

        $ambil->move($destinationPath, $namaFileBaru);
        $data->gambar = $namaFileBaru; // Update nama gambar dalam model
    }

    $data->nama_pengobatan = $request->post('nama_pengobatan');
    $data->penjelasan = $request->post('penjelasan');
    $data->manfaat = $request->post('manfaat');

    if ($data->save()) {
        return redirect()->route('kelolaPengobatan.index')->with('success', 'Data berhasil diubah');
    } else {
        return redirect()->route('kelolaPengobatan.edit', $id)->with('error', 'Data gagal diubah');
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
        $data = Pengobatan::where('id', $id)->delete();
        return redirect('/kelolaPengobatan')->with('warning','Data berhasil dihapus');
    }
}
