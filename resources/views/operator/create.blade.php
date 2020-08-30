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
            <form method="POST" action="{{ route('operator.store') }}">
                @csrf
                    <div class="form-group text-center">
                        <label>Nombre</label>
                        <input type="text" name="NOMBRE" class="form-control" id="name" placeholder="Nombre operador">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>  
            </form>
        </div>
    </div>
@endsection