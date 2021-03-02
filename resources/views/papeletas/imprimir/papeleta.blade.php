<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Papeletas</title>
    <link rel="stylesheet" href="{!! public_path('css/papeleta.css') !!}">
</head>
<body>
    <?php $contador=1; ?>
    @foreach ($papeletas as $papeleta)
    <div class="papeleta {{ $contador % 2 !== 0 ? '' : 'pt-9' }}">
    <header class='header'>
        <div class="empresa">
            <h1 class="empresa-titulo">{{ $empresa->nombre }}</h1>
            <h2 class="empresa-subtitulo">{{ $empresa->slogan }}</h2>
            <p class="direccion">DIRECCIÓN DE GESTIÓN DE RECURSOS HUMANOS</p>
        </div>
        <div class="info">
            {{-- <p class="fecha">{{ Date::now()->format('d/m/Y H:i:s') }}</p> --}}
            <p><strong>Gestión:</strong> {{ $papeleta->planilla->gestion }}</p>
            <p>Papeleta {{ $contador }} de {{ $papeletas->count() }}</p>
        </div>
        <div class="logo">
            <img src="{!! public_path('img/empresa/gams.jpg') !!}" alt="{{ $empresa->sigla }}" class="img-logo">
        </div>
        <h1 class="titulo">Papeleta de Pago de Haberes</h1>
    </header>

    <div class="info-papeleta">
        <table>
            <tr>
                <td class="right papeleta-titulo">Fecha de Ingreso:</td>
                @php
                $gestion = $papeleta->planilla->gestion;
                $fecha = ($gestion == 2021) ? $papeleta->funcionario->fechaingr_2021 : $papeleta->funcionario->fecha_ingreso; 
                $fecha = (is_null($fecha)) ? 's/f' : date('d/m/Y', strtotime($fecha));
                @endphp
                {{-- <td colspan="5">{{ $papeleta->funcionario->fecha_ingreso->format('d/m/Y') }}</td> --}}
                <td colspan="5">{{ $fecha }}</td>
            </tr>
            <tr>
                <td width="25%" class="right papeleta-titulo">Correspondiente al mes de:</td>
                <td width="20%">{{ $papeleta->planilla->mes }} DE {{ $papeleta->planilla->gestion }}</td>
                <td width="20%" class="right papeleta-titulo">Tipo de Funcionario:</td>
                <td width="15%">{{ $papeleta->modalidad->nombre }}</td>
                <td width="12%" class="right papeleta-titulo">Planilla Nro.:</td>
                <td width="8%">{{ $papeleta->planilla->nroplanilla }}</td>
            </tr>
        </table>
    </div>

    <div class="info-funcionario">
        <table>
            <tr>
                <td width="20%" class="right papeleta-titulo">Apellidos y Nombres:</td>
                <td width="35%">{{ $papeleta->funcionario->nombre }}</td>
                <td width="15%" class="right papeleta-titulo">Puesto:</td>
                <td width="30%">{{ $papeleta->cargo }}</td>
            </tr>
            <tr>
                <td class="right papeleta-titulo">Días Trabajados:</td>
                <td>{{ $papeleta->dias_trabajados }}</td>
                @if($papeleta->modalidad_id===1)
                <td class="right papeleta-titulo">Item:</td>
                <td>{{ $papeleta->item }}</td>
                @endif
            </tr>
        </table>
    </div>
    
    <div class="detalle">
        <div class="ingresos">
            <table>
                <tr>
                    <th>PERCEPCIONES</th>
                    <th>IMPORTE</th>
                </tr>
                <tr>
                    <td class="papeleta-titulo">HABER BÁSICO</td>
                    <td>{{ number_format($papeleta->haberbasico,2,'.','') }}Bs.</td>
                </tr>
                <tr>
                    <td class="papeleta-titulo">BONO ANTIGÜEDAD</td>
                    <td>{{ number_format($papeleta->antiguedad,2,'.','') }} Bs.</td>
                </tr>
                <tr>
                    <td class="papeleta-titulo">SUBSIDIOS</td>
                    <td>{{ number_format($papeleta->subsidios,2,'.','') }} Bs.</td>
                </tr>
                <tr>
                    <td class="papeleta-titulo">OTROS INGRESOS</td>
                    <td>{{ number_format($papeleta->otrosingresos,2,'.','') }} Bs.</td>
                </tr>
            </table>
        </div>
        <div class="descuentos">
            <table>
                <tr>
                    <th>DEDUCCIONES</th>
                    <th>IMPORTE</th>
                </tr>
                <tr>
                    <td class="papeleta-titulo">I.V.A.</td>
                    <td>{{ number_format($papeleta->iva,2,'.','') }} Bs.</td>
                </tr>
                <tr>
                    <td class="papeleta-titulo">A.F.P.</td>
                    <td>{{ number_format($papeleta->afp,2,'.','') }} Bs.</td>
                </tr>
                @if($papeleta->descuentossindicato!=0)
                <tr>
                    <td class="papeleta-titulo">DESCUENTO SINDICATO</td>
                    <td>{{ number_format($papeleta->descuentossindicato,2,'.','') }} Bs.</td>
                </tr>
                @endif
                @if($papeleta->memomulta!=0)
                <tr>
                    <td class="papeleta-titulo">MEMO MULTAS</td>
                    <td>{{ number_format($papeleta->memomulta,2,'.','') }} Bs.</td>
                </tr>
                @endif
                @if($papeleta->retjudicial!=0)
                <tr>
                    <td class="papeleta-titulo">RET. JUDICIAL</td>
                    <td>{{ number_format($papeleta->retjudicial,2,'.','') }} Bs.</td>
                </tr>
                @endif
                <tr>
                    <td class="papeleta-titulo">OTROS DESCUENTOS</td>
                    <td>{{ number_format($papeleta->otrosdescuentos,2,'.','') }} Bs.</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="clear-fix"></div>
    <div class="total">
        <table>
            <tr>
                <td width="30%" class="papeleta-titulo">TOTAL PERCEPCIONES</td>
                <td width="20%" class="right pr-4">{{ number_format($papeleta->totalingresos,2,'.','') }} Bs.</td>
                <td width="30%" class="papeleta-titulo">TOTAL DEDUCCIONES</td>
                <td width="20%" class="right pr-2">{{ number_format($papeleta->totaldescuento,2,'.','') }} Bs.</td>
            </tr>
            <tr>
                @if($papeleta->ivaafavor!=0)
                <td class="papeleta-titulo">IVA A FAVOR CONTRIBUYENTE</td>
                <td class="right pr-4">{{ number_format($papeleta->ivaafavor,2,'.','') }} Bs.</td>
                @else
                <td class="papeleta-titulo">&nbsp;</td>
                <td class="right pr-4">&nbsp;</td>
                @endif
                <td class="papeleta-titulo">LIQUIDO PAGABLE</td>
                <td class="right pr-2">{{ number_format($papeleta->liquidopagable,2,'.','') }} Bs.</td>
            </tr>
        </table>
        <p class="total-literal">Son: {{ NumerosEnLetras::convertir($papeleta->liquidopagable,'',true) }} </p>
    </div>
    <div class="firmas">
        <table>
            <tr>
                <td width="20%" class="right papeleta-titulo">Nro. Doc.:</td>
                <td width="15%">{{ $papeleta->funcionario->carnet }}</td>
                <td width="20%" class="right papeleta-titulo">Unidad Org.:</td>
                <td width="45%">{{ $papeleta->unidad }}</td>
            </tr>
            <tr>
                <td class="right papeleta-titulo">Fecha:</td>
                <td>..................................</td>
                <td class="right papeleta-titulo">Firma:</td>
                <td>...............................................</td>
            </tr>
        </table>
    </div>
    </div>
    @if($contador % 2 === 0)
        @if($contador !== $papeletas->count())
        <div class="page-break"></div>
        @endif
    @endif
    <?php $contador++; ?>
    @endforeach
</body>
</html>