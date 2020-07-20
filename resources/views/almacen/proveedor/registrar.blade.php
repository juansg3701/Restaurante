@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Usuario</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Registrar Proveedor</h3>
		</div>
	</div>


	<div id=formulario>
		<div class="form-group">
			Nombre Empresa<input type="text" class="form-control" name="nombre">
			Contacto Empresa<input type="text" class="form-control" name="nombre">
			Dirección<input type="text" class="form-control" name="correo">
			Dígito de verificación NIT<input type="text" class="form-control" name="nombre">
			Correo<input type="text" class="form-control" name="nombre">
			Teléfono<input type="text" class="form-control" name="nombre">
			Documento<br>
			<select name="Cargo" class="form-control">
				<option>--Seleccione--</option>
			</select>	
			Número de documento<input type="text" class="form-control" name="nombre"><br>
			<div align="center">
			<button class="btn btn-info">Registrar Proveedor</button>
			<button class="btn btn-danger">Regresar</button>
			</div>
		</div>
	</div>

</body>

@stop