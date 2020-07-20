<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Diseño restaurante</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
    $diasp = array("domingo","lunes","martes","miércoles","jueves","viernes","sábado");
    $nombreDia=$diasp[date("w")];
    $dia = utf8_decode($nombreDia);
    
    ?>

  </head>
  <body>

    <div class="py-1 bg-black top">
      <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
          <div class="col-lg-12 d-block">
            <div class="row d-flex">
              <div class="col-md pr-4 d-flex topper align-items-center">
                @if(auth()->user())
                <span class="text">Bienvenido: {{ Auth::user()->name }}</span>
            @endif
              </div>
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                <span class="text">Dirección: Carrera 12-7 Sur</span>
              </div>
              <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
                <p class="mb-0 register-link"><span>Hora de apertura:</span> <span>Lunes - Domingo</span> <span>8:00AM - 9:00PM</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">

      <div class="container">

        <a class="navbar-brand"href="{{url('/')}}">Inicio</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu

        </button>
            <div class="header-area ">
                    <div id="sticky-header" class="main-header-area">
                            <div class="main-menu  d-none d-lg-block">


                            </div>
                    </div>
            </div>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">  

            @if(auth()->user())
               <input type="submit" id="btnMostrar" onclick="mostrarOcultarPed()" value="Pedidos" class="btn btn-primary">
             @endif 

            <li class="nav-item"><a href="" data-target="#modal-no2" data-toggle="modal" class="nav-link">Nueva cuenta</a></li>
             
             @if(auth()->user())
             <!-- <li class="nav-item"><a class="nav-link" href="{{url('pedidos')}}">Pedidos</a></li>  
             -->
                      @if(auth()->user()->cargo==1)
                      <li class="nav-item"><a href="" data-target="#modal-cliente" data-toggle="modal" class="nav-link">Clientes</a></li>
                      
                      

                       <li class="nav-item"><a class="nav-link" href="{{url('productos')}}">Productos</a></li>  
                      
                        <li class="nav-item"><a href="" data-target="#modal-descuento" data-toggle="modal" class="nav-link">Descuento</a></li>
                        <li class="nav-item"><a href="" data-target="#modal-impuesto" data-toggle="modal" class="nav-link">Impuestos</a></li>

                      @endif

             
               <li class="nav-item cta"><a href="" data-target="#modal-no1" data-toggle="modal" class="nav-link"> Carrito </a></li>
            @else
            <li class="nav-item"><a href="" data-target="#modal-no4" data-toggle="modal" class="nav-link">Iniciar sesión</a></li>
            @endif
            
        
          @if(auth()->user())
         <li class="nav-item"><a class="nav-link" href="{{url('/logout')}}">Cerrar sesión</a></li>
          <li class="nav-item"><a href="" data-target="#modal-eliminar" data-toggle="modal" class="nav-link">Cuenta</a></li>
         @endif
         
          </ul>
        </div>
      </div>

    </nav>

    <section class="home-slider owl-carousel js-fullheight">
      <div class="slider-item js-fullheight" style="background-image: url(images/bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate">
               @if(session()->has('msj'))
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('msj')}}
          </div>
            @endif

             @if(session()->has('errormsj'))
            <div class="alert alert-danger" role="alert">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('errormsj')}}
          </div>
            @endif

              @if ($errors->has('password'))
              <div class="alert alert-danger" role="alert">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               {{ $errors->first('password') }}
               </div>
            @endif
             
            @if ($errors->has('email'))
              <div class="alert alert-danger" role="alert">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               {{ $errors->first('email') }}
               </div>
            @endif

            @if(auth()->user())
           
          @else
             <div class="alert alert-info" role="alert">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
           Aún no inicia sesión
          </div>
            @endif
            
              <span class="subheading">Feliciano</span>
              <h1 class="mb-4">Best Restaurant</h1>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item js-fullheight" style="background-image: url(images/bg_2.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate">
              <span class="subheading">Feliciano</span>
              <h1 class="mb-4">Nutritious &amp; Tasty</h1>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item js-fullheight" style="background-image: url(images/bg_3.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate">
              <span class="subheading">Feliciano</span>
              <h1 class="mb-4">Delicious Specialties</h1>
            </div>

          </div>
        </div>
      </div>
    </section>


    <div class="col-md-12">
    <section class="ftco-section">
      <div class="container" >
        <div class="ftco-search">
          <div class="row">

            @yield('contenido')

<div id="divPed" style="display:none">
  PEDIDOS REALIZADOS
<div class="container">          
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
              <th>OPCIÓN</th>
              <th>DETALLE</th>
              <th>TICKET</th>
              <th>ELIMINAR</th>
            </thead>
            @foreach($pedidos as $p)
            @if(auth()->user())
                  @if(auth()->user()->cargo==1)
                          @if($p->estado!=0) 
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

                            <td>@if($p->estado==2)
                              <a href="{{URL::action('PedidoController@edit',$p->id_pedido)}}" ><button class="btn btn-primary">Entregado</button></a>
                              @endif
                              @if($p->estado==1)
                               <a  ><button class="btn btn-primary" disabled="true">Entregado</button></a>
                              @endif
                            </td>
                            <td>
                              @if($p->id_pedido)
                               @include('layouts.modalDPedido')
                               
                            <a href="" data-target="#modalDP-{{$p->id_pedido}}" data-toggle="modal"><button class="btn btn-danger">Mostrar</button></a>
                            @endif
                          </td>
                          <td> <a href="{{URL::action('TicketController@edit',$p->id_pedido)}}" target="_blank"><button class="btn btn-warning">Ticket</button></a></td>
                          <td>
                          {{Form::Open(array('action'=>array('CategoriaController@destroy',$p->id_pedido), 'method'=>'delete'))}}
                          <button class="btn btn-danger">Eliminar</button>
                          {{Form::Close()}}

                          @endif
                  @else
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

                            <td>@if($p->estado==2)
                              <a href="{{URL::action('PedidoController@edit',$p->id_pedido)}}" ><button class="btn btn-primary">Entregado</button></a>
                              @endif
                              @if($p->estado==1)
                               <a  ><button class="btn btn-primary" disabled="true">Entregado</button></a>
                              @endif
                            </td>
                            <td>
                              @if($p->id_pedido)
                               @include('layouts.modalDPedido')
                               
                            <a href="" data-target="#modalDP-{{$p->id_pedido}}" data-toggle="modal"><button class="btn btn-danger">Mostrar</button></a>
                            @endif
                          </td>
                          <td> <a href="{{URL::action('TicketController@edit',$p->id_pedido)}}" target="_blank"><button class="btn btn-warning">Ticket</button></a></td>
                          </tr>
                          @endif
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

            
            <div class="col-md-12" id="productosGeneral" style="display:block">
            <div class="col-md-12 nav-link-wrap">
              <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                <a class="nav-link ftco-animate active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Menú del día (<?php echo $nombreDia;?>)</a>

                <a class="nav-link ftco-animate" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Especiales</a>

                <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Bebidas</a>

                <a class="nav-link ftco-animate" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Postres</a>
              </div>
            </div>

            <div class="col-md-12 tab-wrap">
              
              <div class="tab-content" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                  <div class="row no-gutters d-flex align-items-stretch">

                   @foreach($producto as $p)
                    @if($p->categoria_id_categoria==0 && $p->nombreDia==$nombreDia && $p->id_producto!=1)
                     <div class="col-md-12 col-lg-12 d-flex align-self-stretch">
                      <div class="menus d-sm-flex ftco-animate align-items-stretch">
                        <div class="menu-img img" style="background-image: url(imagenes/articulos/{{$p->imagen}});"></div>
                        <div class="text d-flex align-items-center">
                          <div>
                            <div class="d-flex">
                              <div class="one-half">

                                <h3>{{$p->nombre}}</h3>
                              </div>
                              <div class="one-forth">
                                <span class="price">${{$p->precio}}</span>
                              </div>
                            </div>
                            <p>{{$p->descripcion}}</p>
                                  @if(auth()->user())
      
                            {!!Form::open(array('url'=>'pedidos','method'=>'POST','autocomplete'=>'off'))!!}
                            {{Form::token()}}

                                 <form action="#">
                                 
                                    <p>Cantidad:<input type="number"  name="cantidad" class="form-control" value="1"><br></p>
                                    <input type="hidden" name="cliente" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="producto_id_producto" value="{{$p->id_producto}}">
                                    <input type="submit" value="Añadir al carrito" class="btn btn-primary"><br>
                                   
                                        @foreach($descuentosA as $des)
                                        @if($des->porcentaje!=0)
                                        <p>Descuento: {{$des->porcentaje}}%</p>
                                        @endif
                                        @endforeach 
                                    
                                        @foreach($impuestosA as $imp)
                                        @if($imp->porcentaje!=0)
                                        <p>Impuesto: {{$imp->porcentaje}}%</p>
                                        @endif
                                        @endforeach     
                                  
                               
                                        @foreach($descuentosA as $des)
                                        <input type="hidden" value="{{$des->id_descuento}}" class="btn btn-primary" name="descuento_id_descuento">
                                        @endforeach
                                  
                                        @foreach($impuestosA as $imp)
                                        <input type="hidden" value="{{$imp->id_impuesto}}" class="btn btn-primary" name="impuesto_id_impuesto">
                                        @endforeach
                                       
                                  </form>
                              {!!Form::close()!!} 
                              @else
                            <p><a href="" data-target="#modal-no4" data-toggle="modal" class="nav-link"><button class="btn btn-primary">Ingresar para añadir</button></a></p>
                            @endif

                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    <br>
                    
                    @endforeach

                  </div>
                </div>

                <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
                  <div class="row no-gutters d-flex align-items-stretch">
                    @foreach($producto as $p)
                    @if($p->categoria_id_categoria==1 && $p->id_producto!=1)
                     <div class="col-md-12 col-lg-12 d-flex align-self-stretch">
                      <div class="menus d-sm-flex ftco-animate align-items-stretch">
                        <div class="menu-img img" style="background-image: url(imagenes/articulos/{{$p->imagen}});"></div>
                        <div class="text d-flex align-items-center">
                          <div>
                            <div class="d-flex">
                              <div class="one-half">

                                <h3>{{$p->nombre}}</h3>
                              </div>
                              <div class="one-forth">
                                <span class="price">${{$p->precio}}</span>
                              </div>
                            </div>
                            <p>{{$p->descripcion}}</p>

                         @if(auth()->user())
      
                            {!!Form::open(array('url'=>'pedidos','method'=>'POST','autocomplete'=>'off'))!!}
                            {{Form::token()}}

                                 <form action="#">
                                 
                                    <p>Cantidad:<input type="number"  name="cantidad" class="form-control" value="1"><br></p>
                                    <input type="hidden" name="cliente" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="producto_id_producto" value="{{$p->id_producto}}">
                                    <input type="submit" value="Añadir al carrito" class="btn btn-primary"><br>
                                   @foreach($descuentosA as $des)
                                        @if($des->porcentaje!=0)
                                        <p>Descuento: {{$des->porcentaje}}%</p>
                                        @endif
                                        @endforeach 
                                    
                                        @foreach($impuestosA as $imp)
                                        @if($imp->porcentaje!=0)
                                        <p>Impuesto: {{$imp->porcentaje}}%</p>
                                        @endif
                                        @endforeach     
                                  
                               
                                        @foreach($descuentosA as $des)
                                        <input type="hidden" value="{{$des->id_descuento}}" class="btn btn-primary" name="descuento_id_descuento">
                                        @endforeach
                                  
                                        @foreach($impuestosA as $imp)
                                        <input type="hidden" value="{{$imp->id_impuesto}}" class="btn btn-primary" name="impuesto_id_impuesto">
                                        @endforeach   
                                  </form>

                              {!!Form::close()!!} 
                              @else
                            <p><a href="" data-target="#modal-no4" data-toggle="modal" class="nav-link"><button class="btn btn-primary">Ingresar para añadir</button></a></p>
                            @endif
                      
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach
                    </div>
                  

                  </div>
                

                <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                  <div class="row no-gutters d-flex align-items-stretch">
                    @foreach($producto as $p)
                    @if($p->categoria_id_categoria==2 &&$p->id_producto!=1)
                     <div class="col-md-12 col-lg-12 d-flex align-self-stretch">
                      <div class="menus d-sm-flex ftco-animate align-items-stretch">
                        <div class="menu-img img" style="background-image: url(imagenes/articulos/{{$p->imagen}});"></div>
                        <div class="text d-flex align-items-center">
                          <div>
                            <div class="d-flex">
                              <div class="one-half">


                                <h3>{{$p->nombre}}</h3>
                              </div>
                              <div class="one-forth">
                                <span class="price">${{$p->precio}}</span>
                              </div>
                            </div>
                            <p>{{$p->descripcion}}</p>

                        @if(auth()->user())
      
                            {!!Form::open(array('url'=>'pedidos','method'=>'POST','autocomplete'=>'off'))!!}
                            {{Form::token()}}

                                 <form action="#">
                                 
                                    <p>Cantidad:<input type="number"  name="cantidad" class="form-control" value="1"><br></p>
                                    <input type="hidden" name="cliente" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="producto_id_producto" value="{{$p->id_producto}}">
                                    <input type="submit" value="Añadir al carrito" class="btn btn-primary"><br>
                                    @foreach($descuentosA as $des)
                                        @if($des->porcentaje!=0)
                                        <p>Descuento: {{$des->porcentaje}}%</p>
                                        @endif
                                        @endforeach 
                                    
                                        @foreach($impuestosA as $imp)
                                        @if($imp->porcentaje!=0)
                                        <p>Impuesto: {{$imp->porcentaje}}%</p>
                                        @endif
                                        @endforeach     
                                  
                               
                                        @foreach($descuentosA as $des)
                                        <input type="hidden" value="{{$des->id_descuento}}" class="btn btn-primary" name="descuento_id_descuento">
                                        @endforeach
                                  
                                        @foreach($impuestosA as $imp)
                                        <input type="hidden" value="{{$imp->id_impuesto}}" class="btn btn-primary" name="impuesto_id_impuesto">
                                        @endforeach   
                                  </form>

                              {!!Form::close()!!} 
                              @else
                            <p><a href="" data-target="#modal-no4" data-toggle="modal" class="nav-link"><button class="btn btn-primary">Ingresar para añadir</button></a></p>
                            @endif
                      
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach

                  </div>
                </div>

                <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-day-4-tab">
                  <div class="row no-gutters d-flex align-items-stretch">

                    @foreach($producto as $p)
                    @if($p->categoria_id_categoria==3 && $p->id_producto!=1)
                     <div class="col-md-12 col-lg-12 d-flex align-self-stretch">
                      <div class="menus d-sm-flex ftco-animate align-items-stretch">
                        <div class="menu-img img" style="background-image: url(imagenes/articulos/{{$p->imagen}});"></div>
                        <div class="text d-flex align-items-center">
                          <div>
                            <div class="d-flex">
                              <div class="one-half">

                                <h3>{{$p->nombre}}</h3>
                              </div>
                              <div class="one-forth">
                                <span class="price">${{$p->precio}}</span>
                              </div>
                            </div>
                            <p>{{$p->descripcion}}</p>

                        @if(auth()->user())
      
                            {!!Form::open(array('url'=>'pedidos','method'=>'POST','autocomplete'=>'off'))!!}
                            {{Form::token()}}

                                 <form action="#">
                                 
                                    <p>Cantidad:<input type="number"  name="cantidad" class="form-control" value="1"><br></p>
                                    <input type="hidden" name="cliente" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="producto_id_producto" value="{{$p->id_producto}}">
                                    <input type="submit" value="Añadir al carrito" class="btn btn-primary"><br>
                                       @foreach($descuentosA as $des)
                                        @if($des->porcentaje!=0)
                                        <p>Descuento: {{$des->porcentaje}}%</p>
                                        @endif
                                        @endforeach 
                                    
                                        @foreach($impuestosA as $imp)
                                        @if($imp->porcentaje!=0)
                                        <p>Impuesto: {{$imp->porcentaje}}%</p>
                                        @endif
                                        @endforeach     
                                  
                               
                                        @foreach($descuentosA as $des)
                                        <input type="hidden" value="{{$des->id_descuento}}" class="btn btn-primary" name="descuento_id_descuento">
                                        @endforeach
                                  
                                        @foreach($impuestosA as $imp)
                                        <input type="hidden" value="{{$imp->id_impuesto}}" class="btn btn-primary" name="impuesto_id_impuesto">
                                        @endforeach
                                  </form>

                              {!!Form::close()!!} 
                              @else
                            <p><a href="" data-target="#modal-no4" data-toggle="modal" class="nav-link"><button class="btn btn-primary">Ingresar para añadir</button></a></p>
                            @endif
                      
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach

                  </div>
                  </div>
                </div>


                </div>

              </div>

            </div>

          </div>

        </div>
      </div>
    </section>
    
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Menú Semanal</h2>
              <li class="d-flex"><a href="" data-target="#modal-lunes" data-toggle="modal">Lunes</a></li>
              <li class="d-flex"><a href="" data-target="#modal-martes" data-toggle="modal">Martes</a></li>
              <li class="d-flex"><a href="" data-target="#modal-miercoles" data-toggle="modal">Miércoles</a></li>
              <li class="d-flex"><a href="" data-target="#modal-jueves" data-toggle="modal">Jueves</a></li>
              <li class="d-flex"><a href="" data-target="#modal-viernes" data-toggle="modal">Viernes</a></li>
              <li class="d-flex"><a href="" data-target="#modal-sabado" data-toggle="modal">Sábado</a></li>
              <li class="d-flex"><a href="" data-target="#modal-domingo" data-toggle="modal">Domingo</a></li>

              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Horario de atención</h2>
              <ul class="list-unstyled open-hours">
                <li class="d-flex"><span>Lunes</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Martes</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Miércoles</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Jueves</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Viernes</span><span>9:00 - 02:00</span></li>
                <li class="d-flex"><span>Sábado</span><span>9:00 - 02:00</span></li>
                <li class="d-flex"><span>Domingo</span><span> 9:00 - 02:00</span></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Instagram</h2>
              <div class="thumb d-sm-flex">
                <a href="#" class="thumb-menu img" style="background-image: url(images/insta-1.jpg);">
                </a>
                <a href="#" class="thumb-menu img" style="background-image: url(images/insta-2.jpg);">
                </a>
                <a href="#" class="thumb-menu img" style="background-image: url(images/insta-3.jpg);">
                </a>
              </div>
              <div class="thumb d-flex">
                <a href="#" class="thumb-menu img" style="background-image: url(images/insta-4.jpg);">
                </a>
                <a href="#" class="thumb-menu img" style="background-image: url(images/insta-5.jpg);">
                </a>
                <a href="#" class="thumb-menu img" style="background-image: url(images/insta-6.jpg);">
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries.</p>
              <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
      @include('layouts.modal')
      @include('layouts.modalCat')
      @include('layouts.modalPed')
      @include('layouts.modalC')
      @include('layouts.modalCli')
      @include('layouts.modalDes')
      @include('layouts.modalImp')
      @include('layouts.modalEliminar')
      @include('layouts.DiaModalL')
      @include('layouts.DiaModalM')
      @include('layouts.DiaModalX')
      @include('layouts.DiaModalJ')
      @include('layouts.DiaModalV')
      @include('layouts.DiaModalS')
      @include('layouts.DiaModalD')
   
      
    </footer>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="js/script.js"></script>
<script type="text/javascript">
  


function mostrarOcultarPed(){

var mensaje= document.getElementById("btnMostrar");
var estado= document.getElementById('divPed');
var productos= document.getElementById('productosGeneral');

if(estado.style.display=="none"){
  estado.style.display = "block";
  productos.style.display = "none";
}else{
  estado.style.display = "none";
  productos.style.display = "block";
}
}

 function mostrarOcultarPro(){
var productos= document.getElementById('productosGeneral');
  if(productos.style.display=="block"){
    productos.style.display="none";

  }
}

</script>

  </body>
</html>