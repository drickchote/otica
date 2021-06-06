<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Money;
use App\Models\Frame;
use Illuminate\Http\Request;

class FrameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frames =  Frame::all();
        return view('frames.index',compact('frames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $frame = new Frame();
        return view('frames.create', compact('frame'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Frame::create($request->all());
        
        return redirect()->route("frames.index")->with('message','Framee salvo com sucesso!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Frame $frame)
    {
        return view('frames.edit', compact('frame'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frame $frame )
    {
        $request->offsetSet('price', Money::moneyToFloat($request->price));
        $request->offsetSet('cost', Money::moneyToFloat($request->cost));
        $frame->update($request->all());
        
        return redirect()->route("frames.index")->with('message','Framee atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frame $frame)
    {
        $frame->delete();
        return redirect()->route("frames.index")->with('message','Cliente excluido com sucesso!');
    }
}
