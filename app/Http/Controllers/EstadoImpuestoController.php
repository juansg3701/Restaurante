<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Impuesto;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\ImpuestoFormRequest;
use DB;


class EstadoImpuestoController extends Controller
{
	public function __construct(){
			//$this->middleware('auth');	
	} 
	 	

 	public function destroy($id){
 		$impuesto=DB::table('impuesto')->get();
	 	$ide=0;
	 	foreach ($impuesto as $d){
		 	if($d->estado==1){
		 		$ide=$d->id_impuesto;
		 		$des=Impuesto::findOrFail($ide);
		 		$des->estado=0;
		 		$des->update();
		 	}	
		}
		$des2=Impuesto::findOrFail($id);
 		$des2->estado=1;
 		$des2->update();
 		return back()->with('msj','Nuevo impuesto activado');
 	}


}