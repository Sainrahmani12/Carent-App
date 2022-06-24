<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all (Request $request)
    {
        $user = User::all();
        return ResponseFormater::success(
            $user->all(),
            'Data User ditemukan'
        );
    }
}
