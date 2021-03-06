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
            <form method="POST" action="{{ route('typeOrden.update', $typeOrder ) }}">
                @csrf
                @method('PATCH')
                    <div class="form-group text-center">
                        <label>Nombre</label>
                        <input type="text" name="NOMBRE" value="{{$typeOrder->NOMBRE}}" class="form-control" id="name" placeholder="Nombre tipo orden">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>  
            </form>
        </div>
    </div>
@endsection