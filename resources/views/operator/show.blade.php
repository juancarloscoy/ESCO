@extends('welcome')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">OPERADOR</h2>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0 text-center">
                <p>{{ $operator->NOMBRE}}</p>
            </blockquote>
        </div>
    </div>
@endsection