@extends('welcome')

@section('content')
    <a href="{{ route('typeOrden.create')}}" class="btn btn-success"> Nuevo Tipo Orden</a>
    <table class="table mt-3">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID TIPO ORDEN</th>
            <th scope="col">NOMBRE</th>
            <th></th>
        </tr>
        </thead>
        @foreach ($typeOrders as $typeOrder)
        <tbody>
            <tr>
                <td> {{$typeOrder->ID_TIPO}} </td>
                <td> {{$typeOrder->NOMBRE}} </td>
                <td class="table-buttons">
                <a href="{{ route('typeOrden.show' , $typeOrder->ID_TIPO)}}" class="btn btn-success">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('typeOrden.edit' , $typeOrder->ID_TIPO)}}" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form method="POST" action="{{ route('typeOrden.destroy', $typeOrder->ID_TIPO)}}">
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
@endsection
