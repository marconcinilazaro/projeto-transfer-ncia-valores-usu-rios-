<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\User;

class Saldo extends Model
{
    public function transfer(float $value, User $sender): Array
    {
        if($this->saldo < $value)
            return[ 
                'sucess' => false,
                'message'=> 'Saldo insuficiente',
            ];

            DB::beginTransaction();
            // Atualizar o proprio saldo
            $totalAntes = $this->saldo ? $this->saldo : 0;
            $this->saldo -= number_format($value, 2, '.', '');
            $transfer = $this->save();

            $historico = auth()->user()->historico()->create([
                'type'                  => 'T',
                'totalMovimentado'      => $value,
                'total_antes'           => $totalAntes,
                'total_depois'          => $this->saldo,
                'date'                  => date('Ymd'),
                'user_id_transacao'     => $sender->id,

            ]);

            //atualiza o saldo do recebedor
            $senderBalance = $sender->saldo()->firstOrCreate([]);
            $totalAntesSender = $senderBalance->saldo;
            $senderBalance->saldo += number_format($value, 2, '.', '');
            $transferSender = $senderBalance->save();

            $historicoSender = $sender->historico()->create([
                'type'                  => 'I',
                'totalMovimentado'      => $value,
                'total_antes'           => $totalAntesSender,
                'total_depois'          =>  $senderBalance->saldo,
                'date'                  => date('Ymd'),
                'user_id_transacao'     => auth()->user()->id,

            ]);


            if($transfer && $historico && $transferSender && $historicoSender){
              
                
              
                DB::commit();

                return [
                    'sucess' => true,
                    'message'=> 'Sucesso ao Transferir'
                ];
            }else{
                DB::rollback();
                
                return[
                    'sucess' => false,
                    'message'=> 'Falha ao retirar'
                ];
            }
            
    }
}
