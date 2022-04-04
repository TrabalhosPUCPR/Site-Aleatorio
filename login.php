<?php 
	include_once 'cabecalho.php'
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Projeto 3 - Login</title>
		<link rel="stylesheet" type="text/css" href="css/input.css">
	</head>

	<body>
		<div class="inputs">
			<form action="includes/login-inc.php" method="post">
				<input type="text" size="10" placeholder="Nome ou Email" name="nome">
				<input type="password" size="10" placeholder="Senha" name="senha">
				<center>
				<button type="submit" name="submit">Log in</button>
			</form>
			<br>
			</center>
			<div class="msg">
			<?php 
			if (isset($_GET["error"])){
				$error = $_GET["error"];
				if($error == "inputvazio"){
					echo "<p>Preencha todos os campos</p>";
				}
				if($error == "incorreto"){
					echo "<p>Usuario nao encontrado ou senha incorreta</p>";
				}
				if($error == "foda"){
					echo "<p>foda</p>";
				}
				if($error == "none"){
					echo "<p>Logado</p>";
				}
			}
			if (isset($_GET["sim"])){
				$error = $_GET["sim"];
				if($error == "cadastro"){
					echo "<p>Cadastrado com Sucesso<br>Faça Login</p>";
				}	
			}
			?>
			</div>
		</div>

	</body>
</html>