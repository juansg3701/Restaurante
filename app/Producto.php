<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey='id_producto';
    public $timestamps =false;
    
    protected $fillable=['nombre','cantidad','precio','descripcion','dia_id_dia','categoria_id_categoria','imagen'];
    protected $guarded=[];
}

