<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    /**
	 * Los atributos que son asignados masivamente.
	 *
	 * @var array
	 */
    protected $fillable = [
        'nroplanilla', 'modalidad_id', 'gestion', 'mes', 'user_id'
    ];

    /**
	 * Convertir el atributo mes a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
    public function setMesAttribute($value)
    {
        $this->attributes['mes'] = mb_strtoupper($value);
    }

    /**
     * Relacion 1 a muchos con el modelo Modalidad
     */
    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class);
    }

    /**
     * Relacion 1 a muchos con el modelo User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacion muchos a 1 con el modelo Papeleta
     */
    public function papeletas()
    {
        return $this->hasMany(Papeleta::class);
    }
}
