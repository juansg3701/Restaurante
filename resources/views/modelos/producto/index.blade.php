
<head>
	<title>Inventario</title>
    <!--<link rel="stylesheet" href="{{ asset('css/Almacen/usuario/styles-iniciar.css') }}" />-->

</head>
<body>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Registrar Producto</h3>
		</div>
	</div>

	<section class="ftco-section img" style="background-image: url(images/bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row d-flex">
          <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
          	<div class="heading-section ftco-animate mb-5 text-center">
	          	<span class="subheading">El CaÃ±azo</span>
	            <h2 class="mb-4">Registrar Producto</h2>
	          </div>
	          {!! Form::open(array('url'=>'layouts/admin','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
	</div>
</div>

{{Form::close()}}

	{!!Form::open(array('url'=>'modelos/producto','method'=>'POST','autocomplete'=>'off' , 'files'=>'true'))!!}
    {{Form::token()}}

    
	
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
                    <label for="">CategorÃ­a</label>
					<select name="categoria_id_categoria" class="form-control">
						@foreach($categorias as $ct)
						<option value="{{$ct->id_categoria}}">{{$ct->nombre}}</option>
						@endforeach
					</select>
                  </div>
                </div>
          
              
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Precio</label>
                    <input type="number" name="precio" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">DescripciÃ³n</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">DÃ­a</label>
					<select name="dia_id_dia" class="form-control">
						@foreach($dias as $ct)
						<option value="{{$ct->id_dia}}">{{$ct->nombre}}</option>
						@endforeach
					</select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">ImÃ¡gen</label>
                    <input type="file" name="imagen" class="form-control" placeholder="">
                    
                  </div>
                </div>

      
                <div class="col-md-12 mt-3">
                  <div class="form-group text-center">
                    <input type="submit" value="Registrar Producto" class="btn btn-primary py-3 px-5">
                  </div>
                </div>
              </div>
            </form>

<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>NOMBRE</th>
							<th>PRECIO</th>
							<th>CATEGORÃA</th>
							<th>DIA</th>
							<th>DESCRIPCION</th>
							<th>IMAGEN</th>
							<th>OPCIONES</th>
						</thead>
						@foreach($productos as $ps)
						<tr>
							<td>{{ $ps->nombre}}</td>
							<td>{{ $ps->precio}}</td>
							<td>{{ $ps->categoria_id_categoria}}</td>
							<td>{{ $ps->dia_id_dia}}</td>
							<td>{{ $ps->descripcion}}</td>
							<td>
							<label>
							<img src="{{asset('imagenes/articulos/'.$ps->imagen)}}" alt="{{ $ps->nombre}}" height="100px" width="100px" class="img-thumbnail">
							<br>

							</label>
							</td>
							<td>
								{{Form::Open(array('action'=>array('ProductoController@destroy',$ps->id_producto), 'method'=>'delete'))}}
								<button class="btn btn-danger">Eliminar</button>
								{{Form::Close()}}
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
	


</body>

