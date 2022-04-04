// JavaScript Document

// PARTE DA ESTEGANOGRAFIA
var dataimagem;


function preview(input){
	document.getElementById("fontetexto").style.display = 'block';
	
	var reader = new FileReader();
	reader.onload = function(e){
		console.log(e.target.result);
		dataimagem = e.target.result;
		document.querySelector('#imagemOri').src = e.target.result;
	}
	reader.readAsDataURL(input.files[0]);
}

function esconder(){
	document.getElementById("fontetexto2").style.display = 'block';
	
	document.querySelector("#imagempronta").src = steg.encode(document.querySelector('#texto').value, dataimagem);
	
	
}

function decodificar(input){
	document.getElementById("fontetexto3").style.display = 'block';
	
	var reader = new FileReader();
	reader.onload = function(e){
		document.querySelector('#textoOri').src = e.target.result;
		document.querySelector('#textodeco').innerText = steg.decode(e.target.result);
	}
	reader.readAsDataURL(input.files[0]);
}