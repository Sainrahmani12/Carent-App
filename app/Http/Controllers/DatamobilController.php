<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use App\Http\Controllers\CloudinaryStorage;

class DatamobilController extends Controller
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
        $mobil = Mobil::all();
        return view('admin.mobil', compact('mobil'));
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
        $image  = $request->file('gambar_mobil');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        Mobil::create([
            'nama_mobil'    => $request->nama_mobil,
            'harga_sewa_mobil' => $request->harga_sewa_mobil,
            'gambar_mobil' => $result
        ]);
        return redirect('datamobil')->with('success', 'Data berhasil ditambahkan');
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
        $image  = $request->file('gambar_mobil');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        $update = Mobil::findorfail($id);
        $data_mobil = [
            'nama_mobil'    => $request->nama_mobil,
            'harga_sewa_mobil' => $request->harga_sewa_mobil,
            'gambar_mobil' => $result
        ];
        $update->update($data_mobil);
        return redirect('datamobil')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Mobil::findorfail($id);
        $mobil->delete();
        return back()->with('info', 'Data berhasil dihapus');
    }
}
