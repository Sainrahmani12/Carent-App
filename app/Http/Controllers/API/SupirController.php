<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Supir;
use Illuminate\Http\Request;

class SupirController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $supir = Supir::with('pesanan')->get();

            if ($supir)
                return ResponseFormater::success($supir, 'Data supir berhasil ditemukan');

            else
                return ResponseFormater::error(null, 'Data supir tidak ditemukan', 404);
        }
    }
}
