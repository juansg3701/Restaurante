@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Facturas por pagar</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Registrar factura</h3>
		</div>
	</div>

	<div id=formulario>
		<div class="form-group">
			Id:<input type="text" class="form-control" name="id">
			Descripción deuda: <input type="text" class="form-control" name="descricpion">
			Fecha: <input type="date" class="form-control" name="fecha">
			Total deuda: <input type="text" class="form-control" name="totalDeuda">
			<br>
			<div align="center">
			<button class="btn btn-info">Añadir</button>
			<button class="btn btn-danger">Regresar</button>
			</div>
		</div>
	</div>

</body>

@stop