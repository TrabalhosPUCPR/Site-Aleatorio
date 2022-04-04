<?php 
	session_start();
	require_once 'db-inc.php';
	$id = $_SESSION['usersId'];


	$tipos = array('jpg', 'jpeg', 'png');
	
	$foto = $_FILES['foto'];

	$fotonome = $_FILES['foto']['name'];
	$fototmpnome = $_FILES['foto']['tmp_name'];
	$fototam = $_FILES['foto']['size'];
	$fotoerro = $_FILES['foto']['error'];
	$fototipo = $_FILES['foto']['type'];

	$fotoext = explode('.', $fotonome);
	$fotoextvdd = strtolower(end($fotoext));

	if(in_array($fotoextvdd, $tipos)){
		if($fotoerro === 0){
			if($fototam < 500000){
				$nome = "perfil".$id.".jpg";
				$local = '../image/upload/'.$nome;
				move_uploaded_file($fototmpnome, $local);
				$sql = "UPDATE fotoperfil SET status=0 WHERE userid='$id'";
				$result = mysqli_query($conn, $sql);
				header("location: ../perfil.php?error=none");
				exit();					
			}else{
				header("location: ../perfil.php?error=arquivogrande");
				exit();					
			}
		}else{
			header("location: ../perfil.php?error=arquivoerro");
			exit();			
		}
	}else{
		header("location: ../perfil.php?error=arquivonao");
		exit();
	}
	