<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Operator;
use App\Models\TypeOrder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OrdersImport;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orden.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operators = Operator::all();
        $typeOrders = TypeOrder::all();
        return view('orden.create', compact('operators', 'typeOrders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'ID_TIPO' => 'required',
                'ID_OPERADOR' => 'required',
                'RESULTADO' => 'required',
                'VALOR' => 'required',
                'FECHA_ASIGNACION' => 'required|date',
                'FECHA_EJECUCION' => 'required|date|after_or_equal:FECHA_ASIGNACION'
            ]
        );

        $order = new Order([
            'FECHA_CREACION' => date('Y-m-d'),
            'FECHA_ASIGNACION' => $request->get('FECHA_ASIGNACION'),
            'FECHA_EJECUCION' => $request->get('FECHA_EJECUCION'),
            'ID_TIPO' => $request->get('ID_TIPO'),
            'ID_OPERADOR' => $request->get('ID_OPERADOR'),
            'RESULTADO' => $request->get('RESULTADO'),
            'VALOR' => $request->get('VALOR')
        ]);

        $order->save();

        return redirect('/orden')->with('Registro guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('ordeN.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $operators = Operator::all();
        $typeOrders = TypeOrder::all();
        return view('orden.edit', compact('order', 'operators', 'typeOrders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'ID_TIPO' => 'required',
                'ID_OPERADOR' => 'required',
                'RESULTADO' => 'required',
                'VALOR' => 'required',
                'FECHA_ASIGNACION' => 'required|date',
                'FECHA_EJECUCION' => 'required|date|after_or_equal:FECHA_ASIGNACION'
            ]
        );

        $order = Order::find($id);

        $order->FECHA_ASIGNACION = $request->get('FECHA_ASIGNACION');
        $order->FECHA_EJECUCION = $request->get('FECHA_EJECUCION');
        $order->ID_TIPO = $request->get('ID_TIPO');
        $order->ID_OPERADOR = $request->get('ID_OPERADOR');
        $order->RESULTADO = $request->get('RESULTADO');
        $order->VALOR = $request->get('VALOR');
        $order->save();

        return redirect('/orden')->with('Registro editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('/orden')->with('Operador eliminado exitosamente');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new OrdersImport, $file);

        return back()->with('success', 'Buen trabajo');
    }
}
