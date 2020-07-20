<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Descuento;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\DescuentoFormRequest;
use DB;


class DescuentoController extends Controller
{
	  public function __construct(){
			//$this->middleware('auth');	

		} 
	 	public function index(Request $request){
	 		if ($request) {
	 			$categorias=DB::table('categoria')->get();
	 			$dias=DB::table('dia')->get();
	 			$descuentos=DB::table('descuento')->get();
	 			$productos=DB::table('producto as p')
	 			->join('categoria as c','p.categoria_id_categoria','=','c.id_categoria')
	 			->join('dia as d','p.dia_id_dia','=','d.id_dia')
	 			->select('p.id_producto','p.nombre','p.cantidad','p.precio','c.nombre as categoria_id_categoria','d.nombre as dia_id_dia','p.imagen','p.descripcion')
	 			->orderBy('p.id_producto', 'desc')
	 			->paginate(10);
	 			$producto=DB::table('producto')
	 		->orderBy('id_producto', 'desc')
	 		->paginate(10);
	 		$numero=6;
	 		$numID = array();

	 			return view('layouts.modalP',["productos"=>$productos, "categorias"=>$categorias,"producto"=>$producto,"numero"=>$numero,"numID"=>$numID,"dias"=>$dias,"descuentos"=>$descuentos]);
	 		}
	 	}



	 	public function store(DescuentoFormRequest $request){
	 		$des = new Descuento;
	 		$des->nombre=$request->get('nombre');
	 		$des->porcentaje=$request->get('porcentaje');
	 		$des->estado=0;
	 		$des->save();

	 		return back()->with('msj','Descuento registrado');
	 	}




	 	public function destroy($id){
	 		$des=Descuento::findOrFail($id);
	 		$des->delete();
	 		return back()->with('msj','Descuento eliminado');
	 	}


}