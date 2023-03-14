<?php

namespace App\Http\Controllers;

use App\Models\Tunggakan;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;

class TunggakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunggakan = Tunggakan::all();
        return view('dashboard.tunggakan.index', compact('tunggakan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_petugas = Petugas::all();
        $nisn = Siswa::all();
        $id_spp = Spp::all();
        return view('dashboard.tunggakan.create', compact('id_petugas', 'nisn', 'id_spp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tunggakan = new Tunggakan;
        $tunggakan->id_petugas = $request->id_petugas;
        $tunggakan->nisn = $request->nisn;
        $tunggakan->nama = $request->nama;
        $tunggakan->id_spp = $request->id_spp;
        $tunggakan->bulan_tunggakan = $request->bulan_tunggakan;
        $tunggakan->total_tunggakan = $request->total_tunggakan;

        $tunggakan->sisa_bulan = $request->bulan_tunggakan;
        $tunggakan->sisa_tunggakan = $request->total_tunggakan;

        $tunggakan->save();

        return redirect()->route('dataTunggakan.index')->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tunggakan  $tunggakan
     * @return \Illuminate\Http\Response
     */
    public function show(Tunggakan $tunggakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tunggakan  $tunggakan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tunggakan $tunggakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tunggakan  $tunggakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tunggakan $tunggakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tunggakan  $tunggakan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tunggakan = Tunggakan::find($id);
        $tunggakan->delete();
        return redirect()->route('dataTunggakan.index')->with('message', 'Data berhasil dihapus!');
    }
}
