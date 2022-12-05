<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formulario extends Model
{
    use HasFactory, Hashidable, SoftDeletes;

    protected $appends = ['hashed_id'];

    protected $primaryKey = 'idf';

    protected $fillable = [
        'idf',
        'status',
        'nombre',
        'sexo',
        'matricula',
        'edad',
        'curp',
        'rfc',
        'correo',
        'nacimiento',
        'tel_celular',
        'tel_domicilio',
        'institucion',
        
        'area',
        'pro_general',
        'año_ingreso',
        'año_egreso',
        'beca',
        
        'estado_civil',
        'hijos',
        'vive_con',

        'calle',
        'num_exterior',
        'num_interior',
        'colonia',
        'codigo_postal',
        'estado',
        'municipio',
        'localidad',

        'pais_naci',
        'estado_naci',
        'municipio_naci',
        'grupo_etnico',
        'lengua',

        'sangre',
        'enfermedades',
        'discapacidades',
        'alergias',
        'seguro_social',
        'num_clinica',
        'afiliado_clinica',
        'servicio_medico',

        'modo_trabajo',
        'nombre_empresa',
        'contacto_empresa',
        'correo_empresa',
        'horario',
        'direccion',

        'nombre_tutor',
        'calle_tutor',
        'n_exterior_tutor',
        'n_interior_tutor',
        'colonia_tutor',
        'c_postal_tutor',
        'estado_tutor',
        'municipio_tutor',
        'localidad_tutor',

        'medio',
        'op_1',
        'op_2',
        
    ];

    /*protected $attributes = [
        'activo' => 1
    ]; cuando des de alta, mandame 1*/ 

    protected $table = 'formulario';

    public function getHashedIdAttribute($value)
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }
}