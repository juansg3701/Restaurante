<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Descuento;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\DescuentoFormRequest;
use DB;


class EstadoDescuentoController extends Controller
{
	public function __construct(){
			//$this->middleware('auth');	
	} 
	 	

 	public function destroy($id){
 		$descuento=DB::table('descuento')->get();
	 	$ide=0;
	 	foreach ($descuento as $d){
		 	if($d->estado==1){
		 		$ide=$d->id_descuento;
		 		$des=Descuento::findOrFail($ide);
		 		$des->estado=0;
		 		$des->update();
		 	}	
		}
		$des2=Descuento::findOrFail($id);
 		$des2->estado=1;
 		$des2->update();

 		return back()->with('msj','Nuevo descuento activado');
 	}


}