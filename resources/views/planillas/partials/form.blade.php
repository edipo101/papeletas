<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('nroplanilla') ? ' has-error' : '' }}">
            {{ Form::label('nroplanilla', 'Nro. Planilla') }}
            {{ Form::text('nroplanilla',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NUMERO DE LA PLANILLA']) }}
            @if ($errors->has('nroplanilla'))
                <span class="help-block">
                    <strong>{{ $errors->first('nroplanilla') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('modalidad_id') ? ' has-error' : '' }}">
            {{ Form::label('modalidad_id', 'MODALIDAD') }}
            {{ Form::select('modalidad_id',$modalidads,null,['class'=> 'form-control text-uppercase', 'placeholder'=>'SELECCIONE UNA MODALIDAD']) }}
            @if ($errors->has('modalidad_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('modalidad_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('mes') ? ' has-error' : '' }}">
            {{ Form::label('mes', 'MES') }}
            {{ Form::select('mes',$meses, null,['class'=> 'form-control text-uppercase', 'placeholder'=>'SELECCIONE UN MES']) }}
            @if ($errors->has('mes'))
                <span class="help-block">
                    <strong>{{ $errors->first('mes') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('gestion') ? ' has-error' : '' }}">
            {{ Form::label('gestion', 'GESTION') }}
            {{ Form::text('gestion',!isset($planilla) ? Date::now()->year : null,['class'=> 'form-control text-uppercase', 'placeholder'=>'GESTION']) }}
            @if ($errors->has('gestion'))
                <span class="help-block">
                    <strong>{{ $errors->first('gestion') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="form-group text-center">
	{{ Form::submit('GUARDAR', ['class'=>'btn btn-flat btn-primary']) }}
	<a href="{{ route('planillas.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
</div>