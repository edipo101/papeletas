<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Planilla;
use SIS\Funcionario;
use SIS\Modalidad;
use SIS\User;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planillas = Planilla::all()->count();
        $funcionarios = Funcionario::all()->count();
        $modalidads = Modalidad::all()->count();
        $users = User::all()->count();
        $lastplanillas = Planilla::latest()->get()->take(5);
        return view('home', compact('planillas','funcionarios','modalidads','users','lastplanillas'));
    }
}
