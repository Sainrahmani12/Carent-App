<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Peminjaman;
use App\Models\Supir;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supir = Supir::all();
        $mobil = Mobil::all();
        $peminjaman = Peminjaman::all();
        return view('admin.identitas', compact('peminjaman', 'mobil', 'supir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Peminjaman::findorfail($id);
        $data_peminjaman = [
            'datamobil_id' => $request->datamobil_id,
            'supir_id' => $request->supir_id,
            'jaminan' => $request->jaminan,
            'peminjaman' => $request->peminjaman,
            'pengembalian' => $request->pengembalian,
            'foto_peminjam' => $request->foto_peminjam->store('fotopeminjam/', 'public')
        ];
        $update->update($data_peminjaman);
        return redirect('identitas-peminjam')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findorfail($id);
        $peminjaman->delete();
        return back()->with('info', 'Data berhasil dihapus');
    }
}
