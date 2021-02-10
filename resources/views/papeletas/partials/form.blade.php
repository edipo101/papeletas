<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('nroplanilla', 'Nro. Planilla') }}
            {{ Form::text('nroplanilla',$planilla->nroplanilla,['class'=> 'form-control text-uppercase', 'placeholder'=>'NUMERO DE LA PLANILLA','readonly'=>'readonly']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('mes', 'Mes') }}
            {{ Form::text('mes',$planilla->mes,['class'=> 'form-control text-uppercase', 'placeholder'=>'MES DE LA PLANILLA','readonly'=>'readonly']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('gestion', 'Gestion') }}
            {{ Form::text('gestion',$planilla->gestion,['class'=> 'form-control text-uppercase', 'placeholder'=>'GESTION DE LA PLANILLA','readonly'=>'readonly']) }}
        </div>
    </div>
</div>

<div class="form-group{{ $errors->has('funcionario_id') ? ' has-error' : '' }}">
    {{ Form::label('funcionario_id', 'Funcionario') }}
    {{ Form::select('funcionario_id',$funcionarios,null,['class'=> 'form-control select text-uppercase', 'placeholder'=>'SELECCIONE UN FUNCIONARIO']) }}
    @if ($errors->has('funcionario_id'))
        <span class="help-block">
            <strong>{{ $errors->first('funcionario_id') }}</strong>
        </span>
    @endif
</div>

<div class="row">
    <div class="col-md-2">
        <div class="form-group{{ $errors->has('item') ? ' has-error' : '' }}">
            {{ Form::label('item', 'ITEM') }}
            {{ Form::text('item',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('item'))
                <span class="help-block">
                    <strong>{{ $errors->first('item') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
            {{ Form::label('cargo', 'CARGO') }}
            {{ Form::text('cargo',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'CARGO DEL FUNCIONARIO']) }}
            @if ($errors->has('cargo'))
                <span class="help-block">
                    <strong>{{ $errors->first('cargo') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('unidad') ? ' has-error' : '' }}">
            {{ Form::label('unidad', 'UNIDAD') }}
            {{ Form::text('unidad',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'UNIDAD DEL FUNCIONARIO']) }}
            @if ($errors->has('unidad'))
                <span class="help-block">
                    <strong>{{ $errors->first('unidad') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="form-group{{ $errors->has('dias_trabajados') ? ' has-error' : '' }}">
            {{ Form::label('dias_trabajados', 'DIAS TRAB.') }}
            {{ Form::text('dias_trabajados',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('dias_trabajados'))
                <span class="help-block">
                    <strong>{{ $errors->first('dias_trabajados') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group{{ $errors->has('haberbasico') ? ' has-error' : '' }}">
            {{ Form::label('haberbasico', 'HABER BAS.') }}
            {{ Form::text('haberbasico',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('haberbasico'))
                <span class="help-block">
                    <strong>{{ $errors->first('haberbasico') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group{{ $errors->has('antiguedad') ? ' has-error' : '' }}">
            {{ Form::label('antiguedad', 'ANTIGUEDAD') }}
            {{ Form::text('antiguedad',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('antiguedad'))
                <span class="help-block">
                    <strong>{{ $errors->first('antiguedad') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group{{ $errors->has('subsidios') ? ' has-error' : '' }}">
            {{ Form::label('subsidios', 'SUBSIDIOS') }}
            {{ Form::text('subsidios',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('subsidios'))
                <span class="help-block">
                    <strong>{{ $errors->first('subsidios') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group{{ $errors->has('otrosingresos') ? ' has-error' : '' }}">
            {{ Form::label('otrosingresos', 'OTROS INGRESOS') }}
            {{ Form::text('otrosingresos',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('otrosingresos'))
                <span class="help-block">
                    <strong>{{ $errors->first('otrosingresos') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group{{ $errors->has('totalingresos') ? ' has-error' : '' }}">
            {{ Form::label('totalingresos', 'TOTAL INGRESOS') }}
            {{ Form::text('totalingresos',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('totalingresos'))
                <span class="help-block">
                    <strong>{{ $errors->first('totalingresos') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group{{ $errors->has('iva') ? ' has-error' : '' }}">
            {{ Form::label('iva', 'IVA') }}
            {{ Form::text('iva',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('iva'))
                <span class="help-block">
                    <strong>{{ $errors->first('iva') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group{{ $errors->has('afp') ? ' has-error' : '' }}">
            {{ Form::label('afp', 'AFP') }}
            {{ Form::text('afp',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('afp'))
                <span class="help-block">
                    <strong>{{ $errors->first('afp') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group{{ $errors->has('memomulta') ? ' has-error' : '' }}">
            {{ Form::label('memomulta', 'MEMO MULTA') }}
            {{ Form::text('memomulta',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('memomulta'))
                <span class="help-block">
                    <strong>{{ $errors->first('memomulta') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group{{ $errors->has('descuentossindicato') ? ' has-error' : '' }}">
            {{ Form::label('descuentossindicato', 'SINDICATO') }}
            {{ Form::text('descuentossindicato',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('descuentossindicato'))
                <span class="help-block">
                    <strong>{{ $errors->first('descuentossindicato') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group{{ $errors->has('retjudicial') ? ' has-error' : '' }}">
            {{ Form::label('retjudicial', 'RET. JUDICIAL') }}
            {{ Form::text('retjudicial',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('retjudicial'))
                <span class="help-block">
                    <strong>{{ $errors->first('retjudicial') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group{{ $errors->has('otrosdescuentos') ? ' has-error' : '' }}">
            {{ Form::label('otrosdescuentos', 'OTROS DESCUENTOS') }}
            {{ Form::text('otrosdescuentos',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('otrosdescuentos'))
                <span class="help-block">
                    <strong>{{ $errors->first('otrosdescuentos') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group{{ $errors->has('totaldescuento') ? ' has-error' : '' }}">
            {{ Form::label('totaldescuento', 'TOTAL DESCUENTO') }}
            {{ Form::text('totaldescuento',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('totaldescuento'))
                <span class="help-block">
                    <strong>{{ $errors->first('totaldescuento') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group{{ $errors->has('ivaafavor') ? ' has-error' : '' }}">
            {{ Form::label('ivaafavor', 'IVA A FAVOR') }}
            {{ Form::text('ivaafavor',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('ivaafavor'))
                <span class="help-block">
                    <strong>{{ $errors->first('ivaafavor') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group{{ $errors->has('liquidopagable') ? ' has-error' : '' }}">
            {{ Form::label('liquidopagable', 'LIQUIDO PAGABLE') }}
            {{ Form::text('liquidopagable',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'0']) }}
            @if ($errors->has('liquidopagable'))
                <span class="help-block">
                    <strong>{{ $errors->first('liquidopagable') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="form-group text-center">
	{{ Form::submit('GUARDAR', ['class'=>'btn btn-flat btn-primary']) }}
	<a href="{{ route('papeletas.index',$planilla->id) }}" class="btn btn-flat btn-danger">CANCELAR</a>
</div>