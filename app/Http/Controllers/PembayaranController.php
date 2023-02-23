<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('dashboard.pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nisn   = Siswa::all();
        $id_petugas = User::all();
        $id_spp = Spp::all();
        return view('dashboard.pembayaran.create')->with('nisn', $nisn)->with('id_petugas', $id_petugas)->with('id_spp', $id_spp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pembayaran = new Pembayaran;
        $pembayaran->nama_petugas = $request->nama_petugas;
        $pembayaran->nisn = $request->nisn;
        $pembayaran->tgl_bayar = $request->tgl_bayar;
        $pembayaran->bulan_dibayar = $request->bulan_dibayar;
        $pembayaran->tahun_dibayar = $request->tahun_dibayar;
        $pembayaran->nominal = $request->nominal;
        $pembayaran->jumlah_bayar = $request->jumlah_bayar;
        $pembayaran->save();
        return redirect()->route('dataPembayaran.index')->with('message', 'Data berhasil ditambahkan!');
    }

    public function history()
    {
        $history = Pembayaran::all();
        return view('dashboard.pembayaran.history', compact('history'));
    }

    public function generatePDF()
    {
        $history = Pembayaran::all();
        return view('dashboard.pembayaran.pdf', compact('history'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
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
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}