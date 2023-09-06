<?php
require 'utils.php';

try{
	$mysqli = new mysqli(servername, username, password);
	$sql = "CREATE DATABASE IF NOT EXISTS claseweb";
	$mysqli ->query($sql);
	$mysqli ->close();

}catch (mysqli_sql_exception $e){
	echo ' error al crear la base de datos ';
}

try{
	$mysqli = new mysqli(servername, username, password, dataBase);
	$sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(30) NOT NULL,
        apellido VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        contrasenia VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        permiso VARCHAR(30) NOT NULL DEFAULT 'usuario'
    )";
    $mysqli ->query($sql);
    $mysqli ->close();
}catch (mysqli_sql_exception $e) {
	echo ' error al crear la tabla ';
}

function registroUsuario ($name, $surname, $email, $pass) {
	try{
		$mysqli = new mysqli(servername, username, password, dataBase);

		$statement = $mysqli->prepare('INSERT INTO usuarios (nombre, apellido, email, contrasenia)
        VALUES (?, ?, ?, ?)');

	    $statement->bind_param('ssss', $name, $surname, $email, $pass);
	    $statement->execute();
		$mysqli ->close();
		return true;	
	}catch (mysqli_sql_exception $e) {
		echo ' error al registrar usuario ';
		return false;
	}
}
function selectAll () {
	try {
		$mysqli = new mysqli(servername, username, password, dataBase);
		$sql = 'SELECT * FROM usuarios';
		//$statement = $mysqli->prepare()
		$result = $mysqli->query($sql);
		$mysqli->close();
		return $result;
	}catch (mysqli_sql_exception $e) {
		echo ' error en el proceso';
		return false;
	}
}

function selectUser ($id) {
	try {
		$mysqli = new mysqli(servername, username, password, dataBase);
		$sql = 'SELECT * from usuarios WHERE id="'.$id.'"';
		$result = $mysqli->query($sql);
		$usuario = $result->fetch_object();
		$mysqli->close();
		return $usuario;
	}catch (mysqli_sql_exception $e) {
		echo 'error en el proceso';
		return false;
	}
}

function deleteUser ($id) {

	try {
		$mysqli = new mysqli(servername, username, password, dataBase);
		$sql = 'DELETE FROM usuarios WHERE id='.$id.';';
		$mysqli->query($sql);
		$mysqli->close();
		return true;
	}catch (mysqli_sql_exception $e) {
		return false;
	}
}
function editUser ($name, $surname, $email, $pass, $permiso, $id) {
	
	try {
		$mysqli = new mysqli(servername, username, password, dataBase);
		$sql = 'UPDATE usuarios SET nombre = "'.$name.'", apellido = "'.$surname.'", email = "'.$email.'", contrasenia = "'.$pass.'", permiso = "'.$permiso.'" WHERE id = '.$id;
		$mysqli->query($sql);
		$mysqli->close();
		return true;
	}catch (mysqli_sql_exception $e) {
		echo 'error en el proceso';
		return false;
	}
}