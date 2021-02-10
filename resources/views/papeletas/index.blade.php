@extends('papeletas.box')

@section('subtitle','Gestion de papeletas en el sistema')

@section('title')
    LISTA DE PAPELETAS {{ $planilla->nroplanilla }} DEL MES {{ $planilla->mes }}/{{ $planilla->gestion }}
@endsection

@section('buttons')
    @can('planillas.index')
    <a href="{{ route('planillas.index') }}" class="btn btn-link"><i class="fa fa-arrow-circle-left"></i> VOLVER A LAS PLANILLAS</a>
    @endcan  
    {{-- @can('papeletas.create')
    <a href="{{ route('papeletas.create', $planilla->id) }}" class="btn btn-flat btn-sm btn-primary">
        <i class="fa fa-plus-circle"></i> NUEVA PAPELETA
    </a>
    @endcan   --}}
@endsection

@section('buttons-body')
    @can('papeletas.importar')
    <a href="#" id="btn-importar" class="btn btn-flat btn-sm btn-success">
        <i class="fa fa-download"></i> IMPORTAR PAPELETAS
    </a>
    @endcan
    @can('papeletas.imprimir')
    <a href="#" id="btn-papeletas" class="btn btn-flat btn-sm btn-info">
        <i class="fa fa-print"></i> IMPRIMIR LAS PAPELETAS
    </a>
    @endcan
    @can('planillas.papeletas')
    <a href="{{ route('planillas.papeletas',$planilla->id) }}" id="btn-papeletas" class="btn btn-flat btn-sm btn-danger">
        <i class="fa fa-file-pdf-o"></i> GENERAR PAPELETAS
    </a>
    <a href="javascript:void(0);" onclick="listarPlanilla({{ $planilla->id }}); return false;" class="btn btn-sm btn-flat bg-orange"><i class="fa fa-file-text"></i> IMPRIMIR LISTADO</a>
    @endcan
    <br><br>
@endsection

@section('body')
    <table id="papeletas" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th width="10px">#</th>
                <th>PLANILLA</th>
                <th>CARNET</th>
                <th>NOMBRE COMPLETO</th>
                <th>CARGO</th>
                <th>FECHA INGRESO</th>
                <th width="20px">ITEM</th>
                <th width="20px">D.T.</th>
                <th>TOTAL INGRESOS</th>
                <th>TOTAL DESCUENTOS</th>
                <th>LIQUIDO PAGABLE</th>
                {{-- <th>ENTREGADO</th> --}}
                <th width="5%">&nbsp;</th>
            </tr>
        </thead> 
    </table>
@include('reportes.modal-imprimir')
@include('papeletas.partials.modal-importar')
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.checkbox/css/dataTables.checkboxes.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('plugins/datatables.checkbox/js/dataTables.checkboxes.js') }}"></script>
<script>
    let tabla = $('#papeletas').DataTable({
		responsive: true,
		autoWidth:false,
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar papeleta..."
        },
        columnDefs: [
			{
				targets: 0,
				checkboxes: {
					seletRow: true
				}
			}
		],
		select:{
			style: 'multi'
		},
        order: [[ 3, "asc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('papeletas.apiPapeletas',$planilla->id) !!}',
        columns: [
            { data: 'id'},
            { data: 'nroplanilla'},
            { data: 'carnet'},
            { data: 'nombre'},
            { data: 'cargo'},
            { data: 'fecha_ingreso'},
            { data: 'item'},
            { data: 'dias_trabajados'},
            { data: 'totalingresos'},
            { data: 'totaldescuento'},
            { data: 'liquidopagable'},
            // { data: 'fullentregado'},
            { data: 'action', orderable: false, searchable: false},
        ],
	});
	const eliminarPapeleta = id => {
		let ruta = `${direccion}/papeletas/${id}/delete`
		eliminar(ruta,'papeleta',tabla)
	};

    const imprimirPapeleta = id => {
		let ruta = `${direccion}/papeletas/${id}/imprimir`
		imprimir(ruta)
    }

    let papeletasselect = [];
	const btnImportar = document.getElementById('btn-importar')
	const btnPapeletas = document.getElementById('btn-papeletas')
	// const btnTodos = document.getElementById('btn-todos')
    if(btnImportar!==null){
        btnImportar.addEventListener('click', e => {
            e.preventDefault();
            $('#modal-importar').modal('show');
        })
    }
    if(btnPapeletas!==null){
        btnPapeletas.addEventListener('click', e =>{
            e.preventDefault();
            let rowsel = tabla.column(0).checkboxes.selected();
            $.each(rowsel, function(index, rowId){
                papeletasselect.push(rowId)
            })
            if(papeletasselect.length!=0){
                let ruta = `${direccion}/papeletas/${papeletasselect}/imprimir`
                imprimir(ruta)
                papeletasselect = []
            }
            else{
                swal({
                    title: 'Seleccione uno o varios papeletas de pago para imprimir',
                    type: 'warning',
                })
            }
        })
    }
    let listarPlanilla = id => {
		let ruta = `${direccion}/planillas/${id}/listar`
		imprimir(ruta)
    } 
</script>
@endsection