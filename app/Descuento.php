<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table = 'descuento';
    protected $primaryKey='id_descuento';
    public $timestamps =false;
    
    protected $fillable=['nombre', 'porcentaje', 'estado'];
    protected $guarded=[];
}
