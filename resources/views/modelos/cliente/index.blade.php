<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cliente</title>  
    
</head>
<body>
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
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="ingresa tu nombre">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Dirección</label>
                    <input type="text" name="direccion" class="form-control" placeholder="ingresa tu dirección">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" placeholder="Ingrea tu teléfono">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Correo</label>
                    <input type="text" name="correo" class="form-control" id="book_date" placeholder="Ingresa tu correo">
                  </div>
                </div>
      <div class="col-md-6">
        <div class="form-group">
        <script type="text/javascript">
        $( function() {
          $("#id_tipo_documento").change( function() {
            if ($(this).val() === "1") {
              $("#id_cedula").prop("disabled", false);
               $("#id_falso").prop("disabled", false);
            } else {
              $("#id_cedula").prop("disabled", true);
              $("#id_falso").prop("disabled", true);
            }
            if ($(this).val() === "2") {
              $("#id_nit").prop("disabled", false);
              $("#id_digito").prop("disabled", false);
            } else {
              $("#id_nit").prop("disabled", true);
              $("#id_digito").prop("disabled", true);
            }
          });
        });
        </script>
        Documento<br>
        <select id='id_tipo_documento' name="tipo_documento" class="form-control">
          <option value="1" selected>Cédula</option>
          <option value="2">NIT</option>
        </select><br>
        <div align="center">
        Cédula:
        <input id='id_cedula' type="number" class="" style="width:150px; heigth : 1px" name="documento" placeholder="- - - - - - -" size="30" maxlength="30" enabled>
        <input id='id_falso' type="number" name="verificacion_nit" placeholder="------"  size="11" maxlength="11" style="display:none">
        NIT:
        <input id='id_nit' type="number" class="" style="width:150px; heigth : 1px" name="documento" placeholder="- - - - - - -" size="30" maxlength="30" required pattern=""  disabled>-
        <input id='id_digito' type="number"class=""style="width:40px; heigth:1px" name="verificacion_nit" placeholder="y" size="1" maxlength="1" required disabled><br><br>
        </div>
        </div>
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
</body>


</html>