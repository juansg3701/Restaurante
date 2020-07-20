@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Pedidos</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Pedido cliente-almacen</h3>
		</div>
	</div>

	<div id=formulario>
		No.Remisión: <input type="text" class="form-control" name="noRemision">
		Fecha de solicitud:<input type="date" class="form-control" name="fechaSolicitud">
		Fecha de entrega:<input type="date" class="form-control" name="fechaEntrega">
		No. de productos:<input type="text" class="form-control" name="nProductos">
		Metodo de pago:	<select name="MetodoPago" class="form-control">	<option>--Seleccione método--</option>
		</select>
		Pago inicial:<input type="text" class="form-control" name="pagoInicial">
		Porcentaje de venta:<input type="text" class="form-control" name="porcentajeVenta">
		Id cliente:<input type="text" class="form-control" name="idCliente">
		Id empleado:<input type="text" class="form-control" name="idEmpleado">
		Pago total:<input type="text" class="form-control" name="pagoTotal">
			<br>
			<div align="center">
			<button class="btn btn-info">Registrar</button>
			<a href="{{URL::action('productoPedidoCliente@index',0)}}">
			<button class="btn btn-info">Registrar productos</button></a>
			<a href="{{URL::action('facturacionListaPedidosClientes@index',0)}}">
			<button class="btn btn-info">Ver pedidos</button></a>
		</div>
		</div>
	</div>

</body>

@stop