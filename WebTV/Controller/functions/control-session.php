<?php
session_start();// ici on continue la session

if ((!isset($_SESSION['ID'])) || ($_SESSION['ID'] == ''))
{

	// La variable $_SESSION['login'] n'existe pas, ou bien elle est vide
	// <=> la personne ne s'est PAS connectée
	header('Location: LOGIN.php');
	exit();

}
else {
    $idUser=$_SESSION['ID'];
}
?>