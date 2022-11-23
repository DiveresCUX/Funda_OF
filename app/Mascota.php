<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mascota
 *
 * @property $id
 * @property $nombre
 * @property $sexo
 * @property $especie
 * @property $raza
 * @property $descripcion
 * @property $tamanio
 * @property $foto
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mascota extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'sexo' => 'required',
		'especie' => 'required',
		'raza' => 'required',
		'descripcion' => 'required',
		'tamanio' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','sexo','especie','raza','descripcion','tamanio','foto','estado'];



}
