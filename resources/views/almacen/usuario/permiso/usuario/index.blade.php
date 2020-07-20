@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Usuario</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Permisos de Usuario</h3>
		</div>
	</div>


	<div id=formulario>
		Cargo<br>
		<select name="Cargo" class="form-control">
			<option>--Seleccione--</option>
		</select><br>

		<div class="checkbox">
			<label><input type="checkbox" id="cbox1" value="first_checkbox"> Gestión de Proveedores</label><br>
			<label><input type="checkbox" id="cbox2" value="first_checkbox"> Gestión de Clientes</label><br>
			<label><input type="checkbox" id="cbox1" value="first_checkbox"> Gestión de Caja</label><br>
			<label><input type="checkbox" id="cbox1" value="first_checkbox"> Gestión de Inventario</label><br>
			<label><input type="checkbox" id="cbox1" value="first_checkbox"> Gestión de Pedidos</label><br>
			<label><input type="checkbox" id="cbox1" value="first_checkbox"> Gestión de Facturación</label><br>
			<label><input type="checkbox" id="cbox1" value="first_checkbox"> Gestión de Pagos y Cobros Pendientes</label><br>
			<label><input type="checkbox" id="cbox1" value="first_checkbox"> Gestión de Repartos</label><br>
			<label><input type="checkbox" id="cbox1" value="first_checkbox"> Gestión de Sedes</label><br><br>
			<div align="center">
			<button class="btn btn-info">Asignar Permiso</button>
			<button class="btn btn-danger">Regresar</button>
			</div>

		</div>
	</div>

</body>

@stop