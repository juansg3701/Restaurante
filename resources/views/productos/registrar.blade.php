@extends ('layouts.admin')
@section ('contenido')
  <head>
    <meta charset="utf-8">
  </head>
<body>



  <section  data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row d-flex">
          <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
            <div class="heading-section ftco-animate mb-5 text-center">
              <span class="subheading">El Cañazo</span>
              <h2 class="mb-4">Registrar Producto</h2>
            </div>

  {!!Form::open(array('url'=>'productos','method'=>'POST','autocomplete'=>'off' , 'files'=>'true'))!!}
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
                    <label for="">Categoría</label>
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
                    <label for="">Descripción</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Día</label>
          <select name="dia_id_dia" class="form-control">
            @foreach($dias as $ct)
            <option value="{{$ct->id_dia}}">{{$ct->nombre}}</option>
            @endforeach
          </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Imagen</label>
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
{{Form::close()}}
          </div>
        </div>
      </div>
  </section>  


</body>
@stop