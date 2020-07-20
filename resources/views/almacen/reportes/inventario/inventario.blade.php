@extends ('layouts.admin')
@section ('contenido')
	<head>
	<title>Reportes</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->
</head>

<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Inventario</h3>
		</div>
	</div>


	<div id=formulario>
		<div class="form-group">
			Fecha inicio: <input type="date" class="form-control" name="fechaInicio">
			Fecha final: <input type="date" class="form-control" name="fechaFinal"><br>
			<div align="center">
			<button class="btn btn-danger">Buscar </button>
			<button class="btn btn-info">Descargar xls </button>
			<button class="btn btn-info">Gráfica</button><br>
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
							<th>Periodo de tiempo</th>
							<th>Fecha</th>
							<th>No.Productos</th>
							<th>Total</th>
						</thead>
					</table>
				</div>
				
			</div>
			</div><br>
			
@stop