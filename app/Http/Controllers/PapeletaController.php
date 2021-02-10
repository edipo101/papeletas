<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\PapeletaStoreRequest;
use SIS\Http\Requests\PapeletaUpdateRequest;

use SIS\Papeleta;
use SIS\Planilla;
use SIS\Empresa;
use Toastr;
use Yajra\DataTables\DataTables;
use Validator;
use App;

use SIS\Imports\PapeletasImport; // El Import que se desea usar
use Maatwebsite\Excel\Facades\Excel;
use SIS\Funcionario;

class PapeletaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function apiPapeletas($id)
    {
        $papeletas = Papeleta::where('planilla_id',$id)
                        ->join('planillas','planillas.id','=','papeletas.planilla_id')
                        ->join('funcionarios','funcionarios.id','=','papeletas.funcionario_id')
                        ->join('modalidads','modalidads.id','=','papeletas.modalidad_id')
                        ->select('papeletas.id','planillas.id as planilla_id','planillas.nroplanilla', 'modalidads.nombre AS modalidad','funcionarios.nombre','funcionarios.carnet','funcionarios.exp','funcionarios.fecha_ingreso','papeletas.cargo','papeletas.item', 'papeletas.dias_trabajados','papeletas.totalingresos','papeletas.totaldescuento','papeletas.liquidopagable','papeletas.entregado')
                        ->get();
        return Datatables::of($papeletas)
                    ->addIndexColumn()
                    // ->editColumn('carnet', function($papeleta){
                    //     return $papeleta->carnet.'-'.$papeleta->exp;
                    // })
                    // ->addColumn('fullentregado', function($papeleta){
                    //     return $papeleta->activo == 1
                    //                 ? '<span class="label label-success">'.$papeleta->fullentregado.'</span>'
                    //                 : '<span class="label label-danger">'.$papeleta->fullentregado.'</span>';
                    // })
                    ->editColumn('fecha_ingreso', function($papeleta){
                        return $papeleta->fecha_ingreso === NULL 
                                ? 'S/F'
                                : date('d/m/Y', strtotime($papeleta->fecha_ingreso));
                    })
                    ->editColumn('totalingresos', function($papeleta){
                        return number_format($papeleta->totalingresos,2,'.','')." Bs.";
                    })
                    ->editColumn('totaldescuento', function($papeleta){
                        return number_format($papeleta->totaldescuento,2,'.','')." Bs.";
                    })
                    ->editColumn('liquidopagable', function($papeleta){
                        return number_format($papeleta->liquidopagable,2,'.','')." Bs.";
                    })
                    ->editColumn('nroplanilla', function($papeleta){
                        return $papeleta->nroplanilla."<br><strong>".$papeleta->modalidad."</strong>";
                    })
                    ->addColumn('action','papeletas.partials.acciones')
                    ->rawColumns(['action','nroplanilla'])
                    // ->rawColumns(['action','nroplanilla','fullentregado'])
                    ->toJson();
    }

    public function index($id)
    {
        $planilla = Planilla::find($id);
        return view('papeletas.index',compact('planilla'));
    }

    public function destroy(Papeleta $papeleta)
    {
        $papeleta->delete();

        return response()->json();
    }

    public function imprimir($id)
    {
        $cont = explode(',',$id);
        $papeletas = Papeleta::whereIn('id',$cont)->get()
                        ->sortBy(function($papeleta) {
                            return $papeleta->funcionario->nombre;
                        });
        $empresa = Empresa::find(1);
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('papeletas.imprimir.papeleta',compact('papeletas','empresa'));
        return $pdf->setPaper('letter')->stream('papeleta.pdf');
    }

    public function importar(Request $request)
    {

        Excel::import(new PapeletasImport, $request->file('archivo'));

        return response()->json();
    }

    public function create($id)
    {
        $planilla = Planilla::find($id);
        $funcionarios = Funcionario::where('activo',1)->orderBy('nombre','ASC')->get()->pluck('fullnombre','id');
        return view('papeletas.create', compact('planilla','funcionarios'));
    }
    
    public function store(PapeletaStoreRequest $request)
    {

        return redirect()->route('papeletas.index');
    }

    public function edit($id,Papeleta $papeleta)
    {
        $planilla = Planilla::find($id);
        $funcionarios = Funcionario::where('activo',1)->orderBy('nombre','ASC')->get()->pluck('fullnombre','id');
        return view('papeletas.edit', compact('papeleta','planilla','funcionarios'));
    }

    public function update(Papeleta $papeleta, PapeletaUpdateRequest $request)
    {
        $papeleta->fill($request->all())->save();
        Toastr::info('Papeleta modificado correctamente','Actualizado!');
        return redirect()->route('papeletas.index',$papeleta->planilla_id);
    }
}
