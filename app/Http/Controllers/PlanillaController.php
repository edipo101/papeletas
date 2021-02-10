<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\PlanillaStoreRequest;
use SIS\Http\Requests\PlanillaUpdateRequest;

use SIS\Planilla;
use SIS\Modalidad;
use Toastr;
use Yajra\DataTables\DataTables;
use Validator;
use SIS\Papeleta;
use SIS\Empresa;
use App;
use Illuminate\Support\Facades\DB;

class PlanillaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function apiPlanillas()
    {
        $planillas = Planilla::join('modalidads','modalidads.id','=','planillas.modalidad_id')
                    ->join('users','users.id','=','planillas.user_id')
                    ->select('planillas.id','planillas.nroplanilla','modalidads.nombre AS modalidad','planillas.gestion','planillas.mes','users.nickname AS usuario')
                    ->orderBy('planillas.id','DESC')
                    ->get();
        return Datatables::of($planillas)
                    ->addIndexColumn()
                    ->editColumn('usuario', function($planilla){
                        return '<span class="label label-primary">'.$planilla->usuario.'</span>';
                    })
                    ->addColumn('papeletas', function($planilla){
                        return $planilla->papeletas->count();
                    })
                    ->addColumn('action','planillas.partials.acciones')
                    ->rawColumns(['action','usuario'])
                    ->toJson();
    }

    public function index()
    {
        return view('planillas.index');
    }

    public function create()
    {
        $meses = [
            'ENERO' => 'ENERO', 'FEBRERO' => 'FEBRERO', 'MARZO' => 'MARZO', 'ABRIL' => 'ABRIL',
            'MAYO' => 'MAYO', 'JUNIO' => 'JUNIO', 'JULIO' => 'JULIO', 'AGOSTO' => 'AGOSTO',
            'SEPTIEMBRE' => 'SEPTIEMBRE', 'OCTUBRE' => 'OCTUBRE', 'NOVIEMBRE' => 'NOVIEMBRE', 'DICIEMBRE' => 'DICIEMBRE'
        ];
        $modalidads = Modalidad::all()->pluck('nombre','id');
        return view('planillas.create',compact('modalidads','meses'));
    }
    
    public function store(PlanillaStoreRequest $request)
    {
        $planilla = new Planilla();
        $planilla->fill($request->all());
        $planilla->user_id = auth()->id();
        $planilla->save();
        
        Toastr::success('Planilla creado correctamente','Correcto!');
        return redirect()->route('planillas.index');
    }
    
    public function edit(Planilla $planilla)
    {
        $meses = [
            'ENERO' => 'ENERO', 'FEBRERO' => 'FEBRERO', 'MARZO' => 'MARZO', 'ABRIL' => 'ABRIL',
            'MAYO' => 'MAYO', 'JUNIO' => 'JUNIO', 'JULIO' => 'JULIO', 'AGOSTO' => 'AGOSTO',
            'SEPTIEMBRE' => 'SEPTIEMBRE', 'OCTUBRE' => 'OCTUBRE', 'NOVIEMBRE' => 'NOVIEMBRE', 'DICIEMBRE' => 'DICIEMBRE'
        ];
        $modalidads = Modalidad::all()->pluck('nombre','id');
        return view('planillas.edit',compact('planilla','modalidads','meses'));
    }
    
    public function update(PlanillaUpdateRequest $request, Planilla $planilla)
    {
        $planilla->fill($request->all());
        $planilla->user_id = auth()->id();
        $planilla->save();
        Toastr::info('Planilla modificado correctamente','Actualizado!');
        return redirect()->route('planillas.index');
    }

    public function destroy(Planilla $planilla)
    {
        $planilla->delete();

        return response()->json();
    }

    public function listar(Planilla $planilla)
    {
        $papeletas = DB::table('papeletas')->where('planilla_id',$planilla->id)
                    ->join('funcionarios','funcionarios.id','=','papeletas.funcionario_id')
                    ->select('papeletas.id','funcionarios.nombre','papeletas.item')
                    ->orderBy('funcionarios.nombre','ASC')
                    ->get();
        $empresa = Empresa::find(1);
        $pdf = App::make('snappy.pdf.wrapper');
        // $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('planillas.imprimir.listado',compact('papeletas','empresa','planilla'));
        return $pdf->setPaper('letter')->stream('lista-planilla.pdf');
    }

    public function generar(Planilla $planilla)
    {
        $papeletas = Papeleta::where('planilla_id',$planilla->id)
                        ->with('funcionario')
                        ->get()
                        ->sortBy(function($papeleta) {
                            return $papeleta->funcionario->nombre;
                        });
        $empresa = Empresa::find(1);
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('papeletas.imprimir.papeleta',compact('papeletas','empresa'));
        return $pdf->setPaper('letter')->download('papeletas'.$planilla->nroplanilla.'-'.$planilla->mes.'/'.$planilla->gestion.'-'.$planilla->modalidad->nombre.'.pdf');
    }
}
