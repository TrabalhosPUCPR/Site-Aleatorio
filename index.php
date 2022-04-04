<!doctype html>
<?php 
	include_once 'cabecalho.php'
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Projeto 3 - Inicial</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>

	<body>
		<div class="base">
			<?php
				if(isset($_SESSION['usersUid'])){
					echo "<p>Bom Dia " . $_SESSION['usersUid'] . "</p>";
				}
			?>
			
		</div>
		<div class="lista">
			<?php
				if(isset($_SESSION['usersUid'])){
					echo "<p>Jogos para jogar:</p><a href='joguinho.php'><img src='image/jogo/jogo1.jpg' width='200px' height='200px'></a>";
				}
			?>
		</div>
		<div class="creditos">
			Um trabalho feito por:<br><br>
			Filipe Retondario Sales<br>
			Leonardo Matthew Knight<br>
			Matthaus Rautenberg Roth<br>
			Théo César Zanotto da Silva
		</div>
	</body>
</html>
