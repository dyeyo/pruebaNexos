<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajeros extends Model
{
    protected $table="cajeros";
    protected $fillable = ['saldo', 'tipo_accion', 'descripcion', 'cuenta_id', 'usuario_id'];


    public function  cuentas()
    {
        return $this->belongsTo(Cuentas::class);
    }
    public function  user()
    {
        return $this->belongsTo(User::class);
    }
}

