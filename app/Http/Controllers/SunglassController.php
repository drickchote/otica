<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Money;
use App\Models\Sunglass;
use Illuminate\Http\Request;

class SunglassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sunglasses =  Sunglass::all();
        return view('sunglasses.index',compact('sunglasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sunglass = new Sunglass();
        return view('sunglasses.create', compact('sunglass'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->offsetSet('price', Money::moneyToFloat($request->price));
        $request->offsetSet('cost', Money::moneyToFloat($request->cost));
        Sunglass::create($request->all());
        return redirect()->route("sunglasses.index")->with('message','Óculos salvo com sucesso!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sunglass $sunglass)
    {
        return view('sunglasses.edit', compact('sunglass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sunglass $sunglass )
    {
        $request->offsetSet('price', Money::moneyToFloat($request->price));
        $request->offsetSet('cost', Money::moneyToFloat($request->cost));
        $sunglass->update($request->all());
        
        return redirect()->route("sunglasses.index")->with('message','Óculos atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sunglass $sunglass)
    {
        $sunglass->delete();
        return redirect()->route("sunglasses.index")->with('message','Óculos excluido com sucesso!');
    }
}
