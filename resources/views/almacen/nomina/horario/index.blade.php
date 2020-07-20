@extends ('layouts.admin')
@section ('contenido')
	
<head></head>

<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Horario de Empleado</h3>
		</div>
	</div>

	<div id=formulario><br>
		<div class="form-group">
			Id del empleado<input type="text" class="form-control" name="id">
			Nombre del empleado<input type="text" class="form-control" name="nombre">
			Fecha<input type="date" class="form-control" name="fecha">
			Hora de entrada<input type="time" class="form-control" name=hora_entrada>
			Hora de salida<input type="time" class="form-control" name="hora_salida">
			Sede<br>
			<select name="sede" class="form-control">
				<option>--Seleccione--</option>
			</select><br>
			Seleccione Jornada<br>
			<div align="center">
			<input type="checkbox" id="cbox1" value="first_checkbox"> Ordinaria &nbsp&nbsp&nbsp
			<input type="checkbox" id="cbox2" value="first_checkbox"> Extraordinaria  &nbsp&nbsp&nbsp
			<input type="checkbox" id="cbox1" value="first_checkbox"> Dominical<br>
			</div><br>

			<div align="center">
			<button class="btn btn-info">Guardar Registro</button>
			<a href="{{URL::action('HorarioNominaController@show',0)}}"><button class="btn btn-info">Registrar Empleado</button></a>
			</div>
		</div>
	</div>

</body>

@stop

@section('tabla')
<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>ID</th>
							<th>NOMBRE</th>
							<th>FECHA</th>
							<th>HORA ENTRADA</th>
							<th>HORA SALIDA</th>
							<th>JORNADA</th>
						</thead>
					</table>
				</div>
			</div>
		</div><br>
@stop