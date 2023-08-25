<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Tabib;

class TabibController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function tabib()
    {
        $data = Tabib::where('status', 0)->get();;
        return view(
            'user.tabib',
            [
                'data' => $data
            ]
        );
    }
}
