<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>listado</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
</head>
<body>
<?php
require 'bbdd.php';

$numeroRegistros = 50;
$cantidad = mostrarCantidad();
$cantidad = $cantidad->fetch_assoc();
$numeroPaginas = $cantidad['COUNT(*)']/$numeroRegistros;
if ($numeroRegistros%2 != 0) {
	$numeroPaginas++;
}
if(isset($_GET['pagina'])) {
	$pagina = $_GET['pagina'];
	$inicio = ($pagina*$numeroRegistros)-$numeroRegistros;
	$result = mostrarLista($inicio,$numeroRegistros);
}else {
	$result = mostrarLista(0,$numeroRegistros);
	$pagina = 1;
	}
?>

<br><br>
<h2 style="text-align: center;">Listado de usuarios registrados</h2>

<form method="post" action="paginado.php">'

	<!-- PARA EL PAGINADOR SUPERIOR -->
	<input type=hidden name="pagina" value="<?php echo $pagina ?>">
	<div class="container">
		<nav aria-label="Page navigation">
		<ul class="pagination">
			<input class="btn btn-primary" type="submit" name="atras" value="Previous">
			<?php
			for ($x=1; $x<=$numeroPaginas; $x++) {
				if ($x == $pagina) {
					echo '<li class="page-item active">
				<a class="page-link" href="paginado.php?pagina='.$x.'">'.$x.'</a></li>';
				}else {
					echo '
					<li class="page-item">
					<a class="page-link" href="paginado.php?pagina='.$x.'">'.$x.'</a></li>';
				}
			}
			?>
			<input class="btn btn-primary" type="submit" name="alante" value="Next">
		</ul>
		</nav>

		<!-- PARA LA TABLA -->

		<input type="hidden" name="datos" id=datos value="">
		<div class="container" >
			<table class="table" id=tabla>
				<tr>
					<th scope="col">N. Empleado</th>
					<th scope="col">Fecha nacim</th>
					<th scope="col">Nombre</th>
					<th scope="col">Apellido</th>
					<th scope="col">Genero</th>
					<th scope="col">Fecha Alta</th>
				</tr>
				<?php

				while ($usuarios = $result->fetch_object()) {
					echo '<tr id="'.$usuarios->emp_no.'">';
					echo '<td>'.$usuarios->emp_no.'</td><td>'. $usuarios->birth_date.'</td><td>'.$usuarios->first_name.'</td><td>'.$usuarios->last_name.'</td><td>'.$usuarios->gender.'</td><td>'.$usuarios->hire_date.'</td>
					<td><button class="delete-user"  onclick="deleteUser('.$usuarios->emp_no.')">Borrar</button></td>
					<td><button class="edit-user" onclick="window.location.href=\'editUser.php?id='.$usuarios->emp_no.'\'">Editar</button></td>';
					echo '<tr>';
					$miId = $usuarios->emp_no;
				}
				?>
			</table>
		</div> 
		<input type="hidden" id="miId" name="miId" value="<?php echo $miId?>">

		<!-- //PARA EL PAGINADOR INFERIOR -->

		<input type=hidden name="pagina" value="<?php echo $pagina ?>">
		<div class="container">
			<nav aria-label="Page navigation">
				<ul class="pagination">
					<input class="btn btn-primary" type="submit" name="atras" value="Previous">
					<?php
					for ($x=1; $x<=$numeroPaginas; $x++) {
						if ($x == $pagina) {
							echo '<li class="page-item active">
						<a class="page-link" href="paginado.php?pagina='.$x.'">'.$x.'</a></li>';
						}else {
							echo '
							<li class="page-item">
							<a class="page-link" href="paginado.php?pagina='.$x.'">'.$x.'</a></li>';
						}
					}
					?>
				 	<input class="btn btn-primary" type="submit" name="alante" value="Next" id="botonNext">
		 		</ul>
			</nav>
		</div>
	</div>
</form>

	<script src="paginadorJS.js"></script>
</body>

		







<!--
// if ($numeroPaginas>10) {
// 	$cont=$pagina-5;
// 	for ($x=1; $x<=10; $x++) {
// 		if ($x == $pagina) {
// 			echo '<li class="page-item active">
// 		<a class="page-link" href="paginado.php?pagina='.$cont.'">'.$cont.'</a></li>';
// 		}else {
// 			echo '
// 			<li class="page-item">
// 			<a class="page-link" href="paginado.php?pagina='.$cont.'">'.$cont.'</a></li>';
// 		}
// 		$cont++;
// 	}
// }else {