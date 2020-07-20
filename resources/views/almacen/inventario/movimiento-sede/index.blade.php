@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Usuario</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Movimiento Entre Sedes</h3>
		</div>
	</div>


	<div id=formulario>
		<div class="form-group">
			Id<input type="text" class="form-control" name="nombre">
			Sede Actual<input type="text" class="form-control" name="correo">
			Sede Salida<br>
			<select name="Cargo" class="form-control">
				<option>--Seleccione--</option>
			</select>	
			Fecha<input type="date" class="form-control" name="nombre"><br>
			<div align="center">
			<button class="btn btn-info">Realizar Movimiento</button>
			
			<a href="{{URL::action('MovimientoSedeController@show',0)}}"><button class="btn btn-info">Movimientos Realizados</button></a>
			<a href="{{URL::action('MovimientoSedeController@edit',0)}}"><button class="btn btn-info">Movimientos Pendientes</button></a>
			</div>
		</div>
	</div>

</body>

@stop