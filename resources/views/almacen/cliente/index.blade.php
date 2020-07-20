@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Proveedor</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->
</head>

<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Clientes</h3>
		</div>
	</div>

	<div id=formulario>
		<div class="form-group">
			Nombre/Cédula
			<div class="input-group">
				<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary">Buscar</button>
				</span>
			</div><br>
			<div align="center">

			<button class="btn btn-info">Eliminar Cliente</button>
			<a href="{{URL::action('ClienteController@edit',0)}}"><button class="btn btn-info">Registrar Cliente</button></a>
			<button class="btn btn-info">Editar Cliente</button><br><br>
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
							<th>Id</th>
							<th>Nombre</th>
							<th>Dirección</th>
							<th>Correo</th>
							<th>Teléfono</th>
							<th>No. Documento</th>
							<th>Dígito de identificación NIT</th>
							<th>Cartera Activa</th>
						</thead>
					</table>
				</div>
				
			</div>
			</div><br>
@stop