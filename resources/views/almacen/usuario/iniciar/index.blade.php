@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Usuario</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<font size=3 face="Verdana">INICIAR SESIÓN</font>
		</div>
	</div><br>

	<div id=formulario>
		<div class="form-group">
			Correo<input type="text" class="form-control" name="correo">
			Contraseña
			<div class="input-group">
				<input type="text" class="form-control" name="contraseña">
				<span class="input-group-btn">
					<button class="btn btn-primary">Cambiar contraseña</button>
				</span>
			</div><br>
				<div align="center">
					<a href="{{URL::action('IniciarController@edit',0)}}"><button class="btn btn-info">	Iniciar Sesión</button></a>
					<button class="btn btn-danger">Salir</button> 
				</div>
			
		</div>
	</div>

</body>

@stop
