<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-impuesto">

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


	{!!Form::open(array('url'=>'modelos/impuestos','method'=>'POST','autocomplete'=>'off' , 'files'=>'true'))!!}
    {{Form::token()}}

	<section class="ftco-section img" style="background-image: url(images/bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row d-flex">
          <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
          	<div class="heading-section ftco-animate mb-5 text-center">
	          	<span class="subheading">El Cañazo</span>
	            <h2 class="mb-4">Registrar Impuesto</h2>
	        </div>
            <form action="#">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="">
                  </div>
                </div>          
              
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Porcentaje</label>
                    <input type="number" name="porcentaje" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for=""></label>
                    <input type="hidden" name="estado" value="0" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-12 mt-3">
                  <div class="form-group text-center">
                    <input type="submit" value="Registrar Impuesto" class="btn btn-primary py-3 px-5">
                  </div>
                </div>
              </div>
            </form>

	{{Form::Close()}}

<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>NOMBRE</th>
							<th>PORCENTAJE</th>
							<th>OPCIONES</th>
						</thead>

						@foreach($impuestos as $des)
						<tr>
							<td>{{ $des->nombre}}</td>
							<td>{{ $des->porcentaje}}</td>
							<td>
								
								@if($des->estado==0)
								{{Form::Open(array('action'=>array('EstadoImpuestoController@destroy',$des->id_impuesto), 'method'=>'delete'))}}
								<button class="btn btn-info">Activar</button>
								{{Form::Close()}}
			                    {{Form::Open(array('action'=>array('ImpuestoController@destroy',$des->id_impuesto), 'method'=>'delete'))}}
								<button class="btn btn-danger">Eliminar</button>
								{{Form::Close()}}	
			                    @endif


			                    @if($des->estado==1)
								
								<button class="btn btn-success" disabled="">Impuesto Activo</button>
			
			                    @endif

			                   
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