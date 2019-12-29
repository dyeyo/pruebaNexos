<?php

namespace App\Http\Controllers;

use App\Cuentas;
use App\Movimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovimientosController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()){
            return Movimientos::where('usuario_id',Auth::User()->id)
                ->orderBy('id','DESC')->get();
        }else{
            return view('movimientos.index');
        }
    }

    public function getCuentas()
    {
        $cuentas=Cuentas::where('usuario_id',Auth::User()->id)
                ->orderBy('id','DESC')->get();
        return response()->json($cuentas);
    }

    public function store(Request $request)
    {
        $movimiento=new Movimientos();
        $movimiento->saldo= $request->saldo;
        $movimiento->cuenta_id= $request->cuenta_id;
        $movimiento->usuario_id = auth()->id();
        $movimiento->save();

        $cuenta=Cuentas::find($request->cuenta_id);
        $cuenta->estado=1;
        $cuenta->update();
        return $movimiento;
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
