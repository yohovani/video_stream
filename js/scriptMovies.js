function listarCatalogo(){
	$.post("php/catalogo.php", {id:null}, function(mensaje) {
		$("#listarCatalogo").html(mensaje);
	});
}

function mostrarVideo(){
	var idVideo = document.getElementById("idVideo");
	var tituloVideo = document.getElementById("titulo").value;
	document.getElementById("tituloVideo").innerHTML = tituloVideo;
	$.post("php/video.php", {id:idVideo.value}, function(mensaje) {
		$("#Video").html(mensaje);
	});
}

function agregar_lista(){
	var idVideo = document.getElementById("idVideoStream").value;
	alert(idVideo);
}

function addList(){
	alert("test");
	/*
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200){
			document.getElementById("video").innerHTML = xhttp.responseText;
		}
	};
	xhttp.open("POST","php/addList.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("idVideo="+idVideo);*/
}