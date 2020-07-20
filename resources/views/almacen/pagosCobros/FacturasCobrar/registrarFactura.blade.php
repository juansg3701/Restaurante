@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Facturas por cobrar</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Registrar factura</h3>
		</div>
	</div>

	<div id=formulario>
		<div class="form-group">
			Id Cliente:<input type="text" class="form-control" name="idCliente">
			Nombre: <input type="text" class="form-control" name="nombre">
			Telefono: <input type="text" class="form-control" name="telefono">
			Dirección: <input type="text" class="form-control" name="direccion">
			Correo: <input type="text" class="form-control" name="correo">
			Valor total: <input type="text" class="form-control" name="valorTotal">
			Fecha de pago: <input type="date" class="form-control" name="fechaPago">
			Cuotas totales: <input type="text" class="form-control" name="CuotasTotales">
			<br>
			<div align="center">
			<button class="btn btn-info">Añadir</button>
			<button class="btn btn-danger">Regresar</button>
		</div>
		</div>
	</div>

</body>

@stop