<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    /**
	 * Los atributos que son asignados masivamente.
	 *
	 * @var array
	 */
    protected $fillable = [
        'nombre', 'activo'
    ];

    /**
	 * Convertir el atributo nombre a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value);
    }

    /**
     * Darle nombre al estado dependiendo de la letra
     *
     * 1: ACTIVO
     * 0: INACTIVO
     *
     */
    public function getFullActivoAttribute()
    {
        return $this->activo == 1 ? 'ACTIVO' : 'INACTIVO';
    }

    /**
     * Relacion muchos a 1 con el modelo Planilla
     */
    public function planillas()
    {
        return $this->hasMany(Planilla::class);
    }

    /**
     * Relacion muchos a 1 con el modelo Papeleta
     */
    public function papeletas()
    {
        return $this->hasMany(Papeleta::class);
    }
}
