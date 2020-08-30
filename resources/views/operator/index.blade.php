@extends('welcome')

@section('content')
    <a href="{{ route('operator.create')}}" class="btn btn-success"> Nuevo Operador</a>
    <table class="table mt-3">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID OPERADOR</th>
            <th scope="col">NOMBRE</th>
            <th></th>
        </tr>
        </thead>
        @foreach ($operators as $operator)
        <tbody>
            <tr>
                <td> {{$operator->ID_OPERADOR}} </td>
                <td> {{$operator->NOMBRE}} </td>
                <td class="table-buttons">
                <a href="{{ route('operator.show' , $operator->ID_OPERADOR)}}" class="btn btn-success">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('operator.edit' , $operator->ID_OPERADOR)}}" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form method="POST" action="{{ route('operator.destroy', $operator->ID_OPERADOR)}}">
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
