<?php
//verifica se o usuario chegou na pagina pelo botao e nao por um link, se nao redireciona para a pagina de cadastro
if (isset($_POST["submit"])){
	$nome = $_POST["nome"];
	$idade = $_POST["idade"];
	$senha = $_POST["senha"];
	$username = $_POST["nome_user"];
	$email = $_POST["email"];
	//le todos os valores inseridos
	
	require_once 'db-inc.php';
	require_once 'funcoes-inc.php';
	
	
	if (inputVazio($nome, $senha, $idade, $username, $email) !== false){
		header("location: ../input.php?error=inputvazio");
		exit();
	}
	if (inputNome($nome, $username) !== false){
		header("location: ../input.php?error=nomeinvalido");
		exit();
	}
	if (inputEmail($email) !== false){
		header("location: ../input.php?error=emailinvalido");
		exit();
	}
	if (userExiste($conn, $username, $email) !== false){
		header("location: ../input.php?error=usuariojaexiste");
		exit();
	}
	
	criarUsuario($conn, $nome, $idade, $senha, $username, $email);
	
	
	
	
	
	
}
else{
	header("location: ../input.php");
	exit();
};
