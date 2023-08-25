<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pengobatan;
use App\Models\Tabib;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pemesanans =  Pemesanan::where('status','0')->count();
        $pengobatans = Pengobatan::count();
        $tabibs = Tabib::where('status','0')->count();
        $diterima =  Pemesanan::where('status','1')->count();
        $ditolak =  Pemesanan::where('status','2')->count();

        return view('home', compact('pemesanans', 'pengobatans', 'tabibs','diterima','ditolak'));
    }


}
