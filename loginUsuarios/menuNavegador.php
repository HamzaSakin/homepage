<?php
require 'header.html';
if (!session_id()){
	session_start();
} 
if(empty($_SESSION['user']) && $_POST){
	header('Location: index.php');
}
if (isset($_GET["codCiudad"])){
    if ($_GET["codCiudad"]==1)
      $pagina="Madrid";
    elseif($_GET["codCiudad"]==2)
      $pagina="Barcelona";
    elseif($_GET["codCiudad"]==3)
      $pagina="Valencia";
    }
  else
    $pagina="Madrid";
?>
	<nav class="navbar navbar-expand-lg navbar-light bg-secundario">
		<div class="container-fluid">
	    <a class="navbar-brand" href="#">HamzaLandia</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li <?php if ($pagina=='Madrid'){ echo "class='active'";}?> class="nav-item">
						<a class="nav-link active" aria-current="page" href="juegos.php">Juegos</a>
					</li>
					<li <?php if ($pagina=='Barcelona'){ echo "class='active'";}?> class="nav-item">
						<a class="nav-link active" aria-current="page" href="turismo.php">Turismo</a>
					</li>
					<li <?php if ($pagina=='Valencia'){ echo "class='active'";}?> class="nav-item">
						<a class="nav-link active" aria-current="page" href="menu.php?codCiudad=3">Números</a>
					</li>
					<?php if ($_SESSION['permiso'] == 'admin') { ?>
					<li class="nav-item"><a class="nav-link active" aria-current="page" href="configuracion.php">Configuración</a></li>
					<?php } ?>
				</ul>
			</div>
				<div class="collapse navbar-collapse" style="float: right;">
					<ul>
						<form class="d-flex" role="search">
					        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
					        <button class="btn btn-outline-success" type="submit">Buscar</button>
				    </form>
					</ul>
					<ul class="navbar-nav me-auto">
						<li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Bienvenido <?php echo ucwords($_SESSION['user']); echo ' '. ucwords($_SESSION['surname']);?></a></li>
						<li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Logout</a></li>
					</ul>
				</div>
		</div>
	</nav>