@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Usuario</title>
</head>


<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Cuentas</h3>
		</div>
	</div>

	

	<div id=formulario>
		<div class="form-group">

			Nombre de Cuenta
			<div class="input-group">
				<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary">Buscar</button>
				</span>
			</div><br><br>
			<div align="center">
			<button class="btn btn-info">Eliminar Cuenta</button>
			<button class="btn btn-info">Editar Cuenta</button>
			<button class="btn btn-danger">Regresar</button>
			
			<br><br>
			</div>
		</div>
	</div>
</body>

@stop
@section('tabla')
<h3>Lista de Cuentas</h3><br>
	<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>Id</th>
							<th>Nombre de Cuenta</th>
							<th>Nombre del Cargo</th>
						</thead>
					</table>
				</div>
			</div>
			</div><br>
@stop