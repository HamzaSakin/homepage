<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ciudades</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style>
		.gradient-custom-2 {
		/* fallback for old browsers */
		background: #fccb90;

		/* Chrome 10-25, Safari 5.1-6 */
		background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

		/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
		}

		@media (min-width: 768px) {
		.gradient-form {
		height: 100vh !important;
		}
		}
		@media (min-width: 769px) {
		.gradient-custom-2 {
		border-top-right-radius: .3rem;
		border-bottom-right-radius: .3rem;
		}
		}
	</style>
</head>
<body>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Pagina de Hamza</h4>
                </div>

                <form method="post" action="#">
								<p>Por favor, introduzca sus credenciales</p>
			          <div class="card-body p-md-5 mx-md-4">
						  		<div class="form-outline mb-4">
							    	<input type="text" class="form-control"
							      	placeholder="hola@adios.com" name="email" id="email" />
							    	<label class="form-label" for="email">Usuario</label>
						  		</div>
							  	<div class="form-outline mb-4">
								    <input type="password" name="pass" class="form-control" id="pass" />
								    <label class="form-label" for="pass">Contraseña</label>
							  	</div>
									<input type="submit" name="submit" value="Acceder">
								</div>
							</form>

							<?php
							include 'validador.php';
							if ($acceso == 'no'){
							?> <p class="alert alert-warning">Acceso denegado! Revise el usuario o la contraseña</p>
							<?php
							} ?>

							<p>¿No tienes una cuenta?</p>
							<a href="registro.html">Registrate aqui</a>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">En esta pagina encontraras lo mas destacado de las principales ciudades para hacer turismo y puedas disfrutar al maximo de tus vacaciones sin perder tiempo callejeando sin rumbo alguno. Pase y mira que arte!</h4>     
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>