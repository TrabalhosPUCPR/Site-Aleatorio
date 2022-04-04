<!doctype html>
<?php 
	include_once 'cabecalho.php'
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Projeto 3 - Esteganografia</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script type="text/javascript" src="lib/steganography.min.js"></script>
	</head>

	<body>
		<div class="este">
			<div class="botoes">
				Esteganografar:
				<br><br>
				<label for="imagem">Selecione uma imagem</label>
				<br>
				<input type="file" id="imagem" accept="image/*" onChange="preview(this)">
				<br><br>
				<label for="texto">Escreva um texto para esconder na imagem</label>
				<br>
				<textarea id="texto"></textarea>
				<br><br>
				<div class="fontetexto" id="fontetexto">Foto selecionada:</div>
				<br>
				<img src="" id="imagemOri" alt="">
				<br>
				<button onClick="esconder()" name="submit">Esconder</button>
				<br><br>
				<div class="fontetexto2" id="fontetexto2">Foto com texto escondido:</div>
				<br>
				<img src="" id="imagempronta" alt="">
			</div>
			<div class="decodificar">
				Decodificar:
				<br><br>
				<input type="file" id="imagemdeco" accept="image/*" onChange="decodificar(this)">
				<br><br>
				<img src="" id="textoOri" alt="">
				<br>
				<br>
				<div class="fontetexto3" id="fontetexto3">Texto decodificado:</div>
				<h2 id="textodeco"></h2>
			</div>
		</div>
	<script type="text/javascript" src="js/js.js"></script>
	</body>
</html>
