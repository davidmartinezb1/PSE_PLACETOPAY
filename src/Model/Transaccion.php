<?php

namespace p2p\Model;

use \Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'transacciones';
    protected $primaryKey = 'transaccion_id';
}
