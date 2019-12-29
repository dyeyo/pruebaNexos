<?php

namespace App\Http\Controllers;

use App\Cuentas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CuentasController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()){
            return Cuentas::join('movimientos', 'cuentas.id', '=', 'movimientos.cuenta_id')
                ->select('cuentas.id','cuentas.numero_cuenta','cuentas.telefono',
                    'cuentas.direccion','cuentas.usuario_id','cuentas.estado',
                    'movimientos.saldo','movimientos.cuenta_id','movimientos.usuario_id','cuentas.created_at')
                ->where('cuentas.estado',1)
                ->where('movimientos.saldo','>=',100000)
                ->where('cuentas.usuario_id',Auth::User()->id)
                ->orderBy('cuentas.id','DESC')
                ->get();
        }else{
            return view('cuentas.index');
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $numDoc=Auth::User()->numero_doc;
        $cuenta=new Cuentas();
        $cuenta->numero_cuenta= $request->numero_cuenta;
        $cuenta->clave_cuenta=substr($numDoc,-4);
        $cuenta->telefono= $request->telefono;
        $cuenta->direccion= $request->direccion;
        $cuenta->estado=2;
        $cuenta->usuario_id = auth()->id();
        $cuenta->save();
        return $cuenta;
    }


    public function update(Request $request, $id)
    {
        $cuenta=Cuentas::find($id);
        $cuenta->telefono= $request->telefono;
        $cuenta->direccion= $request->direccion;
        $cuenta->usuario_id = auth()->id();
        $cuenta->update();
        return $cuenta;
    }

    public function desactivar_cuenta(Request $request, $id)
    {
        $cuenta=Cuentas::find($id);
        $cuenta->estado= $request->estado;
        $cuenta->update();
        return $cuenta;
    }
}
