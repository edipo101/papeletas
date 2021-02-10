@extends('planillas.box')

@section('subtitle','Gestionar planillas en el sistema')

@section('bread-box')
    {{ breadcrumbs('planillas') }}
@endsection

@section('title','LISTA DE PLANILLAS')

@section('buttons')
    @can('planillas.create')
    <a href="{{ route('planillas.create') }}" class="btn btn-flat btn-sm btn-primary">
        <i class="fa fa-plus-circle"></i> NUEVA PLANILLA
    </a>
    @endcan
@endsection

@section('body')
    <table id="planillas" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th width="10px">#</th>
                <th>MES</th>
                <th>GESTION</th>
                <th>NRO. PLANILLA</th>
                <th>MODALIDAD</th>
                <th>PAPELETAS</th>
                <th width="10%">USUARIO</th>
                <th width="8%">&nbsp;</th>
            </tr>
        </thead> 
    </table>
@include('reportes.modal-imprimir')
@endsection

@section('scripts')
<script>
    let tabla = $('#planillas').DataTable({
		responsive: true,
		autoWidth:false,
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar planilla..."
        },
        processing: true,
        serverSide: true,
        ajax: '{!! route('planillas.apiPlanillas') !!}',
        columns: [
            { data: 'numero_index'},
            { data: 'mes'},
            { data: 'gestion'},
            { data: 'nroplanilla'},
            { data: 'modalidad'},
			{ data: 'papeletas'},
			{ data: 'usuario'},
            { data: 'action', orderable: false, searchable: false},
        ],
	});
	const eliminarPlanilla = id => {
		let ruta = `${direccion}/planillas/${id}/delete`
		eliminar(ruta,'planilla',tabla)
	};

    let listarPlanilla = id => {
		let ruta = `${direccion}/planillas/${id}/listar`
		imprimir(ruta)
    }
</script>
@endsection