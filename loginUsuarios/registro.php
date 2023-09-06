<?php
require 'bbdd.php';
require 'utils.php';
/*
try{
	$mysqli = new mysqli($servername, $username, $password);
	$sql = "CREATE DATABASE claseweb";
	$mysqli ->query($sql);
	$mysqli ->close();

}catch (mysqli_sql_exception $e){
	echo ' error en la creacion de la base de datos ';
}
try{
	$mysqli = new mysqli($servername, $username, $password, $dataBase);
	$sql = "CREATE TABLE usuarios (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(30) NOT NULL,
        apellido VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        contrasenia VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $mysqli ->query($sql);
    $mysqli ->close();
}catch (mysqli_sql_exception $e) {
	echo ' error al crear la tabla ';
}*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$result = registroUsuario ($name, $surname, $email, $pass);
	if ($result) {
		echo ' registro completado ';
		session_start();
		$_SESSION['user'] = $name;
		$_SESSION['surname'] = $surname;
		$_SESSION['permiso']= 'usuario';
		header("Location: menu.php");
	}

	// try{
	// 	$mysqli = new mysqli(servername, username, password, dataBase);

	// 	$statement = $mysqli->prepare('INSERT INTO usuarios (nombre, apellido, email, contrasenia)
    //     VALUES (?, ?, ?, ?)');

	//     $statement->bind_param('ssss', $name, $surname, $email, $pass);
	//     $statement->execute();

	// 	/*
	// 	$sql = "INSERT INTO usuarios (nombre, apellido, email, contrasenia)
    //     VALUES ('".$name."', '".$surname."', '".$email."', '".$pass."');";
	// 	$mysqli ->query($sql);*/

	// 	echo ' registro completado ';
	// 	$mysqli ->close();
	// 	session_start();
	// 	$_SESSION['user'] = $name;
	// 	$_SESSION['surname'] = $surname;
	// 	$_SESSION['permiso']= 'usuario';
	// 	header("Location: menu.php");

	// }catch (mysqli_sql_exception $e) {
	// 	echo ' error al registrar usuario ';
	// }

}