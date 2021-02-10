<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de papeletas de la planilla</title>
    <link rel="stylesheet" href="{!! public_path('css/planilla.css') !!}">
</head>
<body>
    <header class="header">
        <div class="logo-gams">
            <img src="{!! public_path('img/empresa/'.$empresa->logo)  !!}" alt="{{ $empresa->sigla }}" class="img-logo">
        </div>
        <h1 class="titulo">{{ $empresa->nombre }}</h1>
        <h2 class="subtitulo">Listado de papeletas</h2>
        {{-- <div class="logo-gestion">
            <img src="{!! public_path('img/empresa/gams-gestion.png')  !!}" alt="{{ $empresa->sigla }}" class="img-logo">
        </div> --}}
    </header>
    <div class="info">
        <table>
            <tr>
                <td width="30%" class="info-title">Planilla Nro:</td>
                <td width="30%">{{ $planilla->nroplanilla }}</td>
                <td width="20%" class="info-title">Modalidad:</td>
                <td width="20%">{{ $planilla->modalidad->nombre }}</td>
            </tr>
            <tr>
                <td class="info-title">Correspondiente al mes:</td>
                <td>{{ $planilla->mes }} DE {{ $planilla->gestion }}</td>
                <td class="info-title">Cantidad Papeletas:</td>
                <td>{{ $planilla->papeletas->count() }}</td>
            </tr>
        </table>
    </div>
    <div class="detalle">
        <table>
            {{-- <thead> --}}
                <tr>
                    <th width="20px">#</th>
                    @if($planilla->modalidad_id===1)
                    <th width="10%">ITEM</th>
                    @endif
                    <th>NOMBRE COMPLETO</th>
                    <th class="center" width="15%">FECHA ENTREGA</th>
                    <th>FIRMA</th>
                </tr>
            {{-- </thead> --}}
            <?php $contador = 1;?>
            <tbody>
                @foreach ($papeletas as $papeleta)
                <tr>
                    <td>{{ $contador++ }}</td>
                    @if($planilla->modalidad_id===1)
                    <td class="center">{{ $papeleta->item}}</td>
                    @endif
                    <td>{{ $papeleta->nombre }}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>