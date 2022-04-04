<!doctype html>
<?php 
	include_once 'cabecalho.php';	
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Projeto 3 - Perfil</title>
		<link rel="stylesheet" type="text/css" href="css/perfil.css">
	</head>

	<body>
		<div class="base">
			<h2>Seu Perfil</h2>
			<div class="informacoes">
					<h3>
						<?php
							echo $_SESSION["usersUid"];
						?>
					</h3>
					<center>
					<?php
						require_once 'includes/imagemperfil.php';
					?>
					<div class="botaoeditarfoto">
						<form action="includes/upload.php" method="post" enctype="multipart/form-data">
							<input type="file" name="foto" id="foto" class='fotoupload'><label for="foto">Mudar foto</label>
							<button type="submit">Aplicar</button>
						</form>
					</div>
					</center>
							<?php
								$id = $_SESSION['usersId'];
								$sql = "SELECT * FROM users WHERE usersId='$id'";	
								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0){
									while($col = mysqli_fetch_assoc($result)){
									$nome = $col['usersName'];
									$idade = $col['usersIdade'];
									$email = $col['usersEmail'];
									$score = $col['usersScore'];
									echo "<ul>
												<li><p>Nome: ".$nome."</p></li>
												<li><p>Email: ".$email."</p></li>
												<li><p>Idade: ".$idade."</p></li>
												<li><p>HighScore no jogo1: ".$score."</p></li>
										</ul>";
									}
								}
							?>
			</div>
		</div>
	</body>
</html>
