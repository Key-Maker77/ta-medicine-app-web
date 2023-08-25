<?php

namespace App\Http\Controllers;

use App\Models\Pengobatan;
use Illuminate\Http\Request;

class PengobatanAPIController extends Controller
{
    public function index()
    {
        $pengobatans = Pengobatan::all();
        return response()->json(['message'=>'success', 'data'=>$pengobatans]);
    }
    
    public function show($id)
    {
        $pengobatans = Pengobatan::find($id);
        return response()->json(['message'=>'success', 'data'=>$pengobatans]);
    }
}
