<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $fillable = ['type', 'totalMovimentado', 'total_antes', 'total_depois', 'user_id_transacao', 'date', 'created_at', 'updated_at'];
}
