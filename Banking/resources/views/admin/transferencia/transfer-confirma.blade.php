@extends('adminlte::page')

@section('title', 'Transferencia de Valores')

@section('content_header')



@section('content')
    <div class="box">
        <div class="box-header">
        
        </div>
        <div class="box-body">

        <p><strong> Recebedor : </strong>{{ $sender->name }}</p>
        <p><strong> Saldo Atual: </strong>{{ $saldo->saldo}}
           <form method="POST" action="{{route('transfer.confirm')}}">
                {!! csrf_field() !!}

                <input type="hidden" name="sender_id" value="{{ $sender->id }}" />
                <div class="form-group">Transferencia de Valores:
                    <input type="text" name="value" placeholder="Informe o valor" class="form-control" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"> Transferir </button>
                </div>

        </div>
    </div>
@stop