function listarCatalogo(){
	$.post("php/catalogo.php", {id:null}, function(mensaje) {
		$("#listarCatalogo").html(mensaje);
	});
}

function mostrarVideo(idVideo){
	var tituloVideo = document.getElementById("titulo").value;
	document.getElementById("tituloVideo").innerHTML = tituloVideo;
	$.post("php/video.php", {id:idVideo}, function(mensaje) {
		$("#Video").html(mensaje);
	});
}

function addList(id,nombre){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200){
			document.getElementById("Video").innerHTML = xhttp.responseText;
		}
	};
	xhttp.open("POST","php/addList.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("idVideo="+id+"&nombre="+nombre);
	//mostrarMensajeAdd(nombre);
}

function mostrarMensajeAdd(nombre){
	alert(nombre);
	document.getElementById("pelicula_titulo").innerHTML = nombre;
	$("#mensaje").modal("show");
}