@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Proveedor</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->
</head>

<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Registros de Caja</h3>
		</div>
	</div>

	<div id=formulario>
		Fecha Inicio
		<div class="input-group">
				<input type="date" class="form-control" name="searchText" >
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary">Aceptar</button>
				</span>
		</div><br>
		Fecha Final
		<div class="input-group">
				<input type="date" class="form-control" name="searchs" >
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary">Aceptar</button>
				</span>
			</div><br>
		<div class="form-group">
			<div align="center">
		<button class="btn btn-info">Eliminar Corte</button>
		<button class="btn btn-danger">Regresar</button>
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
							<th>BASE</th>
							<th>FECHA</th>
							<th>INGRESOS EFECTIVO</th>
							<th>INGRESOS ELECTRONICOS</th>
							<th>EGRESOS EFECTIVO</th>
							<th>EGRESOS ELECTRONICOS</th>
							<th>FECHA</th>
							<th>SEDE</th>
							
						</thead>
					</table>
				</div>
			</div>
		</div><br>
@stop