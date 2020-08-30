<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'ID_ORDEN';
    protected $fillable = [
        'FECHA_CREACION', 'FECHA_ASIGNACION', 'FECHA_EJECUCION', 'ID_TIPO', 'ID_OPERADOR', 'RESULTADO', 'VALOR'
    ];

    public $timestamps = false;


    public function operator()
    {
        return $this->belongsTo('App\Models\Operator', 'ID_OPERADOR');
    }

    public function typeOrder()
    {
        return $this->belongsTo('App\Models\TypeOrder', 'ID_TIPO');
    }
}
