<?php

namespace App\Http\Controllers;

use App\Models\Klinik;
use Illuminate\Http\Request;

class KlinikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kliniks = Klinik::all();
        return view('klinik.index',[
            'kliniks'=> $kliniks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klinik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           
            'nama'  => 'required',
            'user_kakitangan'=> 'required',
            'user_penerima'=> 'required', 
            'derma_maklumat'=> 'required',
        ]);
 
        $klinik= new Klinik;
        $klinik->nama= $request->nama;
        $klinik->user_kakitangan= $request->user_kakitangan;
        $klinik->user_penerima= $request->user_penerima;
        $klinik->derma_maklumat= $request->derma_maklumat;
        $klinik->save(); 
        return redirect('/kliniks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klinik  $klinik
     * @return \Illuminate\Http\Response
     */
    public function show(Klinik $klinik)
    {
        return view('klinik.show', [
            'klinik'=>$klinik
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klinik  $klinik
     * @return \Illuminate\Http\Response
     */
    public function edit(Klinik $klinik)
    {
        return view('klinik.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Klinik  $klinik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Klinik $klinik)
    {
        $klinik->nama= $request->nama;
        $klinik->user_kakitangan= $request->user_kakitangan;
        $klinik->user_penerima= $request->user_penerima;
        $klinik->derma_maklumat= $request->derma_maklumat;
        $klinik->save(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klinik  $klinik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klinik $klinik)
    {
        //
    }
}
