@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Devoluciones</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Devoluciones</h3>
		</div>
	</div>


	<div id=formulario align="center">
			<br>
			<button class="btn btn-info">Devolución por un producto de valor equivalente</button>
			<br>
			<br>
			<button class="btn btn-info">Devolución por producto de mayor valor*</button>
			<br>
			*Si el producto es de mayor valor se debe registrar una nueva venta por el monto excedente
		</div>
	</div>

</body>

@stop