<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasis = Lokasi::all();
        return view('lokasi.index',[
            'lokasis'=> $lokasis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lokasi.create');
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
           
            'negeri'  => 'required',
            'bandar'=> 'required',
            'daerah'=> 'required', 
            'postal_code'=> 'required',
            'alamat_penuh'=> 'required',
            
        ]);
 
        $lokasi= new Lokasi;
        $lokasi->negeri= $request->negeri;
        $lokasi->bandar= $request->bandar;
        $lokasi->daerah= $request->daerah;
        $lokasi->postal_code= $request->postal_code;
        $lokasi->alamat_penuh= $request->alamat_penuh;
        $lokasi->save(); 
        return redirect('/lokasis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $lokasi)
    {
        return view('lokasi.show', [
            'lokasi'=>$lokasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $lokasi)
    {
        return view('lokasi.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $lokasi->negeri= $request->negeri;
        $lokasi->bandar= $request->bandar;
        $lokasi->daerah= $request->daerah;
        $lokasi->postal_code= $request->postal_code;
        $lokasi->alamat_penuh= $request->alamat_penuh;
        $lokasi->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        //
    }
}
