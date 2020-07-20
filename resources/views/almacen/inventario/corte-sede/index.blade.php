@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Usuario</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Cortes</h3>
		</div>
	</div>


	<div id=formulario>
		<div class="form-group">
			Número de Productos<input type="text" class="form-control" name="nombre">
			Fecha<input type="date" class="form-control" name="correo">
			Periodo de Tiempo<br>
			<select name="Cargo" class="form-control">
				<option>--Seleccione--</option>
			</select>	
			Valor Total<input type="text" class="form-control" name="nombre"><br>
			<div align="center">
			<button class="btn btn-info">Guardar Corte</button>
			<a href="{{URL::action('CorteSedeController@edit',0)}}"><button class="btn btn-info">Cortes Realizados</button></a>
			<a href="{{URL::action('CorteSedeController@show',0)}}"><button class="btn btn-info">Añadir Productos</button></a>
			</div>
		</div>
	</div>

</body>

@stop