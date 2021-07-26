<?php

namespace App\Http\Controllers;

use App\Models\Derma;
use Illuminate\Http\Request;

class DermaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dermas = Derma::all();
        return view('derma.index',[
            'dermas'=> $dermas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('derma.create');
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
           
            'id'  => 'required',
            'tarikh'=> 'required',
            'isipadu'=> 'required', 
            'jenis'=> 'required',
        ]);
 
        $derma= new Derma;
        $derma->id= $request->id;
        $derma->tarikh= $request->tarikh;
        $derma->isipadu= $request->isipadu;
        $derma->jenis= $request->jenis;
        $derma->save(); 
        return redirect('/dermas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Derma  $derma
     * @return \Illuminate\Http\Response
     */
    public function show(Derma $derma)
    {
        return view('derma.show', [
            'derma'=>$derma
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Derma  $derma
     * @return \Illuminate\Http\Response
     */
    public function edit(Derma $derma)
    {
        return view('derma.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Derma  $derma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Derma $derma)
    {
        $derma->id= $request->id;
        $derma->tarikh= $request->tarikh;
        $derma->isipadu= $request->isipadu;
        $derma->jenis= $request->jenis;
        $derma->save(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Derma  $derma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Derma $derma)
    {
        //
    }
}
