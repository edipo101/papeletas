<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Papeleta extends Model
{
    /**
	 * Los atributos que son asignados masivamente.
	 *
	 * @var array
	 */
    protected $fillable = [
        'planilla_id', 'funcionario_id', 'modalidad_id', 'dias_trabajados', 'item', 'cargo', 'unidad','cuentabancaria','haberbasico','antiguedad','subsidios','otrosingresos','totalingresos','iva','afp','ivaafavor', 'memomulta', 'descuentossindicato', 'retjudicial','otrosdescuentos','totaldescuento','liquidopagable','entregado'
    ];

    /**
	 * Convertir el atributo cargo a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
    public function setCargoAttribute($value)
    {
        $this->attributes['cargo'] = mb_strtoupper($value);
    }

    /**
     * Relacion 1 a muchos con el modelo Planilla
     */
    public function planilla()
    {
        return $this->belongsTo(Planilla::class);
    }

    /**
     * Relacion 1 a muchos con el modelo Funcionario
     */
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    /**
     * Relacion 1 a muchos con el modelo Modalidad
     */
    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class);
    }

    /**
     * Darle nombre al entregado dependiendo de la letra
     *
     * 1: ENTREGADO
     * 0: NO ENTREGADO
     *
     */
    public function getFullEntregadoAttribute()
    {
        return $this->activo == 1 ? 'ENTREGADO' : 'NO ENTREGADO';
    }
}
