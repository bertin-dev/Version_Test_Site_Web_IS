<?php
session_start();
include('functions.php');
// Appel de la fonction de connexion à la base de données
$db = db_connect();
if(isset($_POST['status']))
{
	$req0=$db->prepare('SELECT * FROM membres WHERE pseudo=:pseudo');
	$req0->execute(array('pseudo'=>$_SESSION['pseudo']))or die(print_r($db->errorInfo()));
	$rslt0=$req0->fetch();
	$insert = $db->prepare('
		UPDATE chat_online SET online_status = :status WHERE online_user = :user
	');
	$insert->execute(array(
		'status' => $_POST['status'],
		'user' => $rslt0['id_membre']		
	));
	if($_POST['status']==0){echo "Absent";}
	if($_POST['status']==1){echo "Occupé";}
	if($_POST['status']==2){echo "En ligne";}
	
}else{echo "faut";}
?>