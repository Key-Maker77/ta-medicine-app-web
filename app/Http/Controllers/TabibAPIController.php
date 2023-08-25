<?php

namespace App\Http\Controllers;

use App\Models\Tabib;
use Illuminate\Http\Request;

class TabibAPIController extends Controller
{
    public function index()
    {
        $tabibs = Tabib::all();
        return response()->json(['message'=>'success', 'data'=>$tabibs]);
    }
    
    public function show($id)
    {
        $tabibs = Tabib::find($id);
        return response()->json(['message'=>'success', 'data'=>$tabibs]);
    }
}
