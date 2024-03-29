@extends ('layouts.admin')
@section ('contenido')
	<head>
	<title>Sede</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->
</head>

<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Información de sedes</h3>
		</div>
	</div>


	<div id=formulario>
		<div class="form-group">
			Información sede:
			<div class="input-group">
				<select type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}"><option>Seleccionar sede</option>></select>
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary">Buscar</button>
				</span>
			</div>

			Nombre: 
			<!--<div class="input-group">
				<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary">Buscar</button>
				</span>
			</div><br>-->
			@include('almacen.sede.search')
			<div align="center">
			<a href="{{URL::action('SedeController@create',0)}}">
			<button href="" class="btn btn-info">Registrar Sede</button></a>
			<!--<button class="btn btn-info">Eliminar </button>
			<button class="btn btn-info">Editar </button>-->
			</div>
			
		</div>
	</div>
</body>
@stop
@section('tabla')
<h3>Lista de Sedes</h3>
<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">

						<thead>
							<th>Id</th>
							<th>Nombre</th>
							<th>Ciudad</th>
							<th>Característica</th>
							<th>OPCIONES</th>
						</thead>
						@foreach($sedes as $sed)
						<tr>
							<td>{{ $sed->id_sede}}</td>
							<td>{{ $sed->nombre_sede}}</td>
							<td>{{ $sed->ciudad}}</td>
							<td>{{ $sed->descripcion}}</td>
							<!--<td>
								<a href="{{URL::action('SedeController@edit',$sed->id_sede)}}"><button class="btn btn-info">Editar</button></a>
								<a href="" data-target="#modal-delete-{{$sed->id_sede}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>-->
							<td>
								<a href=""><button class="btn btn-info">Editar</button></a>
								<a href=""><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						@include('almacen.sede.modal')
						@endforeach
					</table>
				</div>
				{{$sedes->render()}}
			</div>
			</div><br>
@stop