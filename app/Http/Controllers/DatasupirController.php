<?php

namespace App\Http\Controllers;

use App\Models\Supir;
use Illuminate\Http\Request;
use App\Http\Controllers\CloudinaryStorage;

class DatasupirController extends Controller
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
        return view('admin.supir', compact('supir'));
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
        $image  = $request->file('foto');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        Supir::create([
            'nama'    => $request->nama,
            'umur' => $request->umur,
            'foto' => $result
        ]);
        return redirect('supir')->with('success', 'Data berhasil ditambahkan');
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
        $image  = $request->file('foto');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        $update = Supir::findorfail($id);
        $data_supir = [
            'nama'    => $request->nama,
            'umur' => $request->umur,
            'foto' => $result
        ];
        $update->update($data_supir);
        return redirect('supir')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supir = Supir::findorfail($id);
        $supir->delete();
        return back()->with('info', 'Data berhasil dihapus');
    }
}
