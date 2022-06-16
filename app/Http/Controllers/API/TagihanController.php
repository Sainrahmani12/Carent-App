<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id'); {
            if ($id) {
                $tagihan = Peminjaman::with('mobil', 'user')->find($id);

                if ($tagihan)
                    return ResponseFormater::success($tagihan, 'Data tagihan berhasil ditemukan');

                else
                    return ResponseFormater::error(null, 'Data tagihan tidak ditemukan', 404);
            }
        }

        $peminjaman = Peminjaman::with('mobil', 'user');

        return ResponseFormater::success(
            $peminjaman->get(),
            'Data list peminjaman berhasil ditemukan'
        );
    }
}
