<?php
$acceso = 'si';
require 'utils.php';

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	if (!empty($email)){
		
		try {
			$mysqli = new mysqli(servername, username, password, dataBase);

			$statement = $mysqli->prepare('SELECT * FROM usuarios WHERE email = ? AND contrasenia = ? ');
			$statement->bind_param('ii', $email, $pass);
			$statement->execute();
			$result = $statement->get_result();

			$usuario = $result->fetch_object();
			print_r ($usuario);
			$mysqli ->close();
		}catch (mysqli_sql_exception $e){
			echo 'error al acceder a la cuenta ';
		}
	}

	if (isset($usuario->email)){
		if ($usuario->contrasenia == $pass) {
			session_start();
			$_SESSION['user'] = $usuario->nombre;
			$_SESSION['surname'] = $usuario->apellido;
			$_SESSION['permiso'] = $usuario->permiso;
			header('Location: menu.php');
		}else $acceso = 'no';
	}else $acceso = 'no';			
}
