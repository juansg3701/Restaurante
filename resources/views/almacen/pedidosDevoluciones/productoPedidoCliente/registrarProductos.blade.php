@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Pedidos</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Productos pedido cliente</h3>
		</div>
	</div>


	<div id=formulario>
		Producto: <select name="producto" class="form-control">
				<option>Seleccione producto</option>
			</select>	
		Cantidad:<input type="text" class="form-control" name="cantidad">
		Precio unitario:<input type="text" class="form-control" name="precioUnitario">
		Impuesto:<input type="text" class="form-control" name="impuesto">
		Descuento:<input type="text" class="form-control" name="descuento">
		Total:<input type="text" class="form-control" name="total">
			<br>
			<div align="center">
			<button class="btn btn-info">Registrar</button>
			<button class="btn btn-info">Regresar</button>
		</div>
		</div>
	</div>

</body>

@stop