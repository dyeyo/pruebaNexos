<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuentas extends Model
{
    protected $table='cuentas';
    protected $fillable=['numero_cuenta','clave_cuenta','telefono','direccion','usuario_id','estado'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function movimientos(){
        return $this->hasMany(Movimientos::class);
    }

    public function cajero(){
        return $this->hasMany(Cajeros::class);
    }
}
