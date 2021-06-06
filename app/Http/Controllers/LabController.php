<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Money;
use App\Models\Lab;
use App\Models\Treatment;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs =  Lab::all();
        return view('labs.index',compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lab = new Lab();
        return view('labs.create', compact('lab'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lab::create($request->all());
        
        return redirect()->route("labs.index")->with('message','Labe salvo com sucesso!');
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lab $lab)
    {
        return view('labs.show', compact(['lab']));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lab $lab)
    {
        return view('labs.edit', compact('lab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lab $lab )
    {
        $lab->update($request->all());
        
        return redirect()->route("labs.index")->with('message','Labe atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lab $lab)
    {
        $lab->delete();
        return redirect()->route("labs.index")->with('message','Cliente excluido com sucesso!');
    }

    public function attachTreatment(Request $request, Lab $lab, Treatment $treatment){
        $request->offsetSet('price', Money::moneyToFloat($request->price));
        $lab->treatments()->attach($treatment,['price'=>$request->price]);
        $treatmentsComponent = view('labs._treatments',['lab'=>$lab])->render();
        return response()->json(['success'=>true, '_treatments'=>$treatmentsComponent]);
    }

    public function detachTreatment(Lab $lab, Treatment $treatment){
        $lab->treatments()->detach($treatment);
        $treatmentsComponent = view('labs._treatments',['lab'=>$lab])->render();
        return response()->json(['success'=>true, '_treatments'=>$treatmentsComponent]);
    }

}