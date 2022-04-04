<?php 
	session_start();
	$userid = $_SESSION['usersId'];
	$score = json_decode($_POST['score']);
	$score = intval($score);

	require_once 'db-inc.php';
	$sql = "SELECT usersScore FROM users WHERE usersId='$userid'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0){
		while($col = mysqli_fetch_assoc($result)){
			$scoreantigo = $col['usersScore'];
		}
	} 
	if($score > $scoreantigo){
		$sql = "UPDATE users SET usersScore='$score' WHERE usersId='$userid'";
		$result = mysqli_query($conn, $sql);
		print_r($score);
	}

?>
	
	