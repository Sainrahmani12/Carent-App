<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Supir;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mobil = Mobil::all();
        $supir = Supir::all();
        $peminjaman = Peminjaman::with('mobil')->get();
        return view('user.isi', compact('mobil', 'supir', 'peminjaman'));
    }

    public function pemesanan()
    {
        $mobil = Mobil::all();
        $supir = Supir::all();
        return view('pemesanan', compact('mobil', 'supir'));
    }

    public function store(Request $request)
    {
        $peminjaman = Peminjaman::with('mobil')->get();
        $image = $request->file('image');
        Peminjaman::create([
            'datamobil_id' => $request->datamobil_id,
            'supir_id' => $request->supir_id,
            'user_id' => Auth::user()->id,
            'jaminan' => $request->jaminan,
            'peminjaman' => $request->peminjaman,
            'pengembalian' => $request->pengembalian,
            'jumlah_hari' => $request->jumlah_hari,
            'foto_peminjam' => $request->file('foto_peminjam')->store('peminjaman')
        ]);
        return redirect(compact('mobil'))->back();
    }
}