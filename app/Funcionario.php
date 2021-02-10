<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    /**
	 * Los atributos que son asignados masivamente.
	 *
	 * @var array
	 */
    protected $fillable = [
        'carnet', 'exp', 'nombre', 'fecha_ingreso', 'activo'
    ];

    protected $dates = ['fecha_ingreso'];

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
	 * Convertir el atributo exp a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
    public function setExpAttribute($value)
    {
        $this->attributes['exp'] = mb_strtoupper($value);
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

    public function getFullCarnetAttribute()
    {
        return "$this->carnet - $this->exp";
    }

    public function getFullNombreAttribute()
    {
        return "$this->carnet | $this->nombre";
    }

    /**
     * Relacion muchos a 1 con el modelo Papeleta
     */
    public function papeletas()
    {
        return $this->hasMany(Papeleta::class);
    }
}
