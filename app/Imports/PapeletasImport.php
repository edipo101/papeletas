<?php

namespace SIS\Imports;

use SIS\Papeleta;
use SIS\Planilla;
use SIS\Funcionario;
use SIS\Modalidad;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;
class PapeletasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $planilla = Planilla::where('nroplanilla',$row['planilla'])->first();
        // $funcionario = Funcionario::firstOrCreate(
        $funcionario = Funcionario::updateOrCreate(
            ['carnet' => $row['carnet']],
            ['nombre' => $row['nombre'],
            'fecha_ingreso'=> dateformato($row['fecha_ingreso'])]
            // 'fecha_ingreso'=> $row['fecha_ingreso']]
        );
        $modalidad = Modalidad::where('nombre',$row['modalidad'])->first();
        return new Papeleta([
            'planilla_id' => $planilla->id,
            'funcionario_id' => $funcionario->id,
            'modalidad_id' => $modalidad->id,
            'cargo' => $row['cargo'],
            'unidad' => $row['unidad'],
            'dias_trabajados' => $row['dias_trabajados'],
            'item' => $row['item'],
            'haberbasico' => $row['haberbasico'],
            'antiguedad' => $row['antiguedad'],
            'subsidios' => $row['subsidios'],
            'otrosingresos' => $row['otrosingresos'],
            'totalingresos' => $row['totalingresos'],
            'iva' => $row['iva'],
            'afp' => $row['afp'],
            'memomulta' => $row['memomulta'],
            'descuentossindicato' => $row['descuentossindicato'],
            'retjudicial' => $row['retjudicial'],
            'otrosdescuentos' => $row['otrosdescuentos'],
            'totaldescuento' => $row['totaldescuento'],
            'liquidopagable' => $row['liquidopagable'],
            // 'cuentabancaria' => $row['cuentabancaria'],
            'ivaafavor' => $row['ivaafavor'],
        ]);
    }
}
