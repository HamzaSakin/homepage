<?php
	require 'utils.php';
  $data = file_get_contents('php://input');
  $user = json_decode($data);
  
  $result = deleteUser ($user->userID);

  if ($result == true){
  	echo '{"respuesta": "ok"}';
  }else echo '{"respuesta": "error"}';

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
