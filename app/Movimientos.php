<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movimientos extends Model
{
    protected $table='movimientos';
    protected $fillable=['saldo','cuenta_id','usuario_id'];


    public function  cuentas()
    {
        return $this->belongsTo(Cuentas::class);
    }
    public function  user()
    {
        return $this->belongsTo(User::class);
    }
}
