<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Pemesanan;
use App\Models\Tabib;
use Barryvdh\DomPDF\Facade as PDF;

class kelolaLaporanController extends Controller
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
        return view(
            '.index',
        );
    }

    public function pesananditerima($id)
    {

        $data = Pemesanan::find($id);
        $tabib = Tabib::where('nama_tabib', $data->nama_tabib)->first();

        if ($tabib) { // Pastikan $tabib ditemukan sebelum mengupdate.
            $tabib->status = 1;
            $tabib->save();
        }


        if ($data) {
            $data->status = 1; // Mengubah status menjadi 1 (Diterima)
            $data->save();   // Menyimpan perubahan
            return redirect()->back()->with('success', 'Pesanan diterima.');
        } else {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }
    }
    public function vPesananDiterima()
    {
        $diterima = Pemesanan::where('status', 1)
            ->orWhere('status', 3)
            ->get();

        return view('laporan.diterima.index', compact('diterima'));
    }


    public function vPesananDitolak()
    {
        $ditolak = Pemesanan::where('status', 2)->get();
        return view('laporan.ditolak.index', compact('ditolak'));
    }


    public function pesananditolak($id)
    {
        $data = Pemesanan::find($id);

        if ($data) {
            $data->status = 2; // Mengubah status menjadi 1 (Diterima)
            $data->save();     // Menyimpan perubahan
            return redirect()->back()->with('success', 'Pesanan ditolak.');
        } else {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        $post = Pemesanan::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Post berhasil dihapus.');
    }


    public function cetakPdf(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Query untuk mengambil data berdasarkan bulan dan tahun di jadwal
        $diterima = Pemesanan::whereYear('jadwal', $tahun)
            ->whereMonth('jadwal', $bulan)
            ->whereIn('status', [1, 3])
            ->get();

        // Tampilkan hasil sortiran dalam PDF
        return view('laporan.diterima.cetak', compact('diterima', 'bulan', 'tahun'));

    }

    public function cetakditolak()
    {
        $cetakditolak = Pemesanan::where('status', 2)->get();
        return view('laporan.ditolak.cetak', compact('cetakditolak'));
    }

    public function fecth(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Misalnya, jika Anda menggunakan model Pemesanan, Anda dapat mengambil data berdasarkan bulan dan tahun seperti ini:
        $diterima = Pemesanan::whereYear('jadwal', $tahun)
            ->whereMonth('jadwal', $bulan)
            ->whereIn('status', [1, 3]) // Menggunakan whereIn untuk memfilter status 1 dan 3
            ->get();

        return view('laporan.diterima.output', ['diterima' => $diterima, 'bulan' => $bulan, 'tahun' => $tahun]);


    }
    public function filterByMonthDiterima(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Misalnya, jika Anda menggunakan model Pemesanan, Anda dapat mengambil data berdasarkan bulan dan tahun seperti ini:
        $diterima = Pemesanan::whereYear('jadwal', $tahun)
            ->whereMonth('jadwal', $bulan)
            ->whereIn('status', [1, 3]) // Menggunakan whereIn untuk memfilter status 1 dan 3
            ->get();

        return view('laporan.diterima.index', ['diterima' => $diterima, 'bulan' => $bulan, 'tahun' => $tahun]);
    }

    public function filterByMonthDitolak(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Misalnya, jika Anda menggunakan model Pemesanan, Anda dapat mengambil data berdasarkan bulan dan tahun seperti ini:
        $ditolak = Pemesanan::whereYear('jadwal', $tahun)
            ->whereMonth('jadwal', $bulan)
            ->whereIn('status', 2) // Menggunakan whereIn untuk memfilter status 1 dan 3
            ->get();

        return view('laporan.ditolak.index', ['ditolak' => $ditolak]);
    }
}
