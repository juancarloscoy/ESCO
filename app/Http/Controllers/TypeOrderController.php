<?php

namespace App\Http\Controllers;

use App\Models\TypeOrder;
use Illuminate\Http\Request;

class TypeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeOrders = TypeOrder::all();
        return view('typeOrden.index', compact('typeOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeOrden.create');
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
                'NOMBRE' => 'required'
            ]
        );

        $typeOrder = new TypeOrder([
            'NOMBRE' => $request->get('NOMBRE'),
        ]);

        $typeOrder->save();

        return redirect('/typeOrden')->with('Registro guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeOrder  $typeOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeOrder = TypeOrder::find($id);
        return view('typeOrden.show', compact('typeOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeOrder  $typeOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeOrder = TypeOrder::find($id);
        return view('typeOrden.edit', compact('typeOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeOrder  $typeOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate(
            [
                'NOMBRE' => 'required'
            ]
        );

        $typeOrder = TypeOrder::find($id);
        $typeOrder->NOMBRE = $request->get('NOMBRE');
        $typeOrder->save();

        return redirect('/typeOrden')->with('Registro editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeOrder  $typeOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeOrder = TypeOrder::find($id);
        $typeOrder->delete();

        return redirect('/typeOrden')->with('Tipo de orden eliminada exitosamente');
    }
}
