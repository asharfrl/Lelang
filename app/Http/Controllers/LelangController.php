<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lelang;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $title = "LELANG | ONLINE"; // Ganti dengan judul yang sesuai

        return view('masyarakat.index', compact('barang', 'title'));
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
    public function store(Request $request, Barang $barang)
    {
        if (Carbon::now() > $request->tgl) {
            return redirect()->back()->withErrors(['error' => 'Tawaran Sudah Ditutup']);
        }

        $request->validate([
            'harga_akhir' => 'required', // Ensure a positive amount
            'barang_id' => 'required',
        ]);

        // Get the current highest bid for the product
        $terLelang = DB::table('tb_lelang')
                ->where('barang_id', $request->barang_id)
                ->orderByDesc('harga_akhir')
                ->first();

        // Check if this bid is higher than the current highest bid
        if ($terLelang && $terLelang->harga_akhir >= $request->harga_akhir) {
            return redirect()->back()->withErrors(['error' => 'Tawaran Anda Harus Lebih Besar Dari Tawaran Tertinggi Sekarang.']);
        } elseif ($request->harga_akhir <= $request->harga_awal) {
            return redirect()->back()->withErrors(['error' => 'Tawaran Anda Harus Lebih Besar Dari Harga Awal']);
        }


        // Store the new bid
        $lelang = new Lelang;
        $lelang->user_id = auth()->id(); // Assign the currently logged-in user
        $lelang->barang_id = $request->barang_id;
        $lelang->harga_akhir = $request->harga_akhir;
        $lelang->save();

        return redirect()->back()->with('success', 'Tawaran Anda Telah Masuk!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "TAWAR BARANG"; // Ganti dengan judul yang sesuai
        $barang = Barang::findOrFail($id);
        $terLelang = Lelang::select('tb_lelang.*', 'users.nama_petugas')
                    ->join('users', 'tb_lelang.user_id', '=', 'users.id')
                    ->where('tb_lelang.barang_id', $barang->id)
                    ->orderByDesc('tb_lelang.harga_akhir')
                    ->first();
        $berLelang = Lelang::select('tb_lelang.*', 'users.nama_petugas')
                    ->join('users', 'tb_lelang.user_id', '=', 'users.id')
                    ->where('tb_lelang.barang_id', $barang->id)
                    ->orderByDesc('tb_lelang.harga_akhir')
                    ->get();
        return view('masyarakat.detail.barang', compact('barang', 'terLelang', 'berLelang', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
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
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
