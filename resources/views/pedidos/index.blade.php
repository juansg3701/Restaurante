@extends ('layouts.admin')
@section ('contenido')
  <head>
    <meta charset="utf-8">
  </head>

<?php  $Dped=0;?>

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
              <th>OPCIÓN</th>
              <th>DETALLE</th>
              <th>TICKET</th>
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
                            @include('pedidos.modalDPedido')
                            <a href="" data-target="#modalDP-{{$p->id_pedido}}" data-toggle="modal"><button class="btn btn-danger">Mostrar</button></a>
                            @endif
                          </td>
                          <td> <a href="{{URL::action('TicketController@edit',$p->id_pedido)}}" target="_blank"><button class="btn btn-warning">Ticket</button></a></td>
                          </tr>
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
                               @include('pedidos.modalDPedido')
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
        </div>


        

@stop