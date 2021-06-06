<?php

namespace App\Http\Controllers;

use App\Models\Len;
use Illuminate\Http\Request;

class LenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lens =  Len::all();
        return view('lens.index',compact('lens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $len = new Len();
        return view('lens.create', compact('len'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Len::create($request->all());
        
        return redirect()->route("lens.index")->with('message','Lene salvo com sucesso!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Len $len)
    {
        return view('lens.edit', compact('len'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Len $len )
    {
        $len->update($request->all());
        
        return redirect()->route("lens.index")->with('message','Lene atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Len $len)
    {
        $len->delete();
        return redirect()->route("lens.index")->with('message','Cliente excluido com sucesso!');
    }
}
