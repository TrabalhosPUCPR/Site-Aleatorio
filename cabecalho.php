<?php
	session_start();
?>

<!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/cabecalho.css">
	</head>
		
	<body>
		<div class="cabecalho">
			<nav>
				<div class="links">
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="imagens.php">IMAGENS</a></li>
						<li><a href="videos.php">VIDEOS</a></li>
						<li><a href="player.php">PLAYER</a></li>
						<?php
							if(!isset($_SESSION['usersUid'])){
								echo "<li><a href='input.php'>CADASTRO</a></li>
									  <li><a href='login.php'>LOGIN</a></li>";
							}else{
								echo "<li><a href='perfil.php'>PERFIL</a></li>
									  <li><a href='includes/logout-inc.php'>LOG OUT</a></li>";
							}
						?>
						<li><a href="esteganografia.php">ESTEGANOGRAFIA</a></li>	
					</ul>
				</div>
			</nav>
		</div>
	</body>
</html>
