<?php

namespace App\Http\Controllers;

use App\Cuentas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $registro = Cuentas::select('usuario_id')->where('usuario_id', Auth::User()->id)->count();
        //dd($registro);
        if (Auth::User()->tipo_user=='2'){
            return view('home', compact('registro'));
        }else{
            return view('cajeros.index');
        }
    }

}