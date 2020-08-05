function listarCatalogo(){
	document.getElementById("listarCatalogo").innerHTML = "";
	$.post("php/catalogo.php", {id:null}, function(mensaje) {
		$("#listarCatalogo").html(mensaje);
	});
}

function mostrarVideo(idVideo){
//	document.getElementById("tituloVideo").innerHTML = titulo;
	$.post("php/video.php", {id:idVideo}, function(mensaje) {
		$("#Video").html(mensaje);
	});
}

function addList(id){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200){
			document.getElementById("Video").innerHTML = xhttp.responseText;
		}
	};
	xhttp.open("POST","php/addList.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("idVideo="+id);

}

function mi_lista_peliculas(id){
	document.getElementById("listarCatalogo").innerHTML = "";
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200){
			document.getElementById("listarCatalogo").innerHTML = xhttp.responseText;
		}
	};
	xhttp.open("POST","php/lista.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("opcion="+1);
}

function remove_list(id){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200){
			document.getElementById("Video").innerHTML = xhttp.responseText;
		}
	};
	xhttp.open("POST","php/removeList.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("opcion="+1+"&id="+id);
}