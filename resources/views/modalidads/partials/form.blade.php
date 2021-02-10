<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE DE LA MODALIDAD']) }}
    @if ($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>
    @endif
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
	<a href="{{ route('modalidads.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
</div>

@section('css')
	<!-- iCheck -->
	<link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <script>
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    </script>
@endsection