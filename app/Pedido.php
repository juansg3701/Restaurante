<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey='id_pedido';
    public $timestamps =false;
    
    protected $fillable=['fecha','pago_total',' cliente_id_cliente','tipo_pago_id_tpago','impuesto_id_impuesto','total_impuesto','total_descuento','descuento_id_descuento','estado'];
    protected $guarded=[];
}

