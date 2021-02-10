<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\FuncionarioStoreRequest;
use SIS\Http\Requests\FuncionarioUpdateRequest;

use SIS\Funcionario;
use Toastr;
use Yajra\DataTables\DataTables;
use Validator;

class FuncionarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function apiFuncionarios()
    {
        $funcionarios = Funcionario::select('id','nombre','carnet','exp','fecha_ingreso','activo')->get();
        return Datatables::of($funcionarios)
                    ->addIndexColumn()
                    ->editColumn('carnet', function($funcionario){
                        return $funcionario->fullcarnet;
                    })
                    ->editColumn('fecha_ingreso', function($funcionario){
                        return $funcionario->fecha_ingreso === NULL 
                                ? 'SIN FECHA DE INGRESO'
                                : $funcionario->fecha_ingreso->format('d/m/Y');
                    })
                    ->addColumn('fullactivo', function($funcionario){
                        return $funcionario->activo == 1
                                    ? '<span class="label label-success">'.$funcionario->fullactivo.'</span>'
                                    : '<span class="label label-danger">'.$funcionario->fullactivo.'</span>';
                    })
                    ->addColumn('action','funcionarios.partials.acciones')
                    ->rawColumns(['action', 'fullactivo'])
                    ->toJson();
    }

    public function index()
    {
        return view('funcionarios.index');
    }

    public function create()
    {
        $expeditos = ['CH'=>'CHUQUISACA','LP'=>'LA PAZ','PT'=>'POTOSI','OR'=>'ORURO','CB'=>'COCHABAMBA','TJ'=>'TARIJA','SC'=>'SANTA CRUZ','PD'=>'PANDO','BN'=>'BENI','EX'=>'EXTRANJERO'];
        return view('funcionarios.create', compact('expeditos'));
    }

    public function store(FuncionarioStoreRequest $request)
    {
        $funcionario = new Funcionario();
        $funcionario->fill($request->all());
        $funcionario->fecha_ingreso = date('Y-m-d', strtotime($request->fecha_in));
        $funcionario->save();

        Toastr::success('Funcionario creado correctamente','Correcto!');
        return redirect()->route('funcionarios.index');
    }

    public function edit(Funcionario $funcionario)
    {
        $expeditos = ['CH'=>'CHUQUISACA','LP'=>'LA PAZ','PT'=>'POTOSI','OR'=>'ORURO','CB'=>'COCHABAMBA','TJ'=>'TARIJA','SC'=>'SANTA CRUZ','PD'=>'PANDO','BN'=>'BENI','EX'=>'EXTRANJERO'];
        return view('funcionarios.edit',compact('funcionario','expeditos'));
    }

    public function update(FuncionarioUpdateRequest $request, Funcionario $funcionario)
    {
        $funcionario->fill($request->all());
        $funcionario->fecha_ingreso = date('Y-m-d', strtotime($request->fecha_in));
        $funcionario->save();
        Toastr::info('Funcionario modificado correctamente','Actualizado!');
        return redirect()->route('funcionarios.index');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();

        return response()->json();
    }
}
