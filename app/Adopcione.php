<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Adopcione
 *
 * @property $id
 * @property $nombre
 * @property $rut
 * @property $domicilio
 * @property $correo
 * @property $telefono
 * @property $mascota_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Mascota $mascota
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Adopcione extends Model
{

    static $rules = [
		'nombre' => 'required',
		'rut' => 'required',
		'domicilio' => 'required',
		'correo' => 'required',
		'telefono' => 'required',
		'mascota_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','rut','domicilio','correo','telefono','mascota_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mascota()
    {
        return $this->hasOne(Mascota::class, 'id', 'mascota_id');
    }


}
