<?php
define ("servername", "localhost");
define ("username", "root");
define ("password", "");
define ("dataBase", "paginado");

function mostrarLista ($inicio, $fin) {
	try {
		$mysql = new mysqli (servername, username, password, dataBase);
		$sql = 'SELECT * FROM employees LIMIT '.$inicio.','.$fin;
		$result = $mysql->query($sql);
		$mysql->close();
		return $result;
	} catch (Exception $e) {
		echo 'error mostrar lista';
		return false;
	}
}
function mostrarCantidad () {
	try {
		$mysql = new mysqli (servername, username, password, dataBase);
		$sql = 'SELECT COUNT(*) FROM employees'; 
		$result = $mysql->query($sql);
		$mysql->close();
		return $result;
	} catch (Exception $e) {
		echo 'error cantidad';
		return false;
	}
}

function mostrarUsuario ($id) {
	$id++;
	try {
		$mysql = new mysqli (servername, username, password, dataBase);
		$sql = 'SELECT * FROM employees WHERE emp_no='.$id;
		$result = $mysql->query($sql);
		$mysql->close();
		return $result;
	} catch (Exception $e) {
		echo 'error mostrar usuario';
		return false;
	}
}