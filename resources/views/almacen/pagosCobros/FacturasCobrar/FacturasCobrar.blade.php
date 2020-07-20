@extends ('layouts.admin')
@section ('contenido')
	<head>
	<title>Pagos y cobros</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->
</head>

<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Facturas por cobrar</h3>
		</div>
	</div>


	<div id=formulario>
		<div class="form-group">
			Nombre:
			<div class="input-group">
				<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary">Buscar</button>
				</span>
			</div>
			<br>
			<div align="center">
			<a href="{{URL::action('facturasCobrar@edit',0)}}">
			<button class="btn btn-info">Añadir</button></a>
			<button class="btn btn-info">Eliminar</button>
			<button class="btn btn-info">Editar</button><br>
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
							<th>Id Cliente</th>
							<th>Nombre</th>
							<th>Telefono</th>
							<th>Direccion</th>
							<th>Correo</th>
							<th>Valor abono</th>
							<th>Valor pendiente</th>
							<th>Valor total</th>
							<th>Retraso de pago</th>
						</thead>
					</table>
				</div>
				
			</div>
			</div><br>
@stop