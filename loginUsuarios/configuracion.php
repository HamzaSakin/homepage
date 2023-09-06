<?php
require 'bbdd.php';
require 'menuNavegador.php';
//require 'utils.php';

$result = selectAll();

echo '<br><br><h2 style="text-align: center;">Listado de usuarios registrados</h2>';
echo '<div >';
echo '<input type="hidden" name="datos" id=datos value="">';
echo '<div class="container">';
echo '<table class="table">
<tr><th scope="col">Usuario</th>
<th scope="col">Nombre</th>
<th scope="col">Apellido</th>
<th scope="col">Permisos</th></tr>';

while ($usuarios = $result->fetch_object()) {
	echo '<tr id="'.$usuarios->id.'">';
	echo '<td>'.$usuarios->email.'</td><td>'. $usuarios->nombre.'</td><td>'.$usuarios->apellido.'</td><td>'.$usuarios->permiso.'</td>
	<td><button class="delete-user"  onclick="deleteUser('.$usuarios->id.')">Borrar</button></td>
	<td><button class="edit-user" onclick="window.location.href=\'editUser.php?id='.$usuarios->id.'\'">Editar</button></td>';
	echo '<tr>';

}
echo '</table></div></div>';

