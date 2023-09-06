<?php
require 'header.html';
require 'menuNavegador.php';
if ($_SESSION['user'] == '') {
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
	    <a class="navbar-brand" href="#">Ciudades</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li <?php if ($pagina=='Madrid'){ echo "class='active'";}?> class="nav-item">
						<a class="nav-link active" aria-current="page" href="menu.php?codCiudad=1">Madrid</a>
					</li>
					<li <?php if ($pagina=='Barcelona'){ echo "class='active'";}?> class="nav-item">
						<a class="nav-link active" aria-current="page" href="menu.php?codCiudad=2">Barcelona</a>
					</li>
					<li <?php if ($pagina=='Valencia'){ echo "class='active'";}?> class="nav-item">
						<a class="nav-link active" aria-current="page" href="menu.php?codCiudad=3">Valencia</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>