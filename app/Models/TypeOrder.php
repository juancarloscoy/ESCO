<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOrder extends Model
{
    protected $table = 'type_orders';

    protected $primaryKey = 'ID_TIPO';
    protected $fillable = [
        'NOMBRE'
    ];

    public $timestamps = false;

    public function order()
    {
        return $this->hasOne('App\Models\Order', 'ID_TIPO');
    }
}
