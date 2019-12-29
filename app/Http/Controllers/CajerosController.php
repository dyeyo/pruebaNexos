<?php

namespace App\Http\Controllers;

use App\Cajeros;
use App\Cuentas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CajerosController extends Controller
{
    public function index(Request $request)
    {
//        $f=Cajeros::join('users', 'cajeros.id', '=', 'cajeros.usuario_id')
//            ->select('cajeros.id','cajeros.saldo','cajeros.tipo_accion',
//                'cajeros.descripcion','cajeros.cuenta_id','cajeros.usuario_id',
//                'users.name','users.numero_doc','cajeros.created_at')
//            ->orderBy('cajeros.id','DESC')
//            ->get();
//        dd($f);
        if ($request->ajax()){
            return Cajeros::join('users', 'cajeros.id', '=', 'cajeros.usuario_id')
                ->join('cuentas','cajeros.id','=','cajeros.cuenta_id')
                ->select('cajeros.id','cajeros.saldo','cajeros.tipo_accion',
                    'cajeros.descripcion','cajeros.cuenta_id','cajeros.usuario_id',
                    'users.name','users.numero_doc','users.name','cajeros.created_at','cuentas.numero_cuenta')
                ->orderBy('cajeros.id','DESC')
                ->get();
        }else{
            return view('cajeros.index');
        }
    }

    public function getCuentas()
    {
        $cajeros=Cuentas::where('usuario_id',Auth::User()->id)
            ->where('estado',1)
            ->orderBy('id','DESC')
            ->get();
        return response()->json($cajeros);
    }

    public function getUser()
    {
        $user=User::all();
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $cajero=new Cajeros();
        $cajero->saldo= $request->saldo;
        $cajero->tipo_accion= $request->tipo_accion;
        $cajero->descripcion= $request->descripcion;
        $cajero->cuenta_id= $request->cuenta_id;
        $cajero->usuario_id = auth()->id();
        $cajero->save();

        return $cajero;
    }

    public function update(Request $request, $id)
    {
        $cajero=Cajeros::find($id);
        $cajero->saldo= $request->saldo;
        $cajero->tipo_accion= $request->tipo_accion;
        $cajero->descripcion= $request->descripcion;
        $cajero->cuenta_id= $request->cuenta_id;
        $cajero->usuario_id = auth()->id();
        $cajero->update();
        return $cajero;
    }

}
