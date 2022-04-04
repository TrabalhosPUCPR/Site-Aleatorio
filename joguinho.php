<?php 
	include_once 'cabecalho.php'
?>

<!doctype html>
<html onkeydown="pulo()">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Projeto 3 - Inicial</title>
		<link rel="stylesheet" type="text/css" href="css/jogo.css">
		<script src="http://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript" ></script>
	</head>

	<body>
		<div class="jogo">
			<p id="score">Score: <p id="score2">0</p></p>
			<div id="play" onclick="start()">
				<p>Highscore: 
				<?php
					require_once 'includes/db-inc.php';
					$id = $_SESSION['usersId'];
					$sql = "SELECT usersScore FROM users WHERE usersId='$id'";	
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0){
						while($col = mysqli_fetch_assoc($result)){
							$score = $col['usersScore'];
							echo $score;
						}
					}
				?>
				
				</p>
				<img src="image/jogo/play.jpg">
			</div>
			<div class="play"></div>
			<div id="personagem"></div>
			<div id="carro"></div>
		</div>
	</body>
	<script type="text/javascript" src="js/jogodanilo.js"></script>
</html>
