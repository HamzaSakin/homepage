<?php
  $Madrid=array("https://cdn.londonandpartners.com/l-and-p/assets/media/60972-640x360-tech_ns.jpg|||TextoLondres1",
  "https://www.ecestaticos.com/image/clipping/b8d7016d9c0250b78fcd406130bdb011/londres-tambien-celebra-elecciones-a-la-alcaldia-por-que-nadie-habla-de-ellas.jpg|||TextoLondres2",
  "https://ichef.bbci.co.uk/news/640/amz/worldservice/live/assets/images/2015/01/23/150123153622_sp_big_ben_624x351_bbc.jpg|||TextoLondres3");

  $Barcelona=array("https://es.parisinfo.com/bundles/otcpotcp/images/paris_380x244.jpg|||TextoParis1",
  "https://cdn.flixbus.de/city_description_images/paris-informacion-autobuses.jpg|||TextoParis2",
  "https://media.tacdn.com/media/attractions-splice-spp-674x446/07/03/1c/9c.jpg|||TextoParis3");

  $Valencia=array("https://upload.wikimedia.org/wikipedia/commons/0/0a/Roma-Vittoriano01.jpg|||TextoRoma1",
  "http://img.rtve.es/v/3727398?w=1180&preview=1474327349719.JPG|||TextoRoma2",
  "https://historia.nationalgeographic.com.es/medio/2019/12/11/coliseo-roma_2924b6ae_1280x720.jpg|||TextoRoma3");

  $CiudadActual;

  switch ($pagina) {
    case "Madrid":
        $CiudadActual=$Madrid;
        break;
    case "Barcelona":
        $CiudadActual=$Barcelona;
        break;
    case "Valencia":
        $CiudadActual=$Valencia;
        break; 
  }

?>
<div class="container" style="text-align:center;">
<div class="container">
<div id="demo" class="carousel slide" data-bs-ride="carousel" style="width:600px">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
      <?php 
      $cont = 0;
      foreach ($CiudadActual as $image_and_info) {
      $rutaImagen=explode("|||" , $image_and_info)[0];
      $textoImagen=explode("|||" , $image_and_info)[1];
      if ($cont == 0){
        ?>
        <div class="carousel-item active"> 
          <img class="d-block" style="width:600px" src="<?php echo $rutaImagen ?>"> 
          <div class="carousel-caption">
              <h3><?php echo $textoImagen; ?></h3>
          </div>
        </div>
      <?php $cont = 1;} else {
        ?>
        <div class="carousel-item"> 
          <img class="d-block" style="width:600px" src="<?php echo $rutaImagen ?>"> 
          <div class="carousel-caption">
              <h3><?php echo $textoImagen; ?></h3>
          </div>
        </div>
      <?php }}?>        
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
  </div>
</div>  
</div>