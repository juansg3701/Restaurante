@extends ('layouts.admin')
@section ('contenido')
	
<head>
	<title>Sede</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Editar Datos Sede: {{$sede->nombre_sede}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

	{!!Form::model($sede,['method'=>'PATCH','route'=>['almacen.sede.update',$sede->id_sede]])!!}
    {{Form::token()}}

	<div id=formulario>
		Id: <input type="text" class="form-control" value="{{$sede->id_sede}}" name="id_sede">
		Nombre:<input type="text" class="form-control" value="{{$sede->nombre_sede}}" name="nombre_sede">
		Ciudad:<input type="text" class="form-control" value="{{$sede->ciudad}}" name="ciudad">
		Característica:<input type="text" class="form-control" value="{{$sede->descripcion}}" name="descripcion">
			<br>
			<button class="btn btn-info" type="submit">Registrar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
	</div>
	
{!!Form::close()!!}		
</body>

@stop