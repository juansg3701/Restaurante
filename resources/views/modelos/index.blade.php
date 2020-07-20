@extends ('layouts.admin')
@section ('contenido')
  
<body>


    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <h3>Clientes</h3>
    </div>
    <!-- bradcam_area_end -->

  <!-- Start Sample Area -->
  
{!!Form::open(array('url'=>'modelos/cliente','method'=>'POST','autocomplete'=>'off'))!!}
  {{Form::token()}}

  <section class="ftco-section img" style="background-image: url(images/bg_3.jpg)" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row d-flex">
          <div class="col-md-7 ftco-animate makereservation p-4 px-md-5 pb-md-5">
            <div class="heading-section ftco-animate mb-5 text-center">
              <span class="subheading">El Cañazo</span>
              <h2 class="mb-4">Registrar Cliente</h2>
            </div>


            <form action="#">
              <div class="row">

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Nombre:</label>
                        
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="nombre...">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          
                        </div>
                        </div>
                        

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Correo:</label>
                        
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="correo...">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          
                        </div>
                        </div>

                       <div class="col-md-6">
                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" >Contraseña:</label>
                           
                                <input id="password" type="password" class="form-control" name="password" placeholder="contraseña...">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          
                        </div>
                       </div>

                        <div class="col-md-6">
                         <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" >Confirmar contraseña:</label>
                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirmar contraseña...">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                      </div>



                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Dirección</label>
                    <input type="text" name="direccion" class="form-control" placeholder="dirección...">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" placeholder="número de teléfono...">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Documento</label>
                    <input type="text" name="documento" class="form-control" placeholder="número documento...">
                  </div>
                </div>

                 <input type="hidden" name="cargo" value="0">

                @if(auth()->user())
               @if(auth()->user()->cargo==1)
                        <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Cargo</label>
                    <select name="cargo" class="form-control">
                    <option value="1">Administrador</option>
                    <option value="0">Cliente</option>
                    </select> 
                   </div>
                </div>
                      @endif
      
                @endif
              </div>
                <div class="col-md-12 mt-3">
                  <div class="form-group text-center">
                    <input type="submit" value="Registrar Cliente" class="btn btn-primary py-3 px-5">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
{!!Form::close()!!} 
  <!-- End Sample Area -->

  


</body>
@stop