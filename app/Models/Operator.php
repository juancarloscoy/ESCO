<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = 'operators';

    protected $primaryKey = 'ID_OPERADOR';
    protected $fillable = [
        'NOMBRE'
    ];

    public $timestamps = false;

    public function order()
    {
        return $this->hasOne('App\Models\Order', 'ID_OPERADOR');
    }
}
