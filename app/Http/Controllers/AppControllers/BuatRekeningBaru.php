<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kelas;
use App\Nasabah;
use App\Tabungan;

class BuatRekeningBaru extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('pages.buatRekening.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $nasabah = new Nasabah;
        $nasabah->no_rek = $r->input('no_rek');
        $nasabah->nama_lengkap = $r->input('nama_lengkap');
        $nasabah->nis = $r->input('nis');
        $nasabah->id_kelas = $r->input('id_kelas');
        $nasabah->umur = $r->input('umur');
        $nasabah->jenis_kelamin = $r->input('jenis_kelamin');
        $nasabah->no_telp = $r->input('no_telp');
        $nasabah->alamat = $r->input('alamat');
        $nasabah->save();

        $getLastID = Nasabah::orderBy('id','DESC')->get()[0]->id;
        $tabungan = new Tabungan;
        $tabungan->id_nasabah = $getLastID;
        $tabungan->save();

        return redirect()->route('buatRekening.create')->with('success', 'Sukses membuat rekening untuk nasabah');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
