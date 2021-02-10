<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\ModalidadRequest;

use SIS\Modalidad;
use Toastr;
use Yajra\DataTables\DataTables;
use Validator;

class ModalidadController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function apiModalidads()
    {
        $modalidads = Modalidad::select('id','nombre','activo')->get();
        return Datatables::of($modalidads)
                    ->addIndexColumn()
                    ->addColumn('fullactivo', function($modalidad){
                        return $modalidad->activo == 1
                                    ? '<span class="label label-success">'.$modalidad->fullactivo.'</span>'
                                    : '<span class="label label-danger">'.$modalidad->fullactivo.'</span>';
                    })
                    ->addColumn('action','modalidads.partials.acciones')
                    ->rawColumns(['action', 'fullactivo'])
                    ->toJson();
    }

    public function index()
    {
        return view('modalidads.index');
    }

    public function create()
    {
        return view('modalidads.create');
    }

    public function store(ModalidadRequest $request)
    {
        $modalidad = Modalidad::create($request->all());

        Toastr::success('Modalidad creado correctamente','Correcto!');
        return redirect()->route('modalidads.index');
    }

    public function edit(Modalidad $modalidad)
    {
        return view('modalidads.edit',compact('modalidad'));
    }

    public function update(ModalidadRequest $request, Modalidad $modalidad)
    {
        $modalidad->fill($request->all());
        $modalidad->save();
        Toastr::info('Modalidad modificado correctamente','Actualizado!');
        return redirect()->route('modalidads.index');
    }

    public function destroy(Modalidad $modalidad)
    {
        $modalidad->delete();

        return response()->json();
    }
}
