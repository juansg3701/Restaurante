<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-viernes">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">Regresar</button>
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
	            <h2 class="mb-4">Menú Viernes</h2>
	          </div>
           

	<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>Plato</th>
							<th>Descripción</th>
							<th>Precio</th>
							<th></th>
						</thead>
						@foreach($prodVie as $ps)
						
						<tr>
							<td>{{ $ps->nombre}}</td>
							<td>{{ $ps->descripcion}}</td>
							<td>{{ $ps->precio}}</td>
							<td>
								<label>
									<img src="{{asset('imagenes/articulos/'.$ps->imagen)}}" alt="{{ $ps->nombre}}" height="100px" width="100px" class="img-thumbnail"><br>
								</label>
							</td>

						</tr>
						
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
</div>