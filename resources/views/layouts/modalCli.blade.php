<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-cliente">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                  Regresar
        </button>
        
			</div>
			
		</div>
	</div>

	{!!Form::open(array('url'=>'modelos/producto','method'=>'POST','autocomplete'=>'off' , 'files'=>'true'))!!}
    {{Form::token()}}

	<section class="ftco-section img" style="background-image: url(images/bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row d-flex">
          <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
          	<div class="heading-section ftco-animate mb-5 text-center">
	          	<span class="subheading">El Cañazo</span>
	            <h2 class="mb-4">Clientes Registrados</h2>
	          </div>
            

<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>Id</th>
							<th>Nombre</th>
							<th>Dirección</th>
							<th>Teléfono</th>
							<th>Correo</th>
							<th>No. Documento</th>
							<th>Opciones</th>
						</thead>
						@foreach($clientes as $cli)
						@if(auth()->user())
					
						@if(auth()->user()->email!=$cli->correo)
						
						<tr>
							<td>{{ $cli->id_cliente}}</td>
							<td>{{ $cli->nombre}}</td>
							<td>{{ $cli->direccion}}</td>
							<td>{{ $cli->telefono}}</td>
							<td>{{ $cli->correo}}</td>	
							<td>{{ $cli->documento}}</td>
							<td>
								{{Form::Open(array('action'=>array('ClienteController@destroy',$cli->id_cliente), 'method'=>'delete'))}}
								<button class="btn btn-danger">Eliminar</button>
								{{Form::Close()}}
							</td>

						</tr>
						@endif
							@endif
						@endforeach
					</table>
				</div>
				{{$productos->render()}}
			</div>
			</div><br>

          </div>
        </div>
			</div>
	</section>

</div>