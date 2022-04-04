<?php

	if (isset($_POST["submit"])){
		$username = $_POST["nome"];
		$senha = $_POST["senha"];
		
		require_once 'db-inc.php';
		require_once 'funcoes-inc.php';
		
		if (inputVazioLogin($username, $senha) !== false){
			header("location: ../login.php?error=inputvazio");
			exit();
		}
		
		loginUser($conn, $username, $senha);
	}else{
		header("location: ../login.php");
	}