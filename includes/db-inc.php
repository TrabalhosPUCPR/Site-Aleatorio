<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPasswprd = "usbw";
$dBName = "proj3";

$conn = mysqli_connect($serverName, $dBUsername, $dBPasswprd, $dBName);

if (!$conn) { //se retorna falso
	die("Conexao deu erro:". mysqli_connect_error());
	
}