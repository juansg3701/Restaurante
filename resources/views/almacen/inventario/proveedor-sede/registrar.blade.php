@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Usuario</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Registro de Productos De Proveedor</h3>
		</div>
	</div>

	<div id=formulario>
		<div class="form-group">
			Id<input type="text" class="form-control" name="nombre">
			Nombre<input type="text" class="form-control" name="nombre">
			PLU<input type="text" class="form-control" name="nombre">
			EAN<input type="text" class="form-control" name="correo">
			Sede<br>
			<select name="Cargo" class="form-control">
				<option>--Seleccione--</option>
			</select>	
			Cantidad<input type="text" class="form-control" name="nombre">
			<br>
			<div align="center">
			<button class="btn btn-info">Registrar Producto</button>
			<button class="btn btn-danger">Regresar</button>
		</div>
		</div>
	</div>

</body>

@stop