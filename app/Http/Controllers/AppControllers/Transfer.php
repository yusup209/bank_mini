<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Nasabah;
use App\Transaksi;
use App\Tabungan;

class Transfer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekening = Nasabah::where('id', '!=', auth()->user()->id_nasabah)->select('id', 'no_rek', 'nama_lengkap')->get();
        return view('pages.transfer.index', compact('rekening'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rekening = Nasabah::where('id', '!=', auth()->user()->id_nasabah)->select('id', 'no_rek', 'nama_lengkap')->get();
        $id_pengirim = Nasabah::where('id', auth()->user()->id_nasabah)->get()[0]->id;
        return view('pages.transfer.index2', compact('id_pengirim', 'rekening'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('id_pengirim') == $request->input('id_penerima')) {
            if (auth()->user()->status == "teller") {
                return redirect()->route('transfer.index')->with('failed', 'Maaf, tidak bisa transfer ke rekening yang sama');
            } else if (auth()->user()->status == "user") {
                return redirect()->route('transfer.create')->with('failed', 'Maaf, tidak bisa transfer ke rekening yang sama');
            }
        } else {
            $currentBalance = Tabungan::where('id_nasabah', $request->input('id_pengirim'))->get()[0]->saldo;

            if ($currentBalance < $request->input('jumlah')) {
                if (auth()->user()->status == "teller") {
                    return redirect()->route('transfer.index')->with('failed', 'Gagal transfer karena saldo tidak mencukupi');
                } else if (auth()->user()->status == "user") {
                    return redirect()->route('transfer.create')->with('failed', 'Maaf, tidak bisa transfer ke rekening yang sama');
                }
            } else {
                $trx = new Transaksi;
                $trx->trx_type = "Transfer";
                $trx->id_pengirim = $request->input('id_pengirim');
                $trx->id_penerima = $request->input('id_penerima');
                $trx->jumlah = $request->input('jumlah');
                $trx->save();

                $tab = Tabungan::where('id_nasabah', $request->input('id_penerima'))->firstOrFail();
                $tab->saldo = (Tabungan::where('id_nasabah', $request->input('id_penerima'))->get()[0]->saldo) + $request->input('jumlah');
                $tab->save();

                $tab = Tabungan::where('id_nasabah', $request->input('id_pengirim'))->firstOrFail();
                $tab->saldo = (Tabungan::where('id_nasabah', $request->input('id_pengirim'))->get()[0]->saldo) - $request->input('jumlah');
                $tab->save();

                if (auth()->user()->status == "teller") {
                    return redirect()->route('transfer.index')->with('success', 'Sukses transfer');
                } else if (auth()->user()->status == "user") {
                    return redirect()->route('transfer.create')->with('success', 'Sukses transfer');
                }
            }
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
