@extends('funcionarios.box')

@section('subtitle','Gestionar funcionarios en el sistema')

@section('bread')
    {{ breadcrumbs('funcionarios') }}
@endsection

@section('title','LISTA DE FUNCIONARIOS')

@section('buttons')
    @can('funcionarios.create')
    <a href="{{ route('funcionarios.create') }}" class="btn btn-flat btn-sm btn-primary">
        <i class="fa fa-plus-circle"></i> NUEVO FUNCIONARIO
    </a>
    @endcan
@endsection

@section('body')
    <table id="funcionarios" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th width="10px">#</th>
                <th>CARNET</th>
                <th>NOMBRE</th>
                <th>FECHA INGRESO</th>
                <th width="10%">ESTADO</th>
                <th width="8%">&nbsp;</th>
            </tr>
        </thead> 
    </table>
@endsection

@section('scripts')
<script>
    let tabla = $('#funcionarios').DataTable({
		responsive: true,
		autoWidth:false,
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar funcionario..."
        },
        order: [[ 0, "asc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('funcionarios.apiFuncionarios') !!}',
        columns: [
            { data: 'numero_index'},
            { data: 'carnet'},
            { data: 'nombre'},
            { data: 'fecha_ingreso'},
			{ data: 'fullactivo'},
            { data: 'action', orderable: false, searchable: false},
        ],
	});
	const eliminarFuncionario = id => {
		let ruta = `${direccion}/funcionarios/${id}/delete`
		eliminar(ruta,'funcionario',tabla)
	};
</script>
@endsection