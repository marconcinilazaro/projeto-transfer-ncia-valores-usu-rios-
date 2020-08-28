<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SaldoController extends Controller
{
    public function index()
    {
        //pega dados do usuario logado
       $saldo = auth()->user()->saldo;
       $saldoFinal = $saldo ? $saldo->saldo : 0; 

       return view('admin.saldo.index', compact('saldoFinal'));
    }
}
