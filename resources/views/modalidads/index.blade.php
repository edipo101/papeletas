@extends('modalidads.box')

@section('subtitle','Gestionar modalidades en el sistema')

@section('bread')
    {{ breadcrumbs('modalidads') }}
@endsection

@section('title','LISTA DE MODALIDADES')

@section('buttons')
    @can('modalidads.create')
    <a href="{{ route('modalidads.create') }}" class="btn btn-flat btn-sm btn-primary">
        <i class="fa fa-plus-circle"></i> NUEVA MODALIDAD
    </a>
    @endcan
@endsection

@section('body')
    <table id="modalidads" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th width="10px">#</th>
                <th>NOMBRE</th>
                <th width="10%">ESTADO</th>
                <th width="8%">&nbsp;</th>
            </tr>
        </thead> 
    </table>
@endsection

@section('scripts')
<script>
    let tabla = $('#modalidads').DataTable({
		responsive: true,
		autoWidth:false,
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar modalidad..."
        },
        order: [[ 0, "asc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('modalidads.apiModalidads') !!}',
        columns: [
            { data: 'numero_index'},
            { data: 'nombre'},
			{ data: 'fullactivo'},
            { data: 'action', orderable: false, searchable: false},
        ],
	});
	const eliminarModalidad = id => {
		let ruta = `${direccion}/modalidads/${id}/delete`
		eliminar(ruta,'modalidad',tabla)
	};
</script>
@endsection