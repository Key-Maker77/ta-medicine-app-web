<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengobatan;

class PengobatanInformasiController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function pengobataninformasi()
    {
        $data = Pengobatan::all();
        return view(
            'user.pengobataninformasi',
            [
                'data' => $data
            ]
        );
    }
    public function show(Pengobatan $pengobatan)
    {
        $pengobatan = Pengobatan::find($pengobatan)->first();
        return view('user.pengobataninformasi', compact('pengobatan'));
    }

}
