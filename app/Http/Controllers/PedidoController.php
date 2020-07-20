<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\DetallePedido;
use sisVentas\Producto;
use sisVentas\Pedido;
use sisVentas\Descuento;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\ProductoFormRequest;
use sisVentas\Http\Requests\DpedidoFormRequest;
use DB;

class PedidoController extends Controller
{

    
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
 			return view('pedidos.index',["producto"=>$producto,"numero"=>$numero,"numID"=>$numID, "categorias"=>$categorias, "productos"=>$productos, "dias"=>$dias,"categoria"=>$categoria,"pedidos"=>$pedidos,"detalle"=>$detalle,"detallep"=>$detallep,"idpedido"=>$idpedido,"clientes"=>$clientes,"idp"=>$idp,"descuentos"=>$descuentos,"impuestos"=>$impuestos, "prodLun"=>$prodLun,  "prodMar"=>$prodMar, "prodMie"=>$prodMie, "prodJue"=>$prodJue, "prodVie"=>$prodVie, "prodSab"=>$prodSab, "prodDom"=>$prodDom, "des"=>Descuento::findOrFail($i), "descuentosA"=>$descuentosA, "impuestosA"=>$impuestosA,"searchText"=>$query]);
 		}
 	}

	 	public function store(DpedidoFormRequest $request){
	 		$idcliente=$request->get('cliente');
	 		$productoid=$request->get('producto_id_producto');
	 		$cantidadp=$request->get('cantidad');
	 		$desc=$request->get('descuento_id_descuento');
	 		$impu=$request->get('impuesto_id_impuesto');

	 		$agregar=false;

	 		$pr=Producto::findOrFail($productoid);
	 		$valorUnitario=$pr->precio;
	 		$valorTotal=($valorUnitario*$cantidadp);

	 		
	 		$valorDescuento=DB::table('descuento')
	 		->select('porcentaje')
	 		->where('id_descuento','=',$desc)
	 		->get();

	 		$porcentajeD=0;
	 		foreach ($valorDescuento as $vd) {
	 			$porcentajeD=($vd->porcentaje*$valorTotal)/100;	
	 		}

	 		$porD=0;
	 		foreach ($valorDescuento as $vd) {
	 			$porD=$vd->porcentaje;	
	 		}

	 		$valorImpuesto=DB::table('impuesto')
	 		->select('porcentaje')
	 		->where('id_impuesto','=',$impu)
	 		->get();

	 		$porcentajeI=0;
	 		foreach ($valorImpuesto as $vi) {
	 			$porcentajeI=($vi->porcentaje*$valorTotal)/100;	
	 		}

	 		$porI=0;
	 		foreach ($valorImpuesto as $vi) {
	 			$porI=$vi->porcentaje;	
	 		}

	 		$pedidos=DB::table('pedido')
	 		->where('cliente_id_cliente','=',$idcliente)
	 		->orderBy('id_pedido', 'desc')
	 		->paginate(10);

	 		$condicion=false;
	 		$nopedido=0;
	 		foreach ($pedidos as $p) {
			 		if($p->estado==0){
			 			$condicion=true;
			 			$nopedido=$p->id_pedido;
			 		}	
	 		}
	 		$valorfinal=$valorTotal-$porcentajeD+$porcentajeI;
	 		if($condicion==false && $nopedido==0){
	 			$ped = new Pedido;
	 			$ped->fecha=date("Y/m/d");
	 			$ped->pago_total=$valorfinal;
	 			$ped->cliente_id_cliente=$idcliente;
	 			$ped->tipo_pago_id_tpago=1;
	 			$ped->estado=0;
	 			$ped->descuento_id_descuento=$desc;
	 			$ped->impuesto_id_impuesto=$impu;
	 			$ped->total_descuento=$porcentajeD;
	 			$ped->total_impuesto=$porcentajeI;
	 			$ped->save();
	 			$agregar=true;

	 		$dp = new DetallePedido;
	 		$dp->cantidad=$cantidadp;
	 		$dp->producto_id_producto=$productoid;
	 		$dp->total=$valorfinal;

	 		$dp->descuento=$porD;
	 		$dp->impuesto=$porI;

	 		$dp->pedido_id_pedido=$ped->id_pedido;	
	 		$dp->save();
	 		$agregar=true;

	 		}

	 		else{
	 		$dp = new DetallePedido;
	 		$dp->cantidad=$cantidadp;
	 		$dp->producto_id_producto=$productoid;
	 		$dp->total=$valorfinal;
	 		
	 		$dp->descuento=$porD;
	 		$dp->impuesto=$porI;

	 		$dp->pedido_id_pedido=$nopedido;
	 		
	 		$dp->save();


	 		$p=Pedido::findOrFail($nopedido);
	 		$valorActual=$p->pago_total;
	 		$p->pago_total=($valorActual+$valorTotal)-$porcentajeD+$porcentajeI;
	 		$p->descuento_id_descuento=$desc;
	 		$p->impuesto_id_impuesto=$impu;
	 		$p->total_descuento=$porcentajeD;
	 		$p->total_impuesto=$porcentajeI;
	 		$p->save();
	 		$agregar=true;
	 		
	 		}

	 		
	 		$producto1=0;
	 		if($agregar){
	 			return back()->with('msj','Producto añadido al carrito');
	 		}
	 		else{
	 			return back()->with('errormsj','¡Error al guardar!');
	 		}
	 		
 			

	 	}

	 	public function show($id){
	 		return Redirect::to('/');
	 	}

	 	public function destroy($id){
	 		$valorT=0;
	 		$pedido=0;
	 		$ps=DetallePedido::findOrFail($id);
	 		$valorT=$ps->total;
	 		$pedido=$ps->pedido_id_pedido;
	 		$ps->delete();

	 		$ped=Pedido::findOrFail($pedido);
		 	$TotalP=$ped->pago_total;
		 	$ped->pago_total=$TotalP-$valorT;
		 	$ped->save();

		 	return back()->with('msj','Producto eliminado del carrito');
	 	}

	 	public function edit($id){
	 		$p=Pedido::findOrFail($id);
	 		$p->estado=1;
	 		$p->save();

	 		return back()->with('msj','Pedido entregado');
	 	}

}
