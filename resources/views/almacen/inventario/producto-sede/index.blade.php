@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Proveedor</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->
</head>

<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Productos Completos de Sede</h3>
		</div>
	</div>


	<div id=formulario>
		<div class="form-group">
			Nombre
			<div class="input-group">
				<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary">Buscar</button>
				</span>
			</div><br>
			<div align="center">
			<a href="{{URL::action('ProductoSedeController@show',0)}}"><button class="btn btn-info">Registrar Productos</button></a>
			<button class="btn btn-info">Editar Producto</button>
			<button class="btn btn-success">Cargar xls</button>
			<button class="btn btn-success">Descargar xls</button><br><br>
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
							<th>PLU</th>
							<th>EAN</th>
							<th>CATEGORÍA</th>
							<th>UNIDAD MEDIDA</th>
							<th>PRECIO</th>
							<th>IMPUESTO</th>
							<th>STOCK MÍNIMO</th>
							<th>DISPONIBILIDAD</th>
							<th>CANTIDAD</th>
						</thead>
					</table>
				</div>
				
			</div>
			</div><br>
@stop