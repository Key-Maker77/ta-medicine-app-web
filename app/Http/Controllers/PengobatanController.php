<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengobatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PengobatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pengobatan()
    {
        $data = Pengobatan::all();
        return view(
            'user.pengobatan',
            [
                'data' => $data
            ]
        );
    }
}
