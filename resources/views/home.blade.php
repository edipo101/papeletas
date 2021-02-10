@extends('layouts.master')

@section('title')
    Panel de Control
@endsection

@section('head-content')
    <h1>
        <i class="fa fa-dashboard"></i> PAPELETAS
        <small>Panel de Control del Sistema</small>
    </h1>
@endsection

@section('main-content')
<div class="row">
  @can('planillas.index')
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-file-text"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">PLANILLAS</span>
        <span class="info-box-number">{{ $planillas }}</span>
        <div class="progress">
            <div class="progress-bar" style="width: 100%; background:#ddd"></div>
        </div>
        <span class="progress-description">
            <a href="{{ route('planillas.index') }}">VER DETALLES</a>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  @endcan
  @can('funcionarios.index')
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">FUNCIONARIOS</span>
        <span class="info-box-number">{{ $funcionarios }}</span>
        <div class="progress">
            <div class="progress-bar" style="width: 100%; background:#ddd"></div>
        </div>
        <span class="progress-description">
            <a href="{{ route('funcionarios.index') }}">VER DETALLES</a>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  @endcan

  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>

  @can('modalidads.index')
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-database"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">MODALIDADES</span>
        <span class="info-box-number">{{ $modalidads }}</span>
        <div class="progress">
            <div class="progress-bar" style="width: 100%; background:#ddd"></div>
        </div>
        <span class="progress-description">
            <a href="{{ route('modalidads.index') }}">VER DETALLES</a>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  @endcan
  @can('users.index')
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">USUARIOS</span>
        <span class="info-box-number">{{ $users }}</span>
        <div class="progress">
            <div class="progress-bar" style="width: 100%; background:#ddd"></div>
        </div>
        <span class="progress-description">
            <a href="{{ route('users.index') }}">VER DETALLES</a>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  @endcan
</div>

<div class="row">
  <div class="col-md-5">
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-info-circle"></i> SISTEMA DE GENERACION DE PAPELETAS - GAMS</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <img src="{{ asset('img/empresa/gams.jpg') }}" alt="logo-gams" class="center-block img-responsive" width="100px">
          <h3 class="text-center">PAPELETAS</h3>
          <p class="lead text-center">Sistema de registro de planillas y generacion de papeletas de pago</p>
          <blockquote>
            En este sistema se realizara el registro de planillas y se importara los datos de las papeletas de pago de los funcionarios del GAMS, para luego generar e imprimir las papeletas de pago respectivos.
        </blockquote>
        </div>
        <!-- /.box-body -->
      </div>
  </div>
  @can('planillas.index')
  <div class="col-md-7">
    <!-- PLANILLAS LIST -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-file-text"></i> ULTIMAS PLANILLAS REGISTRADAS</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table class="table no-margin">
            <thead>
              <tr>
                <th>PLANILLA</th>
                <th>MODALIDAD</th>
                <th>MES</th>
                <th>GESTION</th>
                <th>PAPELETAS</th>
                <th class="text-center" colspan="2">ACCIONES</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($lastplanillas as $newplanillas)  
              <tr>
                <td>{{ $newplanillas->nroplanilla }}</td>
                <td>{{ $newplanillas->modalidad->nombre }}</td>
                <td>{{ $newplanillas->mes }}</td>
                <td>{{ $newplanillas->gestion }}</td>
                <td>{{ $newplanillas->papeletas->count() }}</td>
                @can('planillas.papeletas')
                <td><a href="{{ route('planillas.papeletas', $newplanillas->id) }}" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-file-pdf-o"></i> GENERAR PAPELETAS</a></td>
                @endcan
                @can('planillas.listado')
                <td><a href="javascript:void(0);" onclick="listarPlanilla({{ $newplanillas->id }}); return false;" class="btn btn-sm btn-flat bg-navy"><i class="fa fa-print"></i> IMPRIMIR LISTADO</a></td>
                @endcan
                <td></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer text-center">
        <a href="{{ route('planillas.index') }}" class="text-uppercase">VER PLANILLAS</a>
      </div>
      <!-- /.box-footer -->
    </div>
    <!--/.box -->
  </div>
  @endcan
</div>
@include('reportes.modal-imprimir')
@endsection

@section('scripts')
<script>
  let listarPlanilla = id => {
		let ruta = `${direccion}/planillas/${id}/listar`
		imprimir(ruta)
  }
</script>    
@endsection