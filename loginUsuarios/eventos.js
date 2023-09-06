function deleteUser (id) {
	if (confirm('¿Seguro que desea borrar?')) {
		
		fetch('deleteUser.php', {
			method: "post",
			body: JSON.stringify({"userID": id})
		})
		  .then(response => response.json())
		  .then(data => deleteLine(data,id));
	}
} 

function deleteLine(response, id) {

	if (response.respuesta == 'ok') {
		console.log('ok');
		document.getElementById(id).remove();
	}
}