<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Cliente;
use sisVentas\User;
use sisVentas\Users;
use sisVentas\Descuento;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\UserFormRequest;
use DB;

class ClienteController extends Controller
{
	   	public function __construct(){
		}


	 	public function index(Request $request){
	 		if ($request) {
	 		$categorias=DB::table('categoria')->get();
	 		$dias=DB::table('dia')->get();
	 		$productos=DB::table('producto as p')
	 			->join('categoria as c','p.categoria_id_categoria','=','c.id_categoria')
	 			->join('dia as d','p.dia_id_dia','=','d.id_dia')
	 			->select('p.id_producto','p.nombre','p.cantidad','p.precio','c.nombre as categoria_id_categoria','d.nombre as dia_id_dia','p.imagen','p.descripcion')
	 			->orderBy('p.id_producto', 'desc')
	 			->paginate(10);

	 		$producto=DB::table('producto as p')
	 		->join('dia as d','p.dia_id_dia','=','d.id_dia')
	 		->select('p.id_producto as id_producto','p.nombre as nombre','p.precio as precio','p.descripcion as descripcion','d.nombre as nombreDia','p.categoria_id_categoria as categoria_id_categoria','p.imagen as imagen')
	 		->orderBy('p.id_producto', 'desc')
	 		->paginate(10);
	 		$numero=6;
	 		$numID = array();

	 		$categoria=DB::table('categoria')->get();
	 		$clientes=DB::table('cliente')->get();

	 		$pedidos=DB::table('pedido as p')
	 		->join('cliente as c','p.cliente_id_cliente','=','c.id_cliente')
	 		->join('tipo_pago as tp','p.tipo_pago_id_tpago','=','tp.id_tpago')
	 		->join('descuento as des','p.descuento_id_descuento','=','des.id_descuento')
	 		->select('p.fecha as fecha','p.pago_total as pago_total','c.nombre as cliente','tp.nombre as pago','p.id_pedido as id_pedido','p.estado as estado','p.cliente_id_cliente as idcliente', 'p.descuento_id_descuento', 'p.impuesto_id_impuesto')
	 		->orderBy('p.id_pedido', 'desc')
	 		->get();

	 		$detallep=DB::table('detalle_pedido as dp')
	 		->join('pedido as pe','dp.pedido_id_pedido','=','pe.id_pedido')
	 		->select('dp.producto_id_producto as producto','dp.cantidad as cantidad','dp.total as total','dp.descuento as descuentos','dp.impuesto as impuestos','dp.id_detallep as id','pe.pago_total as totalp')
	 		->where('id_detallep','=','')
	 		->orderBy('id_detallep', 'desc')
	 		->paginate(10);

	 		$idpedido=0;

	 		if(auth()->user()){

		 		$nopedido=DB::table('pedido')
		 		->where('cliente_id_cliente','=',auth()->user()->id)
		 		->where('estado','=',0)
		 		->orderBy('id_pedido', 'desc')
		 		->paginate(10);

		 			if(count($nopedido)>0){
		 			$detallep=DB::table('detalle_pedido as dp')
		 			->join('producto as p','dp.producto_id_producto','=','p.id_producto')
		 			->join('pedido as pe','dp.pedido_id_pedido','=','pe.id_pedido')
		 			->select('p.nombre as producto','dp.cantidad as cantidad','dp.total as total','dp.descuento as descuentos','dp.impuesto as impuestos','dp.id_detallep as id','pe.pago_total as totalp')
		 			->where('dp.pedido_id_pedido','=',$nopedido[0]->id_pedido)
		 			->orderBy('dp.id_detallep', 'desc')
		 			->paginate(10);
		 			$idpedido=$nopedido[0]->id_pedido;
		 			}

	 		}


	 		$detalle=DB::table('detalle_pedido as d')
	 		->join('pedido as pe','d.pedido_id_pedido','=','pe.id_pedido')
	 		->join('producto as pr','d.producto_id_producto','=','pr.id_producto')
	 		->select('pe.id_pedido as pedido','d.cantidad as cantidad','d.total as total','d.descuento as descuentos','d.impuesto as impuestos','pr.nombre as producto')
	 		->orderBy('pe.id_pedido', 'desc')
	 		->paginate(10);
	 		$clientes2=DB::table('cliente')->get();
	 		$descuentos=DB::table('descuento')->get();
	 		$impuestos=DB::table('impuesto')->get();


	 		$prodLun=DB::table('producto as p')
	 			->join('categoria as c','p.categoria_id_categoria','=','c.id_categoria')
	 			->join('dia as d','p.dia_id_dia','=','d.id_dia')
	 			->select('p.id_producto','p.nombre','p.cantidad','p.precio','c.nombre as categoria_id_categoria','d.nombre as dia_id_dia','p.imagen','p.descripcion')
	 			->where('dia_id_dia','=','1')
	 			->orderBy('p.id_producto', 'desc')
	 			->paginate(100);

	 		$prodMar=DB::table('producto as p')
	 			->join('categoria as c','p.categoria_id_categoria','=','c.id_categoria')
	 			->join('dia as d','p.dia_id_dia','=','d.id_dia')
	 			->select('p.id_producto','p.nombre','p.cantidad','p.precio','c.nombre as categoria_id_categoria','d.nombre as dia_id_dia','p.imagen','p.descripcion')
	 			->where('dia_id_dia','=','2')
	 			->orderBy('p.id_producto', 'desc')
	 			->paginate(100);

	 		$prodMie=DB::table('producto as p')
	 			->join('categoria as c','p.categoria_id_categoria','=','c.id_categoria')
	 			->join('dia as d','p.dia_id_dia','=','d.id_dia')
	 			->select('p.id_producto','p.nombre','p.cantidad','p.precio','c.nombre as categoria_id_categoria','d.nombre as dia_id_dia','p.imagen','p.descripcion')
	 			->where('dia_id_dia','=','3')
	 			->orderBy('p.id_producto', 'desc')
	 			->paginate(100);

	 		$prodJue=DB::table('producto as p')
	 			->join('categoria as c','p.categoria_id_categoria','=','c.id_categoria')
	 			->join('dia as d','p.dia_id_dia','=','d.id_dia')
	 			->select('p.id_producto','p.nombre','p.cantidad','p.precio','c.nombre as categoria_id_categoria','d.nombre as dia_id_dia','p.imagen','p.descripcion')
	 			->where('dia_id_dia','=','4')
	 			->orderBy('p.id_producto', 'desc')
	 			->paginate(100);

	 		$prodVie=DB::table('producto as p')
	 			->join('categoria as c','p.categoria_id_categoria','=','c.id_categoria')
	 			->join('dia as d','p.dia_id_dia','=','d.id_dia')
	 			->select('p.id_producto','p.nombre','p.cantidad','p.precio','c.nombre as categoria_id_categoria','d.nombre as dia_id_dia','p.imagen','p.descripcion')
	 			->where('dia_id_dia','=','5')
	 			->orderBy('p.id_producto', 'desc')
	 			->paginate(100);

	 		$prodSab=DB::table('producto as p')
	 			->join('categoria as c','p.categoria_id_categoria','=','c.id_categoria')
	 			->join('dia as d','p.dia_id_dia','=','d.id_dia')
	 			->select('p.id_producto','p.nombre','p.cantidad','p.precio','c.nombre as categoria_id_categoria','d.nombre as dia_id_dia','p.imagen','p.descripcion')
	 			->where('dia_id_dia','=','6')
	 			->orderBy('p.id_producto', 'desc')
	 			->paginate(100);

	 		$prodDom=DB::table('producto as p')
	 			->join('categoria as c','p.categoria_id_categoria','=','c.id_categoria')
	 			->join('dia as d','p.dia_id_dia','=','d.id_dia')
	 			->select('p.id_producto','p.nombre','p.cantidad','p.precio','c.nombre as categoria_id_categoria','d.nombre as dia_id_dia','p.imagen','p.descripcion')
	 			->where('dia_id_dia','=','7')
	 			->orderBy('p.id_producto', 'desc')
	 			->paginate(100);
	 		$descuentosA=DB::table('descuento as d')
	 		->select('d.id_descuento', 'd.nombre', 'd.porcentaje')
	 		->where('d.estado','=','1')->get();

	 		$impuestosA=DB::table('impuesto as i')
	 		->select('i.id_impuesto', 'i.nombre', 'i.porcentaje')
	 		->where('i.estado','=','1')->get();

	 		$i=3;
	 		$idp=0;
 			return view('modelos.index',["producto"=>$producto,"numero"=>$numero,"numID"=>$numID, "categorias"=>$categorias, "productos"=>$productos, "dias"=>$dias,"categoria"=>$categoria,"pedidos"=>$pedidos,"detalle"=>$detalle,"detallep"=>$detallep,"idpedido"=>$idpedido,"clientes"=>$clientes,"idp"=>$idp,"descuentos"=>$descuentos,"impuestos"=>$impuestos, "prodLun"=>$prodLun,  "prodMar"=>$prodMar, "prodMie"=>$prodMie, "prodJue"=>$prodJue, "prodVie"=>$prodVie, "prodSab"=>$prodSab, "prodDom"=>$prodDom, "des"=>Descuento::findOrFail($i), "descuentosA"=>$descuentosA, "impuestosA"=>$impuestosA]);
	 		}
	 	}
	 	public function create(){
	 			$cargoUsuario=auth()->user()->tipo_cargo_id_cargo;
	 			$modulos=DB::table('cargo_modulo')
	 			->where('id_cargo','=',$cargoUsuario)
	 			->orderBy('id_cargo', 'desc')->get();
	 			
	 			return view("almacen.cliente.registrar",["modulos"=>$modulos]);
	 		
	 	}

	 	public function store(UserFormRequest $request){
	 		$nombreC=$request->get('name');
	 		$correoC=$request->get('email');
	 		$contraseñaC=bcrypt($request->get('password'));
	 		$cargoC=$request->get('cargo');
	 		$documentoC=$request->get('documento');

	 		$clientesD=DB::table('cliente')->get();
	 		$validar1=false;
	 		$validar2=false;

	 		foreach ($clientesD as $cd) {
	 			if($correoC==$cd->correo){
	 				$validar1=true;
	 			}
	 			if($documentoC==$cd->documento){
	 				$validar2=true;
	 			}
	 		}

	 		if($validar1==false){
	 			if($validar2==false){
	 					 		$cliente = new Cliente;
				 		$cliente->nombre=$nombreC;
				 		$cliente->direccion=$request->get('direccion');
				 		$cliente->telefono=$request->get('telefono');
				 		$cliente->correo=$correoC;
				 		$cliente->documento=$documentoC;
				 		$cliente->cargo=$cargoC;
				 		$cliente->save();


				 		$user = new User;
				 		$user->id=$cliente->id_cliente;
				 		$user->name=$nombreC;
				 		$user->email=$correoC;
				 		$user->password=$contraseñaC;
				 		$user->cargo=$cargoC;

				 		$user->save();


	 				return back()->with('msj','Cliente registrado');
	 			}
	 			else{
	 				return back()->with('errormsj','Error: documento ya registrado');
	 			}
	 		}
	 		else{
	 			return back()->with('errormsj','Error: correo ya registrado');
	 		}

	 		
	 	}

	 	public function edit($id){
	 		$cargoUsuario=auth()->user()->tipo_cargo_id_cargo;
	 			$modulos=DB::table('cargo_modulo')
	 			->where('id_cargo','=',$cargoUsuario)
	 			->orderBy('id_cargo', 'desc')->get();
	 			
	 		return view("modelos.cliente.edit",["cliente"=>Cliente::findOrFail($id), "modulos"=>$modulos]);
	 	}
	 	public function show($id){
	 		return Redirect::to('/');
	 	}

	 	public function update(ClienteFormRequest $request, $id){
	 		$cliente = Cliente::findOrFail($id);
	 		$cliente->nombre=$request->get('nombre');
	 		$cliente->direccion=$request->get('direccion');
	 		$cliente->telefono=$request->get('telefono');
	 		$cliente->correo=$request->get('correo');
	 		$cliente->documento=$request->get('documento');
	 		$cliente->verificacion_nit=$request->get('verificacion_nit');
	 		$cliente->update();
	 		return Redirect::to('modelos/cliente');
	 	}

	 	public function destroy($id){
	 		$id=$id;
	 		$cliente=Cliente::findOrFail($id);
	 		$users=Users::findOrFail($id);
	 		$cliente->delete();
	 		$users->delete();
	 		

	 		return back()->with('msj','Cliente eliminado');
	 	}
	 
}
