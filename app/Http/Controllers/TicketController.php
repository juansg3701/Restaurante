<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\DetallePedido;
use sisVentas\Producto;
use sisVentas\Pedido;
use sisVentas\Users;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\ProductoFormRequest;
use sisVentas\Http\Requests\DpedidoFormRequest;
use sisVentas\Http\Requests\UserFormRequest;
use DB;

class TicketController extends Controller
{
    
 	public function index(Request $request){
 	if ($request) {	
	 		$categorias=DB::table('categoria')
	 		->orderBy('id_categoria', 'desc')
	 		->paginate(10);
 			return view('modelos.categoria.index',["categorias"=>$categorias]);
 		}
 	}




 	public function edit($id){
		$id=$id;
	 	$pedido="SELECT ped.id_pedido, ped.fecha, ped.pago_total, ped.total_impuesto, ped.total_descuento, ped.estado, cli.nombre as nomCliente, cli.documento as docCliente, tp.nombre as nomTP FROM pedido as ped, cliente as cli, tipo_pago as tp, impuesto as imp, descuento as des where ped.id_pedido=$id and ped.cliente_id_cliente=cli.id_cliente and ped.tipo_pago_id_tpago=tp.id_tpago and ped.impuesto_id_impuesto=imp.id_impuesto and ped.descuento_id_descuento=des.id_descuento";

	 	$productos="SELECT dp.id_detallep, dp.cantidad, dp.total, pro.nombre as nomProd, pro.precio as preProd FROM detalle_pedido as dp, pedido as ped, producto as pro where ped.id_pedido=$id and dp.pedido_id_pedido=ped.id_pedido and dp.producto_id_producto=pro.id_producto";

	 	$impuestos="SELECT * from impuesto as imp, pedido as ped where ped.id_pedido=$id and ped.impuesto_id_impuesto=imp.id_impuesto";

	 	$descuentos="SELECT * from descuento as des, pedido as ped where ped.id_pedido=$id and ped.descuento_id_descuento=des.id_descuento";
	 	

 		return view('modelos.Tickets.index',["id"=>$id,"pedido"=>$pedido,"productos"=>$productos, "impuestos"=>$impuestos, "descuentos"=>$descuentos]);
 	}

 	
 	
	 

	 	public function show($id){
	 		return Redirect::to('/');
	 	}

	 	public function destroy($id){
	 		$ps=DetallePedido::findOrFail($id);
	 		$ps->delete();
	 		return Redirect::to('/');
	 	}

	 	 		public function store(UserFormRequest $request){

 		$contraseña=$request->get('password');
 		$nuevaC=$request->get('npassword');

 		if(password_verify($contraseña, auth()->user()->password)){
 			$id=auth()->user()->id;
	 		
	 		$users=Users::findOrFail($id);
	 		$users->password=bcrypt($nuevaC);
	 		$users->save();

 			return back()->with('msj','Nueva contraseña guardada');
 		}
 		return back()->with('errormsj','Error al validar datos');
 	}

}
