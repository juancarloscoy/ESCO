@extends('welcome')

@section('content')
    <a href="{{ route('orden.create')}}" class="btn btn-success"> Nueva Orden</a>
    <div class="mt-3">
        <form action="{{route('orders.excel')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="bg-success" type="file" name="file" id="file">
            <button class="btn btn-outline-success">Importar Ordenes</button>
        </form>
    </div>
    <div class="table-responsive-xl">
        <table class="table mt-3">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No Orden</th>
                <th scope="col">Fecha Creacion</th>
                <th scope="col">Tipo</th>
                <th scope="col">Fecha Asignacion</th>
                <th scope="col">Fecha Ejecucion</th>
                <th scope="col">Operador</th>
                <th scope="col">Resultado</th>
                <th scope="col">Valor</th>
                <th></th>
            </tr>
            </thead>
            @foreach ($orders as $order)
            <tbody>
                <tr>
                    <td> {{$order->ID_ORDEN}} </td>
                    <td> {{$order->FECHA_CREACION}} </td>
                    <td> {{$order->TypeOrder->NOMBRE}} </td>
                    <td> {{$order->FECHA_ASIGNACION}} </td>
                    <td> {{$order->FECHA_EJECUCION}} </td>
                    <td> {{$order->Operator->NOMBRE}} </td>
                    <td> {{$order->RESULTADO}} </td>
                    <td> {{$order->VALOR}} </td>
    
                    <td class="table-buttons">
                    <a href="{{ route('orden.show' , $order->ID_ORDEN)}}" class="btn btn-success">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('orden.edit' , $order->ID_ORDEN)}}" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('orden.destroy', $order->ID_ORDEN)}}">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    
@endsection
