@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Usuario</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Registrar Caja</h3>
		</div>
	</div>


	<div id=formulario>
		Cargo<br>
		<select name="Cargo" class="form-control">
			<option>--Seleccione--</option>
		</select>
		<div class="form-group">
			Id<input type="text" class="form-control" name="id">
			Base<input type="text" class="form-control" name="base">
			Fecha<input type="date" class="form-control" name="fecha">
			Periodo de tiempo<br>
			<select name="periodo" class="form-control">
				<option>--Seleccione--</option>
			</select>
			Sede<br>
			<select name="sede" class="form-control">
				<option>--Seleccione--</option>
			</select>	

			<div class="form-group">
			Total Ingresos
			<div class="input-group">
				<input type="text" class="form-control" name="contraseña">
				<span class="input-group">
					<select name="periodo" class="form-control">
						<option>--Seleccione--</option>
					</select>
				</span>
			</div>
			Total Egresos
			<div class="input-group">
				<input type="text" class="form-control" name="contraseña">
				<span class="input-group">
					<select name="periodo" class="form-control">
						<option>--Seleccione--</option>
					</select>
				</span>
			</div><br>
			</div>
			<div align="center">
			<button class="btn btn-info">Guardar Caja</button>
			<a href="{{URL::action('CajaController@edit',0)}}"><button class="btn btn-info">Registros de Caja</button></a>
			<button class="btn btn-info">Dinero Disponible</button>
		</div>
		</div>
	</div>

</body>

@stop