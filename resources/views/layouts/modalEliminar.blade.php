<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-eliminar">

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
          <div class="col-md-7 ftco-animate makereservation p-4 px-md-5 pb-md-5">
            <div class="heading-section ftco-animate mb-5 text-center">
              <span class="subheading">El Cañazo</span>
              <h2 class="mb-4">Editar cuenta</h2>
            </div>
            <h2 class="mb-4">Cambiar contraseña</h2>


            {!!Form::open(array('url'=>'modelos/Tickets','method'=>'POST','autocomplete'=>'off'))!!}
  {{Form::token()}}
            <form action="#">
              <div class="row">

                <input type="hidden" name="name" class="form-control" value="a">
                 <input type="hidden" name="email" class="form-control" value="a@gmail.com">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Contraseña actual:</label>
                    <input type="password" name="password" class="form-control" placeholder="contraseña...">
                  </div>
                </div>

                <div class="col-md-6">
                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" >Contraseña nueva:</label>
                           
                                <input id="password" type="password" class="form-control" name="npassword" placeholder=" nueva contraseña...">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          
                        </div>
                       </div>

                        <div class="col-md-6">
                         <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" >Confirmar contraseña nueva:</label>
                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirmar contraseña...">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                      </div>

                <div class="col-md-12 mt-3">
                  <div class="form-group text-center">
               
                    <button type="submit" class="btn btn-primary py-3 px-5">Cambiar contraseña</button>
                   
                  </div>
                </div>
              </div>
            </form>
            {!!Form::close()!!} 
            <hr>

            <h2 class="mb-4">Eliminar cuenta</h2>
            {!!Form::open(array('url'=>'layouts/admin','method'=>'POST','autocomplete'=>'off'))!!}
  {{Form::token()}}
            <form action="#">
              <div class="row">

                <input type="hidden" name="name" class="form-control" value="a">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Correo:</label>
                    <input type="text" name="email" class="form-control" placeholder="correo...">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Contraseña:</label>
                    <input type="password" name="password" class="form-control" placeholder="contraseña...">
                  </div>
                </div>

 
                <div class="col-md-12 mt-3">
                  <div class="form-group text-center">
               
                    <button type="submit" class="btn btn-primary py-3 px-5">Eliminar cuenta</button>
                   
                  </div>
                </div>
              </div>
            </form>
            {!!Form::close()!!} 

          </div>
        </div>
      </div>
  </section>
  

</div>