<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DataAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = User::all();
        return view('pages.dataAkun.index', compact('akun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dataAkun.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $akun = new User;
        $akun->nama = $r->input('nama');
        $akun->email = $r->input('email');
        $akun->password = bcrypt($r->input('password'));
        $akun->status = $r->input('status');
        $akun->save();

        return redirect()->route('dataAkun.index')->with('success', 'Sukses menambahkan akun');
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
        $akun = User::where('id', $id)->get()[0];
        return view('pages.dataAkun.edit', compact('akun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $akun = User::find($id);
        $akun->nama = $r->input('nama');
        $akun->email = $r->input('email');
        $akun->password = bcrypt($r->input('password'));
        $akun->status = $r->input('status');
        $akun->save();

        return redirect()->route('dataAkun.index')->with('success', 'Sukses mengupdate akun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('dataAkun.index')->with('success', 'Sukses menghapus akun');
    }
}
