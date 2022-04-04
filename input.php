<?php 
	include_once 'cabecalho.php'
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Projeto 3 - Cadastro</title>
		<link rel="stylesheet" type="text/css" href="css/input.css">
	</head>

	<body>
		<div class="inputs">
			<form action="includes/cadastro-inc.php" method="post">
				<input type="text" size="10" placeholder="Nome" name="nome">
				<input type="number" size="10" placeholder="Idade" name="idade" min="0" max="999" style="width: 93px">
				<input type="password" size="10" placeholder="Senha" name="senha">
				<input type="text" size="10" placeholder="Nome de usuario" name="nome_user">
				<input type="text" size="10" placeholder="email" name="email">
				<center>
				<button type="submit" name="submit">Cadastrar</button>
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
				if($error == "nomeinvalido"){
					echo "<p>Insira um nome valido</p>";
				}
				if($error == "emailinvalido"){
					echo "<p>Insira um email valido</p>";
				}
				if($error == "usuariojaexiste"){
					echo "<p>Usuario ja existe</p>";
				}
				if($error == "none"){
					header("location: login.php?sim=cadastro");
					exit();
				}
				if($error == "falhanostmt"){
					echo "<p>Algo de errado nao esta certo</p>";
				}
				
			}
			?>
			</div>
		</div>
		
		
	</body>
</html>