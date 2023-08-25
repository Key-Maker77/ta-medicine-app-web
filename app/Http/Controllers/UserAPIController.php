<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAPIController extends Controller
{
    public function register(Request $request)
    {
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->role = $request->role;

        if ($data->save()) {
            return response()->json(['message' => 'Data berhasil ditambahkan', 'data' => $data], 200);
        } else {
            return response()->json(['message' => 'Data gagal ditambahkan'], 500);
        }
    }
}
