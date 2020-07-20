@extends ('layouts.admin')
@section ('contenido')
	<head>
	<title>Pagos y cobros</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->
</head>

<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Facturas por pagar</h3>
		</div>
	</div>


	<div id=formulario>
		<div class="form-group">
			Fecha inicio: <input type="date" class="form-control" name="fechaInicio">
			Fecha final: <input type="date" class="form-control" name="fechaFinal"><br>
			<div align="center">
			<button class="btn btn-danger">Buscar </button>
			<a href="{{URL::action('FacturasPagarController@show',0)}}">
			<button href="" class="btn btn-info">Añadir </button></a>
			<button class="btn btn-info">Relizar abono</button>
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
							<th>Id</th>
							<th>Descripción deuda</th>
							<th>Fecha a pagar</th>
							<th>Valor abono</th>
							<th>Total deuda</th>
						</thead>
					</table>
				</div>
				
			</div>
			</div><br>
			
@stop