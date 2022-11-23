<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Noticia
 *
 * @property $id
 * @property $titulo
 * @property $subtitulo
 * @property $contenido
 * @property $imagen
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Noticia extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'subtitulo' => 'required',
		'contenido' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','subtitulo','contenido','imagen'];



}
