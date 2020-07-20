@extends ('layouts.admin')
@section ('contenido')
	<head>
	<title>Facturación</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->
</head>

<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Cuentas bancarias</h3>
		</div>
	</div>

	<div id=formulario>
		<div class="form-group">
			Banco: <select type="subm" class="form-control" name="banco"><option>Seleccione banco</option>></select>
			Periodo: <select type="subm" class="form-control" name="periodo"><option>Seleccione periodo</option>></select><br>
		
			<br>
			<div align="center">
			<button class="btn btn-danger">Buscar </button>
			<a href="{{URL::action('facturacionCBancarias@edit',0)}}">
				<button class="btn btn-info">Agregar cuenta</button></a>
			<button class="btn btn-info">Información de cuenta</button>
			</div>
			<br>
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
							<tr>
							<th>Banco/opción</th>
							<th>Ingresos</th>
							<th>Egresos</th>
							<th>Intereses</th>
							<th>Total</th>
							</tr>

							<tr>
							<th>Cuenta corriente</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							</tr>

							<tr>
							<th>Cuenta de ahorros</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							</tr>

							<tr>
							<th>Tarjeta de credito</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							</tr>	
							<tr>

							<th>Chequera</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							</tr>

							<tr>
							<th>CDT</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							</tr>
							
							<tr>
							<th>Total</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							</tr>
						</thead>
					</table>
				</div>
				
			</div>
			</div><br>
@stop