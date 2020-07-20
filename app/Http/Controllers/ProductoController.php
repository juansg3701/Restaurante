<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Producto;
use sisVentas\DetallePedido;
use sisVentas\Pedido;
use sisVentas\Descuento;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\ProductoFormRequest;
use DB;


class ProductoController extends Controller
{
	  public function __construct(){
			//$this->middleware('auth');	

		} 
	 		public function index(Request $request){
 		if ($request) {
 		$query=trim($request->get('searchText'));
	 		$categorias=DB::table('categoria')->get();
	 		$dias=DB::table('dia')->get();
	 		$productos=DB::table('producto as p')
	 			->join('categoria as c','p.categoria_id_categoria','=','c.id_categoria')
	 			->join('dia as d','p.dia_id_dia','=','d.id_dia')
	 			->select('p.id_producto','p.nombre','p.cantidad','p.precio','c.nombre as categoria_id_categoria','d.nombre as dia_id_dia','p.imagen','p.descripcion')
	 			->where('p.nombre','LIKE', '%'.$query.'%')
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
 			return view('productos.index',["producto"=>$producto,"numero"=>$numero,"numID"=>$numID, "categorias"=>$categorias, "productos"=>$productos, "dias"=>$dias,"categoria"=>$categoria,"pedidos"=>$pedidos,"detalle"=>$detalle,"detallep"=>$detallep,"idpedido"=>$idpedido,"clientes"=>$clientes,"idp"=>$idp,"descuentos"=>$descuentos,"impuestos"=>$impuestos, "prodLun"=>$prodLun,  "prodMar"=>$prodMar, "prodMie"=>$prodMie, "prodJue"=>$prodJue, "prodVie"=>$prodVie, "prodSab"=>$prodSab, "prodDom"=>$prodDom, "des"=>Descuento::findOrFail($i), "descuentosA"=>$descuentosA, "impuestosA"=>$impuestosA,"searchText"=>$query]);
 		}
 	}
	 


	 	public function create(){
	 		$categorias=DB::table('categoria')->get();
	 		$impuestos=DB::table('impuestos')->get();

	 		$cargoUsuario=auth()->user()->tipo_cargo_id_cargo;
	 			$modulos=DB::table('cargo_modulo')
	 			->where('id_cargo','=',$cargoUsuario)
	 			->orderBy('id_cargo', 'desc')->get();
	 			
	 		return view("almacen.inventario.producto-sede.productoCompleto.registrar",["categorias"=>$categorias,"impuestos"=>$impuestos, "modulos"=>$modulos]);
	 	}

	 	public function store(ProductoFormRequest $request){
	 		$ps = new Producto;
	 		$ps->precio=$request->get('precio');
	 		$ps->cantidad=$request->get('cantidad');
	 		$ps->nombre=$request->get('nombre');
	 		$ps->descripcion=$request->get('descripcion');
	 		$ps->dia_id_dia=$request->get('dia_id_dia');
	 		$ps->precio=$request->get('precio');
	 		if($request->hasFile('imagen')){
	 			$file=$request->file('imagen');
	 			$file->move(public_path().'/imagenes/articulos/', $file->getClientOriginalName());
	 			$ps->imagen=$file->getClientOriginalName();
	 		}
	 		$ps->categoria_id_categoria=$request->get('categoria_id_categoria');
	 		$ps->save();

	 		return back()->with('msj','Producto registrado');
	 		
	 	}

	 	public function show($id){
	 		
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
 			return view('productos.registrar',["producto"=>$producto,"numero"=>$numero,"numID"=>$numID, "categorias"=>$categorias, "productos"=>$productos, "dias"=>$dias,"categoria"=>$categoria,"pedidos"=>$pedidos,"detalle"=>$detalle,"detallep"=>$detallep,"idpedido"=>$idpedido,"clientes"=>$clientes,"idp"=>$idp,"descuentos"=>$descuentos,"impuestos"=>$impuestos, "prodLun"=>$prodLun,  "prodMar"=>$prodMar, "prodMie"=>$prodMie, "prodJue"=>$prodJue, "prodVie"=>$prodVie, "prodSab"=>$prodSab, "prodDom"=>$prodDom, "des"=>Descuento::findOrFail($i), "descuentosA"=>$descuentosA, "impuestosA"=>$impuestosA]);
 		
	 	}

	 	public function edit($id){
	 		$categorias=DB::table('categoria')->get();
	 		$impuestos=DB::table('impuestos')->get();

	 		$cargoUsuario=auth()->user()->tipo_cargo_id_cargo;
	 			$modulos=DB::table('cargo_modulo')
	 			->where('id_cargo','=',$cargoUsuario)
	 			->orderBy('id_cargo', 'desc')->get();
	 			
	 		return view("almacen.inventario.producto-sede.productoCompleto.edit",["productos"=>ProductoSede::findOrFail($id),"categorias"=>$categorias,"impuestos"=>$impuestos, "modulos"=>$modulos]);

	 	}

	 	public function update(ProductoSedeFormRequest $request, $id){
	 		$ps = ProductoSede::findOrFail($id);
	 		$ps->plu=$request->get('plu');
	 		$ps->ean=$request->get('ean');
	 		$ps->nombre=$request->get('nombre');
	 		$ps->unidad_de_medida=$request->get('unidad_de_medida');
	 		$ps->precio=$request->get('precio');
	 		$ps->impuestos_id_impuestos=$request->get('impuestos_id_impuestos');
	 		$ps->stock_minimo=$request->get('stock_minimo');
	 		$ps->categoria_id_categoria=$request->get('categoria_id_categoria');
	 		$ps->update();
	 		return Redirect::to('almacen/inventario/producto-sede/productoCompleto');
	 	}

	 	public function destroy($id){
	 		$id=$id;

	 		$dpedido=DB::table('detalle_pedido')
	 		->where('producto_id_producto','=',$id)
	 		->orderBy('id_detallep','desc')
	 		->get();

	 		if(count($dpedido)>0){
	 			foreach ($dpedido as $dp) {
	 				$dpro=DetallePedido::findOrFail($dp->id_detallep);
	 				$valorAnterior=$dpro->total;

	 				$produ=Pedido::findOrFail($dpro->pedido_id_pedido);
	 				$valorPedido=$produ->pago_total;
	 				$produ->pago_total=$valorPedido-$valorAnterior;
	 				$produ->save();

	 				$dpro->producto_id_producto=1;
	 				$dpro->total=0;
	 				$dpro->cantidad=0;
	 				$dpro->save();
	 			}
	 		}

		 		$ps=Producto::findOrFail($id);
		 		$ps->delete();
	 	
	 		return back()->with('msj','Producto eliminado');
	 	}


}