<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\Hashidable;


class Pagos extends Model
{
    use HasFactory, Hashidable, SoftDeletes;

    protected $appends = ['hashed_id'];

    protected $primaryKey = 'idp';

    protected $fillable = [
        'idp',
        'idcp',
        'fechap',
        'foto',
        'correo',
        'monto',
        'celular',
        'referenciap',
        'aceptado',
        'observaciones'
    ];

    protected $table = 'pagos';

    public function getHashedIdAttribute($value)
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }
}
