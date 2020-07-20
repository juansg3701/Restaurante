<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedido';
    protected $primaryKey='id_detallep';
    public $timestamps =false;
  
    protected $fillable=['cantidad','total','descuento', 'impuesto','producto_id_producto','impuesto_id_impuesto','descuento_id_descuento','pedido_id_pedido'];
    protected $guarded=[];
}