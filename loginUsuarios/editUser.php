<?php
require 'header.html';
require 'menuNavegador.php';
require 'utils.php';
$id = $_GET['id'];

try {
	$mysqli = new mysqli(servername, username, password, dataBase);
	$sql = 'SELECT * from usuarios WHERE id="'.$id.'"';
	$result = $mysqli->query($sql);
	$usuario = $result->fetch_object();
	$mysqli->close();
}catch (mysqli_sql_exception $e) {
	echo 'error en el proceso';
}
?>
<div class="container" style="width:40%">
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="card rounded-3 text-black">
          	<div class="row g-0">
              	<div class="card-body p-md-2 mx-md-1">
	                <div class="text-center">
	                  <h3 class="mt-1 mb-1 pb-1">Editar usuario</h3>
	                </div>
					<form method="post" action="#" id="update-user">
				  		<div class="card-body p-md-5 mx-md-4">
					  		<div class="form-outline mb-2">
						    	<label class="form-label" for="name">Nombre</label>
						    	<input value="<?php echo $usuario->nombre ?>" type="text" class="form-control" name="name" id="name" />
					  		</div>
						  	<div class="form-outline mb-2">
							    <label class="form-label" for="surname">Apellido</label>
							    <input value="<?php echo $usuario->apellido ?>" type="text" name="surname" class="form-control" id="surname" />
						  	</div>
						  	<div class="form-outline mb-2">
							    <label class="form-label" for="email">Email</label>
							    <input value="<?php echo $usuario->email ?>" type="text" name="email" class="form-control" id="email" />
						  	</div>
						  	<div class="form-outline mb-2">
							    <label class="form-label" for="pass">Contraseña<i class="fa fa-eye"></i></label>
							    <input value="<?php echo $usuario->contrasenia ?>" type="password" name="pass" class="form-control" id="pass" />
						  	</div>
						  	<div class="form-outline mb-2">
						  		<input type="hidden" name="" id="permiss" value="<?php echo $usuario->permiso ?>">
							    <label class="form-label" for="permiso">Permiso: actualmente <?php echo $usuario->permiso ?></label>
							    <select class="form-control" name="permiso" id="permiso">
							    	<option value="">Cambiar permiso</option>
							    	<option value="usuario">Usuario</option>
							    	<option value="admin">Admin</option>
							    </select>
						  	</div>
						  	<div style="text-align:center;">
						  		<input class="btn btn-outline-success" type="submit" name="submit" value="Guardar">
						  	</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
<script type="text/javascript">
	let form = document.getElementById('update-user');
	form.addEventListener('submit', function(e){
		e.preventDefault();
		let permiso = document.getElementById('permiso').value;
		if (permiso == ''){
			permiso = document.getElementById('permiss').value;
		}
		let user = {
			"name": document.getElementById('name').value,
			"surname": document.getElementById('surname').value,
			"email": document.getElementById('email').value,
			"pass": document.getElementById('pass').value,
			"permiso": permiso
		}
		console.log(user);
		fetch('updateUser.php', {
			method: "post",
			body: JSON.stringify(user)
		})
		  .then(response => response.json())
		  .then(data => updateLine(data));

	});

	function updateLine(data) {

		respuesta = data.respuesta;
		if (respuesta === 'ok') {
			parent.location.href = 'configuracion.php';
		}
	}
</script>
