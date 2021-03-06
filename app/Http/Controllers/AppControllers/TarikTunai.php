<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Nasabah;
use App\Transaksi;
use App\Tabungan;

class TarikTunai extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekening = Nasabah::select('id','no_rek','nama_lengkap')->get();
        return view('pages.tarikTunai.index', compact('rekening'));
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
        $currentBalance = Tabungan::where('id_nasabah', $request->input('id_nasabah'))->get()[0]->saldo;

        if ($currentBalance < $request->input('jumlah')){
            return redirect()->route('tarikTunai.index')->with('failed','Gagal tarik tunai karena saldo tidak mencukupi');
        } else {
            $trx = new Transaksi;
            $trx->trx_type = "Tarik";
            $trx->id_pengirim = 0;
            $trx->id_penerima = $request->input('id_nasabah');
            $trx->jumlah = $request->input('jumlah');
            $trx->save();

            $tab = Tabungan::where('id_nasabah',$request->input('id_nasabah'))->firstOrFail();
            $tab->saldo = (Tabungan::where('id_nasabah', $request->input('id_nasabah'))->get()[0]->saldo) - $request->input('jumlah');
            $tab->save();

            return redirect()->route('tarikTunai.index')->with('success','Sukses tarik tunai dari rekening nasabah');
        }
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
