@extends ('layouts.admin')
@section ('contenido')
	<head>
	<title>Facturación</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->
</head>

<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de ventas</h3>
		</div>
	</div>


	<div id=formulario>
		<div class="form-group">
			Fecha inicio: <input type="date" class="form-control" name="fechaInicio">
			Fecha final: <input type="date" class="form-control" name="fechaFinal">
			<br>
			<div align="center">
			<button class="btn btn-danger">Buscar </button>
			<button class="btn btn-info">Eliminar</button>
			<a href="{{URL::action('facturacionListaVentas@edit',0)}}">
			<button class="btn btn-info">Nueva venta</button></a>
			<button class="btn btn-info">Editar venta</button>
			<button class="btn btn-info">Generar Factura</button>
			<button class="btn btn-info">Generar ticket</button>
			</div>
			<br>
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
							<th>id</th>
							<th>Fecha</th>
							<th>Metodo de pago</th>
							<th>No.Productos</th>
							<th>Id cliente</th>
							<th>Id empleado</th>
							<th>Pago total</th>
						</thead>
					</table>
				</div>
				
			</div>
			</div><br>
			
@stop