<?php
require 'utils.php';

$data = file_get_contents('php://input');
$usuario = json_decode($data);
$referer = $_SERVER['HTTP_REFERER'];
$URL = parse_url($referer);
parse_str($URL['query'],$parametros);
$id = $parametros['id'];

// if (isset($_POST['submit'])){
// 	if (empty($_POST['name'])){
// 		$name = $usuario->nombre;
// 	}else $name = $_POST['name'];

// 	if (empty($_POST['surname'])){
// 		$surname = $usuario->apellido;
// 	}else $surname = $_POST['surname'];

// 	if (empty($_POST['email'])){
// 		$email = $usuario->email;
// 	}else $email = $_POST['email'];

// 	if (empty($_POST['pass'])){
// 		$pass = $usuario->contrasenia;
// 	}else $pass = $_POST['pass'];

// 	if ($_POST['permiso'] == ""){
// 		$permiso = $usuario->permiso;
// 	}else $permiso = $_POST['permiso'];

	//echo $name,$surname,$email,$pass,$permiso;
	try {
		$mysqli = new mysqli(servername, username, password, dataBase);
		$sql = 'UPDATE usuarios SET nombre = "'.$usuario->name.'", apellido = "'.$usuario->surname.'", email = "'.$usuario->email.'", contrasenia = "'.$usuario->pass.'", permiso = "'.$usuario->permiso.'" WHERE id = '.$id;
		$mysqli->query($sql);
		$mysqli->close();
		echo '{"respuesta": "ok"}';
	}catch (mysqli_sql_exception $e) {
		echo '{"respuesta": "error"}';
	}
//}
