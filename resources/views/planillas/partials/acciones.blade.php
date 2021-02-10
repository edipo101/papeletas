@canatleast(['planillas.edit','planillas.destroy','papeletas.index','planillas.papeletas','planillas.listado'])
<div class="btn-group pull-right">
	<button type="button" class="btn btn-flat btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Acciones <span class="fa fa-caret-down"></span></button>
	<ul class="dropdown-menu">
		@can('planillas.edit')
		<li><a href="{{ route('planillas.edit',$id) }}"><i class="fa fa-edit"></i> Editar</a></li>
		@endcan
		@can('papeletas.index')
		<li><a href="{{ route('papeletas.index',$id) }}"><i class="fa fa-files-o"></i> Ver Papeletas</a></li>
		@endcan
		@can('planillas.papeletas')
		<li><a href="{{ route('planillas.papeletas', $id) }}"><i class="fa fa-file-pdf-o"></i> Generar Papeletas</a></li>
		@endcan
		@can('planillas.listado')
		<li><a href="javascript:void(0);" onclick="listarPlanilla({{ $id }}); return false;"><i class="fa fa-list-alt"></i> Listado de papeletas</a></li>
		@endcan
		@can('planillas.destroy')
		<li><a href="javascript:void(0);" onclick="eliminarPlanilla({{ $id }}); return false;"><i class="fa fa-trash"></i> Eliminar</a></li>
		@endcan
	</ul>
</div>
@endcanatleast