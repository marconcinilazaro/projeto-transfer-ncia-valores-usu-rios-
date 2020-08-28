<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class TransferenciaController extends Controller
{
    public function index()
    {
        return view('admin.transferencia.index');
    }

    public function transferStore(Request $request, USer $user)
    {

        if((strlen(auth()->user()->cpf)) > 12)
            return redirect()
                        ->back()
                        ->with('Erro', 'Lojista não pode efetuar transferencia.');

        if(!$sender = $user->getSender($request->sender)) 
            return redirect()
                        ->back()
                        ->with('Erro', 'Usuario não encontrado.');

            if($sender->id === auth()->user()->id)
            return redirect()
                        ->back()
                        ->with('Erro', 'Você não pode Transferir para você mesmo.');

            $saldo = auth()->user()->saldo;
            return view('admin.transferencia.transfer-confirma', compact('sender', 'saldo'));

            

    }

    public function transferConfirm(Request $request, User $user)
    {
            if(!$sender = $user->find($request->sender_id))
                    return redirect()
                                ->route('admin.transferencia')
                                ->with('sucess', 'Recebedor não encontrado!');

            $transf = auth()->user()->saldo()->firstOrCreate([]);
            $response = $transf->transfer($request->value, $sender);

            if($response['sucess'])
                return redirect()
                        ->route('admin.transferencia')
                        ->with('sucess', $response['message']);

            return redirect()
                        ->route('admin.transferencia')
                        ->with('error', $response['message']);
    }






}
