@extends('adminlte::page')

@section('title', 'Transferencia de Valores')

@section('content_header')



@section('content')
    <div class="box">
        <div class="box-header">
        
        </div>
        <div class="box-body">
            @if($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }} </p>
                    @endforeach
                </div>
            @endif

           <form method="POST" action="{{route('transfer.store')}}">
                {!! csrf_field() !!}

                <div class="form-group">Transferencia de Valores:
                    <input type="text" name="sender" placeholder="Digite Cpf/Cnpj ou Email de Destino" class="form-control" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"> Continuar </button>
                </div>

        </div>
    </div>
@stop