<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = 'sede';
    protected $primaryKey='id_sede';
    public $timestamps =false;
    
    protected $fillable=['id_sede','nombre_sede', 'ciudad', 'descripcion'];
    protected $guarded=[];
}

