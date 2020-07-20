<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-no5">

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


	<section class="ftco-section img" style="background-image: url(images/bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row d-flex">
          <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
          	<div class="heading-section ftco-animate mb-5 text-center">
	          	<span class="subheading">El Cañazo</span>
	            <h2 class="mb-4">Pedidos</h2>
	          </div>
           

<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>FECHA</th>
							<th>CLIENTE</th>
							<th>TIPO DE PAGO</th>
							<th>TOTAL</th>
							<th>ESTADO</th>
							<th>DETALLE</th>
						</thead>
						@foreach($pedidos as $p)
							@if(auth()->user())
									@if($p->estado!=0 && $p->idcliente==auth()->user()->id) 
									<tr>
										<td>{{ $p->fecha}}</td>
										<td>{{ $p->cliente}}</td>
										<td>{{ $p->pago}}</td>
										<td>{{ $p->pago_total}}</td>
										<td>@if($p->estado==1)
											Entregado
											@endif
											@if($p->estado==2)
											Pendiente
											@endif
										</td>
										<td>

										@if($p->id_pedido)
                       @include('layouts.modalDPedido')
                       
		                    <a href="" data-target="#modalDP-{{$p->id_pedido}}" data-toggle="modal"><button class="btn btn-danger" >Mostrar</button></a>
		                    @endif


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