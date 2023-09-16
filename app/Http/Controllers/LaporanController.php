<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil data lelang, nama_barang, harga_tertinggi, created_at, dan foto per barang
        $laporan = DB::table('tb_lelang')
                ->select('tb_lelang.barang_id', 'tb_barang.nama_barang', 'tb_barang.foto', 'tb_lelang.harga_akhir', 'tb_lelang.created_at', 'users.nama_petugas')
                ->join('tb_barang', 'tb_lelang.barang_id', '=', 'tb_barang.id')
                ->join('users', 'tb_lelang.user_id', '=', 'users.id')
                ->whereRaw('tb_lelang.harga_akhir = (SELECT MAX(harga_akhir) FROM tb_lelang AS subquery WHERE subquery.barang_id = tb_lelang.barang_id)')
                ->get();

                // dd($laporan);

        return view('dashboard.laporan.index', compact('laporan'));
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
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
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
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
