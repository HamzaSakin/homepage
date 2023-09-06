
tabla = document.getElementById('tabla');
miId= document.getElementById('miId').value;
botonNext = document.getElementById('botonNext');
contador = 0;
$(document).ready(function() {
	$(window).scroll(function() {
		if (botonNext.offsetTop<(window.innerHeight + window.pageYOffset)){ //metodo issam
		//if ($(window).scrollTop() == $(document).height() - $(window).height()) { //metodo internet
			console.log ('el scroll funciona');
			contador++;
			fetch('paginado.php', {
				method: "post",
				body: JSON.stringify({"scrollPagina": contador})
			})
			  .then(response => response.json())
			  .then(data => hacerScroll(data));
		}
	}); 
});

function hacerScroll (data) {
	console.log('recibido en JS');
	Object.keys(data).forEach(key=>{

		tabla.innerHTML += '<tr><td>'+data[key].emp_no+'</td><td>'+data[key].birth_date+'</td><td>'
						+data[key].first_name+'</td><td>'+data[key].last_name+'</td><td>'
						+data[key].gender+'</td><td>'+data[key].hire_date+'</td>'+
						'<td><button class="delete-user"  onclick="deleteUser(' + data[key].emp_no + ')">Borrar</button></td>'
					+ '<td><button class="edit-user" onclick="window.location.href=\'editUser.php?id=' + data[key].emp_no + '\'">Editar</button></td>';
	})
	//miId.value = data.emp_no;
}
