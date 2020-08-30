@extends('welcome')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">ORDEN</h2>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0 text-center">
                <p>Fecha Creacion {{ $order->FECHA_CREACION}}</p>
                <p>Fecha Asignacion {{ $order->FECHA_ASIGNACION}}</p>
                <p>Fecha Ejecucion {{ $order->FECHA_EJECUCION}}</p>
                <p>Tipo {{ $order->ID_TIPO }}</p>
                <p>Operador {{ $order->ID_OPERADOR }}</p>
                <p>Resultado {{ $order->RESULTADO}}</p>
                <p>Valor {{ $order->VALOR}}</p>
            </blockquote>
        </div>
    </div>
@endsection