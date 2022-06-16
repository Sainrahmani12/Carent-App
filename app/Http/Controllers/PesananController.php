<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Supir;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function pemesanan()
    {
        $mobil = Mobil::all();
        $supir = Supir::all();
        return view('pemesanan', compact('mobil', 'supir'));
    }
}
