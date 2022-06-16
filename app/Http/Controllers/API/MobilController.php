<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $mobil = Mobil::with('tagihan')->find($id);

            if ($mobil)
                return ResponseFormater::success($mobil, 'Data mobil berhasil ditemukan');

            else
                return ResponseFormater::error(null, 'Data mobil tidak ditemukan', 404);
        }

        $mobil = Mobil::all();

        return ResponseFormater::success(
            $mobil->all(),
            'Data list mobil berhasil ditemukan'
        );
    }
}
