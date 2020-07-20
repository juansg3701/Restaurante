@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Proveedor</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->
</head>

<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Productos</h3>
		</div>
	</div>

	<div align="center">
		<button class="btn btn-info">Eliminar</button>
		<button class="btn btn-danger">Regresar</button><br><br>
		
	</div>
</body>

@stop
@section('tabla')
<div class="form-group">
			<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>ID CORTE</th>
							<th>PRODUCTO</th>
							<th>CANTIDAD</th>	
						</thead>
					</table>
				</div>
			</div>
			</div><br>
			
		</div>
@stop