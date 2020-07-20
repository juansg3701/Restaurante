@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Usuario</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Cargos</h3>
		</div>
	</div>


	<div id=formulario>
		<div class="form-group">
			
			<h3>Registrar Nuevo Cargo</h3>
			Nombre Cargo<input type="text" class="form-control" name="nombre">
			Descripción<input type="text" class="form-control" name="descripción"><br>
			<div align="center">
				<button class="btn btn-info">Registrar Cargo</button>
				<button class="btn btn-info">Eliminar Cargo</button>
				<button class="btn btn-danger">Regresar</button>
			</div>
			
		</div>
	</div>

</body>

@stop
@section('tabla')
<h3>Lista de Cargos</h3>
			Nombre de Cargo
			<div class="input-group">
				<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary">Buscar Cargo</button>
				</span>
			</div><br>
			<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>Id</th>
							<th>Nombre del Cargo</th>
							<th>Descripción del Cargo</th>
						</thead>
					</table>
				</div>
				
			</div>
			</div><br>

@stop