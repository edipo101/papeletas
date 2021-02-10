@canatleast(['papeletas.edit','papeletas.destroy','papeletas.imprimir'])
<div class="btn-group pull-right">
	<button type="button" class="btn btn-flat btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bars"></i> <span class="fa fa-caret-down"></span></button>
	<ul class="dropdown-menu">
		@can('papeletas.edit')
		<li><a href="{{ route('papeletas.edit',[$planilla_id,$id]) }}"><i class="fa fa-edit"></i> Editar</a></li>
		@endcan
		@can('papeletas.imprimir')
		<li><a href="javascript:void(0);" onclick="imprimirPapeleta({{ $id }}); return false;"><i class="fa fa-print"></i> Imprimir</a></li>
		@endcan
		@can('papeletas.destroy')
		<li><a href="javascript:void(0);" onclick="eliminarPapeleta({{ $id }}); return false;"><i class="fa fa-trash"></i> Eliminar</a></li>
		@endcan
	</ul>
</div>
@endcanatleast