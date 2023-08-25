<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;

class StatusPemesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function statuspemesanan($id)
{
    $pemesanan = Pemesanan::find($id);

    if (!$pemesanan) {
        // Handle jika pemesanan dengan ID tertentu tidak ditemukan
        abort(404, 'Pemesanan tidak ditemukan');
    }

    return view('user.statuspemesanan', compact('pemesanan'));
}

}
