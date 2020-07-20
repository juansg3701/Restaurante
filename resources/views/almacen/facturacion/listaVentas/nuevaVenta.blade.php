@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Facturación</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Nueva venta</h3>
		</div>
	</div>

	<div id=formulario>
		<div class="form-group">
			Id:<input type="text" class="form-control" name="id">
			Fecha: <input type="date" class="form-control" name="fecha">
			Metodo de pago: <input type="date" class="form-control" name="metodoPago">
			No.Productos: <input type="text" class="form-control" name="NoProductos">
			Id Cliente: <input type="text" class="form-control" name="idCliente">
			Id Empleado: <input type="text" class="form-control" name="idEmpleado">
			Pago total: <input type="text" class="form-control" name="pagoTotal">
			<br>
			<div align="center">
			<button class="btn btn-info">Registrar</button>
			<a href="{{URL::action('productoVentas@index',0)}}">
			<button class="btn btn-info">Productos</button></a>
			<a href="{{URL::action('ClienteController@edit',0)}}">
			<button class="btn btn-info">Añadir cliente nuevo</button></a>
			<button class="btn btn-info">Regresar</button>
			</div>
		</div>
	</div>

</body>

@stop