<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = User::all();
        // $petugas = Petugas::all();
        return view('dashboard.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $petugas = new User;
        $petugas->username = $request->username;
        $petugas->password = Hash::make($request->password);
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->level = $request->level;
        $petugas->save();
        return redirect()->route('dataPetugas.index')->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = User::find($id);
        return view('dashboard.petugas.edit', ['petugas' => $petugas]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $petugas = User::find($id);
        $petugas->username = $request->username;
        $petugas->password = $request->password;
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->level = $request->level;
        $petugas->save();

        return redirect('/dataPetugas')->with('message', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = User::find($id);
        $petugas->delete();

        return redirect('/dataPetugas')->with('message', 'Data berhasil dihapus!');
    }
}
