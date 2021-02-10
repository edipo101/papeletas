<div class="row">
    <div class="col-md-8">
        <div class="form-group{{ $errors->has('carnet') ? ' has-error' : '' }}">
            {{ Form::label('carnet', 'Nombre') }}
            {{ Form::text('carnet',null,['class'=> 'form-control', 'placeholder'=>'00000000']) }}
            @if ($errors->has('carnet'))
                <span class="help-block">
                    <strong>{{ $errors->first('carnet') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('exp') ? ' has-error' : '' }}">
            {{ Form::label('exp', 'EXP') }}
            {{ Form::select('exp',$expeditos,null,['class'=> 'form-control text-uppercase', 'placeholder'=>'SELECCION UN EXPEDITO']) }}
            @if ($errors->has('exp'))
                <span class="help-block">
                    <strong>{{ $errors->first('exp') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-7">
        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE COMPLETO DE FUNCIONARIO']) }}
            @if ($errors->has('nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group{{ $errors->has('fecha_in') ? ' has-error' : '' }}">
			{{ Form::label('fecha_in', 'FECHA ELABORACION DE CONTRATO') }}
			<div class="input-group date">
                <div class="input-group-addon">
                	<i class="fa fa-calendar"></i>
				</div>
				@if(isset($funcionario))
				{{ Form::text('fecha_in', $funcionario->fecha_ingreso->format('d-m-Y'),['class'=> 'form-control pull-rigth date']) }}
				@else
				{{ Form::text('fecha_in', null,['class'=> 'form-control pull-rigth date']) }}
				@endif
            </div>
			
			@if ($errors->has('fecha_in'))
				<span class="help-block">
					<strong>{{ $errors->first('fecha_in') }}</strong>
				</span>
			@endif
		</div>
    </div>
</div>


<div class="form-group text-center">
	<div class="row">
		<div class="col-md-3 col-md-offset-3">
			<label>
				{{ Form::radio('activo',1,true) }} ACTIVO
			</label>
		</div>
		<div class="col-md-3">
			<label>
				{{ Form::radio('activo',0 ) }} INACTIVO	
			</label>
		</div>
	</div>
	
	
</div>

<div class="form-group text-center">
	{{ Form::submit('GUARDAR', ['class'=>'btn btn-flat btn-primary']) }}
	<a href="{{ route('funcionarios.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
</div>

@section('css')
	<!-- iCheck -->
    <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />
    <!-- DateTimePicker -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('scripts')
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <!-- DateTimePicker -->
    <script src="{{ asset('plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('plugins/moment/locale/es.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    
    <script>
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
        $('.date').datetimepicker({
            format: 'DD-MM-YYYY',
            locale: 'es'
        });
    </script>
@endsection