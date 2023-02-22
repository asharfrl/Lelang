<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::all();
        return view('dashboard.spp.index', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.spp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $spp = new Spp;
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();
        return redirect()->route('dataSpp.index')->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spp = Spp::find($id);
        return view('dashboard.spp.edit', ['spp' => $spp]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $spp = Spp::find($id);
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();

        return redirect('/dataSpp')->with('message', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spp = Spp::find($id);
        $spp->delete();

        return redirect('/dataSpp')->with('message', 'Data berhasil dihapus!');
    }
}
