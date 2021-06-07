<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Frame;
use App\Models\LabLen;
use App\Models\Order;
use App\Models\Sunglass;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders =  Order::all();
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::pluck('full_name', 'id');
        $frames = Frame::pluck('brand', 'id');
        $sunglasses = Sunglass::pluck('brand', 'id');
        $lens = LabLen::all();
        $order = new Order();
        return view('orders.create', compact('order', 'clients', 'frames', 'sunglasses', 'lens'));
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
        
        Order::create($request->all());
        
        return redirect()->route("orders.index")->with('message','Venda salva com sucesso!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order )
    {
        $request->offsetSet('price', Money::moneyToFloat($request->price));
        $request->offsetSet('cost', Money::moneyToFloat($request->cost));
        $order->update($request->all());
        
        return redirect()->route("orders.index")->with('message','Venda atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route("orders.index")->with('message','Venda excluida com sucesso!');
    }
}