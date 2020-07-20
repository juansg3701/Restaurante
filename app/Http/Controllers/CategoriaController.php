<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Categoria;
use sisVentas\DetallePedido;
use sisVentas\Pedido;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    
 	public function index(Request $request){
 		if ($request) {
	 			
	 		$categorias=DB::table('categoria')
	 		->orderBy('id_categoria', 'desc')
	 		->paginate(10);

 			return view('modelos.categoria.index',["categorias"=>$categorias]);
 		}
 	}

 	public function store(CategoriaFormRequest $request){
	 		$cat = new Categoria;
	 		$cat->nombre=$request->get('nombre');
	 		$cat->save();
	 		return Redirect::to('/');
	 	}

	 	public function destroy($id){

	 		$id=$id;

		 	$detalle=DB::table('detalle_pedido')
	 		->where('pedido_id_pedido','=',$id)
	 		->orderBy('id_detallep', 'desc')
	 		->paginate(10);

	 		foreach ($detalle as $d) {
	 		$ps=DetallePedido::findOrFail($d->id_detallep);
	 		$ps->delete();
	 		}

	 		$ped=Pedido::findOrFail($id);
		 	$ped->delete();

	 		return back()->with('msj','Pedido eliminado');
	 	}
}
