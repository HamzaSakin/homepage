<?php
require 'juegos.php';
?>
<div class="container" style="padding: 20px; text-align: center;">
		<input type="button" class="btn btn-primary btn-lg" name="" value="Generar palabra" onclick="generarPalabra()">
		<input type="button" class="btn btn-primary btn-lg" name="" value="Borrar palabra" onclick="borrar()">
		<input type="text" name="" id="letra" placeholder="introduzca letra" value="">
		<input type="button" class="btn btn-primary btn-lg" value="JUGAR" id="jugar" onclick="jugar()">

		<div id="letritas">
			<input type="button" class="class-button" value="A" id="a">
			<input type="button" class="class-button" value="B" id="b">
			<input type="button" class="class-button" value="C" id="c">
			<input type="button" class="class-button" value="D" id="d">
			<input type="button" class="class-button" value="E" id="e">
			<input type="button" class="class-button" value="F" id="f">
			<input type="button" class="class-button" value="G" id="g">
			<input type="button" class="class-button" value="H" id="h">
			<input type="button" class="class-button" value="I" id="i">
			<input type="button" class="class-button" value="J" id="j">
			<input type="button" class="class-button" value="K" id="k">
			<input type="button" class="class-button" value="L" id="l">
			<input type="button" class="class-button" value="M" id="m">
			<input type="button" class="class-button" value="N" id="n">
			<input type="button" class="class-button" value="O" id="o">
			<input type="button" class="class-button" value="P" id="p">
			<input type="button" class="class-button" value="Q" id="q">
			<input type="button" class="class-button" value="R" id="r">
			<input type="button" class="class-button" value="S" id="s">
			<input type="button" class="class-button" value="T" id="t">
			<input type="button" class="class-button" value="U" id="u">
			<input type="button" class="class-button" value="V" id="v">
			<input type="button" class="class-button" value="W" id="w">
			<input type="button" class="class-button" value="X" id="x">
			<input type="button" class="class-button" value="Y" id="y">
			<input type="button" class="class-button" value="Z" id="z">
		</div>
				
		<p id="palabra"></p>
		<p id="mensaje"></p>
		<img src=" " id="imagen">
		<h3 id="pista"></h3>
	</div>

	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
	<script type="text/javascript">
		imagenes = ['','images/imagesAhorcado/6.png','images/imagesAhorcado/5.png','images/imagesAhorcado/4.png','images/imagesAhorcado/3.png','images/imagesAhorcado/2.png','images/imagesAhorcado/1.png','images/imagesAhorcado/0.png'];
		palabras = ['estufa','mesa','mantequilla','libro','leche','pan','reloj','portatil','armario','cuenco'];
		pistas = ['te calienta','donde dejas cosas', 'para untar!','para leer','de la vaca...','...bimbo','tic tac','pc','¿donde esta tu ropa?','para los cereales'];

		posicion = document.getElementById('palabra');
		mensaje = document.getElementById('mensaje');
		imagen = document.getElementById('imagen');
		botonJugar = document.getElementById('jugar');
		pista = document.getElementById('pista');

		var letrasUsadas = [];
		var guiones = [];
		var aciertos;
		var numero;



		function generarPalabra () {
			botonJugar.disabled = false;
			$(".class-button").attr('disabled', false);
			imagen.src = '';
			mensaje.innerHTML = '';
			pista.innerHTML = '';
			cont = 6;
			guiones.length = 0;
			letrasUsadas.length = 0;
			aciertos = 0;
			numero = Math.floor(Math.random()*palabras.length);
			crearGuiones (palabras[numero]);
			return palabras[numero];
		}

		function crearGuiones (palabra) {
			for (x=0; x<palabra.length; x++) {
				guiones.push(' _ ');
			}
			posicion.innerHTML = guiones.join(" ");
			return guiones;
		}

		$(document).ready(function(){
			$(".class-button").click(function(){
				var entrada = $(this).val();
			letrasClick(entrada.toLowerCase());
			})	
		})

		//FUNCION PARA SELECCIONAR LETRA CON CLICK
		function letrasClick (entrada) {
			var encontrado = 0;
			var palabra = palabras[numero];

			if (guiones.includes(entrada)) {
				mensaje.innerHTML = 'Esta letra ya esta encontrada, te quedan ' + cont + ' intentos';
				return;
			}
			if (letrasUsadas.includes(entrada)) {
				mensaje.innerHTML = 'ya usaste esta letra, te quedan ' + cont + ' intentos';
				return;
			}
			for (i=0; i<palabra.length; i++) {
				letra = palabra.charAt(i);
				console.log(entrada);
				if (entrada == letra) {
					guiones[i] = letra;
					encontrado ++;
					aciertos ++;
				} 
			}
			posicion.innerHTML = guiones.join(" ");

			if (aciertos == palabra.length){
				mensaje.innerHTML = 'Enhorabuena, has acertado!!';
				$(".class-button").attr('disabled', true);
				botonJugar.disabled = true;
				return;
			}
			if (encontrado == 0) {
				imagen.src = imagenes[cont];
				cont --;
				mensaje.innerHTML = 'Te quedan ' + cont + ' intentos';
			}
			if (cont == 1){
				mensaje.innerHTML = 'última oportunidad!!';
				pista.innerHTML = 'Pista: ' + pistas[numero];
			}
			if (cont == 0) {
				mensaje.innerHTML = 'GAME OVER';
				botonJugar.disabled = true;
				$(".class-button").attr('disabled', true);
				return;
			}
			
			letrasUsadas.push(entrada); 
		}

		//FUNCION PARA ESCRIBIR LA LETRA MANUALMENTE
		function jugar () {
			entrada = document.getElementById('letra').value;
			var palabra = palabras[numero];
			var encontrado = 0;

			if (guiones.includes(entrada)) {
				mensaje.innerHTML = 'Esta letra ya esta encontrada, te quedan ' + cont + ' intentos';
				return;
			}
			if (letrasUsadas.includes(entrada)) {
				mensaje.innerHTML = 'ya usaste esta letra, te quedan ' + cont + ' intentos';
				return;
			}
			for (y=0; y<palabra.length; y++) {
				letra = palabra.charAt(y);
				if (entrada == letra) {
					guiones[y] = letra;
					encontrado ++;
					aciertos ++;  
				}
			}
			posicion.innerHTML = guiones.join(" ");

			if (aciertos == palabra.length){
				mensaje.innerHTML = 'Enhorabuena, has   acertado!!';
				botonJugar.disabled = true;
				return;
			}
			if (encontrado == 0) {
				imagen.src = imagenes[cont];
				cont --;
				mensaje.innerHTML = 'Te quedan ' + cont + ' intentos';
			}
			if (cont == 1){
				mensaje.innerHTML = 'última oportunidad!!';
				pista.innerHTML = 'Pista: ' + pistas[numero];
			}
			if (cont == 0) {
				mensaje.innerHTML = 'GAME OVER';
				botonJugar.disabled = true;
				return;
			}
			
			letrasUsadas.push(entrada); 
		}

		function borrar () {
			document.querySelector("p").innerHTML = '';
			botonJugar.disabled = false;
			$(".class-button").attr('disabled', false );
			imagen.src = '';
			mensaje.innerHTML = '';
			cont = 5;
			guiones.length = 0;
			letrasUsadas.length = 0;
			aciertos = 0;
			pista.innerHTML = '';
		}

	</script>