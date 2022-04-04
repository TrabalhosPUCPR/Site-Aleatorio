<?php

function inputVazio($nome, $senha, $idade, $username, $email){
	$erro;
	if(empty($nome) || empty($idade) || empty($senha) || empty($username) || empty($email)){
		$erro = true;
	}
	else{
		$erro = false;
	}
	return $erro;
	
}
	
function inputNome($nome, $username){
	$erro;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $nome)){
		$erro = true;
	}
	else{
		$erro = false;
	}
	return $erro;
}

function inputEmail($email){
	$erro;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$erro = true;
	}
	else{
		$erro = false;
	}
	return $erro;
	
}

function userExiste($conn, $username, $email){
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../input.php?error=falhanostmt");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);
	
	$resultdata = mysqli_stmt_get_result($stmt);
	
	if($opa = mysqli_fetch_assoc($resultdata)){
		return $opa;
	}else{
		$erro = false;
		return $erro;
	}
	mysqli_stmt_close($stmt);
}

function criarUsuario($conn, $nome, $idade, $senha, $username, $email){
	$sql = "INSERT INTO users (usersName, usersIdade, UserSenha, usersUid, usersEmail) VALUES (?, ?, ?, ?, ?)";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../input.php?error=falhanostmt");
		exit();
	}
	
	$senhahash = password_hash($senha, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt, "sssss", $nome, $idade, $senhahash, $username, $email);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
	$sql = "SELECT * FROM users WHERE usersUid='$username'";
	$result = mysqli_query($conn, $sql);
	
	while($col = mysqli_fetch_assoc($result)){
		$userid = $col["usersId"];
		$sql = "INSERT INTO fotoperfil (userid, status) VALUES ('$userid', 1)";
		mysqli_query($conn, $sql);

		header("location: ../input.php?error=none");
		exit();
	}
	
	
}

function inputVazioLogin($username, $senha){
	$erro;
	if(empty($senha) || empty($username)){
		$erro = true;
	}
	else{
		$erro = false;
	}
	return $erro;
	
}

function loginUser($conn, $username, $senha){
	$userexiste = userExiste($conn, $username, $username);
	
	if($userexiste == false){
		header("location: ../login.php?error=incorreto");
		exit();
	}
	$senhahash = $userexiste["UserSenha"];
	$ver = password_verify($senha, $senhahash);
	if ($ver == false){
		header("location: ../login.php?error=foda");
		exit();
	}else{
		session_start();
		$_SESSION["usersId"] = $userexiste["usersId"];
		$_SESSION["usersUid"] = $userexiste["usersUid"];
		header("location: ../index.php");
		exit();
	}
	
}