@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Usuario</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Registrar usuario</h3>
		</div>
	</div>


	<div id=formulario>
		Cargo<br>
		<select name="Cargo" class="form-control">
			<option>--Seleccione--</option>
		</select>
		<div class="form-group">
			Nombre<input type="text" class="form-control" name="nombre">
		
			Sede<br>
			<select name="Cargo" class="form-control">
				<option>--Seleccione--</option>
			</select><br>
			<div align="center">
				<a href=""><button class="btn btn-info">Registrar</button></a>
				<button class="btn btn-danger">Regresar</button>
			</div>
			
			
		</div>
	</div>

</body>

@stop