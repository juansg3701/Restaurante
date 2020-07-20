<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-no1">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header" align="center">
				<h4 class="modal-title">Carrito</h4>
				<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                <span aria-hidden="true">×</span>
	            </button>
			</div>


			<div align="center">

			@foreach($descuentosA as $des)
			@if($des->porcentaje!=0)
				<option value="{{$des->id_descuento}}">*Este pedido tiene un descuento del {{$des->porcentaje}}%</option>
			@endif
			@endforeach

			@foreach($impuestosA as $imp)
			@if($imp->porcentaje!=0)
				<option value="{{$imp->id_impuesto}}">*Este pedido tiene un impuesto del {{$imp->porcentaje}}%</option>
			@endif
			@endforeach
			
			

			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-condensed table-hover">

								<thead>
									<th>Plato</th>
									<th>Cant.</th>
									<th>Total</th>
									<th>descuento(%)</th>
									<th>impuesto(%)</th>
									<th>Opción</th>
								</thead>
								<?php $total=0;?>
								@foreach($detallep as $dp)
								<tr>
									<td>{{ $dp->producto}}</td>
									<td>{{ $dp->cantidad}}</td>
									<td>{{ $dp->total}}</td>
									<td>{{ $dp->descuentos}}</td>
									<td>{{ $dp->impuestos}}</td>
									<td>
										{{Form::Open(array('action'=>array('PedidoController@destroy',$dp->id), 'method'=>'delete'))}}
										<button class="btn btn-info">Eliminar</button>
										{{Form::Close()}}</td>
								</tr>
								<?php $total=$dp->totalp;?>
								
								@endforeach
				

							</table>

						</div>
						
							Pago total: <?php echo $total;?>
							<br><hr>
							Tipo de pago
							<select name="producto_id_producto" class="form-control">
							<option value="">Contraentrega</option>
							<option value="">PayU</option>
						
							</select>	

					</div>
					<br>
			</div>
			<div>
				<br>
			</div>
			<div class="col-md-12" >
				<div class="container" align="center">
				 <div class="row">

				 	<div class="col-md-6">
				 		@if($idpedido!=0 && $total>0)
				 		<a href="{{URL::action('menuController@edit',$idpedido)}}"><button class="btn btn-primary">Solicitar pedido</button></a>
				 		@else
				 		Carrito vacío
				 		@endif

				 		
				 	</div>
				 	<div class="col-md-6">
						{{Form::Open(array('action'=>array('menuController@destroy',$idpedido), 'method'=>'delete'))}}
						<button class="btn btn-info">Cancelar pedido</button>
						{{Form::Close()}}
				 	</div>		
			 		</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>