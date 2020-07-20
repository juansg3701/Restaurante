@extends ('layouts.admin')
@section ('contenido')
	
<head></head>

<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Valores por Hora de Empleado</h3>
		</div>
	</div>

	<div id=formulario>
		<div class="form-group">

			Valor de Hora Ordinaria<input type="text" class="form-control" name="base">
			Valor de Hora Extraordinaria<input type="text" class="form-control" name="base">
			Valor de Hora Dominical<input type="text" class="form-control" name="base"><br>

			<div align="center">
			<button class="btn btn-info">Asignar Valores</button>
			<!--<a href="{{URL::action('ValoresNominaController@show',0)}}"><button class="btn btn-info">Registrar Empleado</button></a>-->
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
							<th>HORA ORDINARIA</th>
							<th>HORA EXTRAORDINARIA</th>
							<th>HORA DOMINICAL</th>
						</thead>
					</table>
				</div>
			</div>
		</div><br>
@stop