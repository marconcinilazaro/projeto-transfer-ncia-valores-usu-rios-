@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')


@strpos
@section('content')
    <div class="box">
        <div class="box-header">
        
        </div>
        <div class="box-body">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>R$ {{ number_format($saldoFinal, 2, ',', '') }} </sup></h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-cash"></i>
                    </div>
                    <a href="#" class="small-box-footer"> Historico</a>
                </div>

        </div>
    </div>
@stop