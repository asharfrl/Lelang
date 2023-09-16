<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('dashboard.barang.index', compact('barang'));
    }

    public function create()
    {
        return view('dashboard.barang.create');
    }

    public function store(Request $request)
    {
        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->tgl = $request->tgl;
        $barang->harga_awal = $request->harga_awal;
        $barang->deskripsi_barang = $request->deskripsi_barang;
        $barang->foto = $request->foto;
        if($request->hasFile('foto')){
            $request->file('foto')->move('img/', $request->file('foto')->getClientOriginalName());
            $barang->foto = $request->file('foto')->getClientOriginalName();
        }
        $barang->save();

        return redirect()->route('dataBarang.index')->with('message', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('dashboard.barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->tgl = $request->tgl;
        $barang->harga_awal = $request->harga_awal;
        $barang->deskripsi_barang = $request->deskripsi_barang;
        $barang->foto = $request->foto;
        if($request->hasFile('foto')){
            $request->file('foto')->move('img/', $request->file('foto')->getClientOriginalName());
            $barang->foto = $request->file('foto')->getClientOriginalName();
        }
        $barang->save();

        return redirect()->route('dataBarang.index')->with('message', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('dataBarang.index')->with('delete', 'Barang berhasil dihapus.');
    }
}
