@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('orden.update', $order ) }}">
                @csrf
                @method('PATCH')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Operador</label>
                        <select id="ID_OPERADOR" name="ID_OPERADOR" class="form-control">
                            @foreach ($operators as $operator)
                                <option selected="{{$order->ID_OPERADOR}}" value="{{$order->ID_OPERADOR}}">{{$operator->NOMBRE}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tipo Orden</label>
                        <select id="ID_TIPO" name="ID_TIPO" class="form-control">
                            @foreach ($typeOrders as $type)
                                <option selected='{{$order->ID_TIPO}}' value="{{$type->ID_TIPO}}">{{$type->NOMBRE}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Fecha Asignacion </label>
                         <input type="date" value="{{$order->FECHA_ASIGNACION}}" name="FECHA_ASIGNACION" id="FECHA_ASIGNACION">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fecha Ejecucion </label>
                        <input type="date" value="{{$order->FECHA_EJECUCION}}" name="FECHA_EJECUCION" id="FECHA_EJECUCION">
                    </div>
                </div>
                <div class="form-group">
                    <label>Resultado</label>
                    <textarea name="RESULTADO" class="form-control" id="RESULTADO" rows="2">{{$order->RESULTADO}}</textarea>
                </div>
                <div class="form-group">
                    <label>Valor</label>
                    <input class="col-12" type="number" value="{{$order->VALOR}}" id="VALOR" name="VALOR">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
@endsection