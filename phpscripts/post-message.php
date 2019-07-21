<?php
session_start();
include('functions.php');
// Appel de la fonction de connexion à la base de données
$db = db_connect();

if(isset($_SESSION['pseudo'])) {
	if(isset($_POST['message']) AND !empty($_POST['message'])) {	
		/* On teste si le message ne contient qu'un ou plusieurs points et
		qu'un ou plusieurs espaces, ou s'il est vide. 
			^ -> début de la chaine - $ -> fin de la chaine
			[-. ] -> espace, rien ou point 
			+ -> une ou plusieurs fois
		Si c'est le cas, alors on envoie pas le message */
			$req0=$db->prepare('SELECT * FROM membres WHERE pseudo=:pseudo');
			$req0->execute(array('pseudo'=>$_SESSION['pseudo']))or die(print_r($db->errorInfo()));
			$rslt0=$req0->fetch();
		if(!preg_match("#^[-. ]+$#", $_POST['message'])) {	
			$query = $db->prepare("SELECT * FROM chat_messages WHERE message_user = :user ORDER BY message_time DESC LIMIT 0,1");
			$query->execute(array(
				'user' => $rslt0['id_membre']
			))or die(print_r($db->errorInfo()));
			$count = $query->rowCount();
			$data = $query->fetch();
			// Vérification de la similitude
			if($count != 0)
				similar_text($data['message_text'], $_POST['message'], $percent);

			if($percent < 80) {
				// Vérification de la date du dernier message.
				if((time()-5) >= $data['message_time']) {

					// YES ! ON PEUT CONTINUER ! Ouiiiii.
					// A placer à l'intérieur du if(time()-5 >= $data['message_time'])

					$insert = $db->prepare('
						INSERT INTO chat_messages (message_id, message_user, message_time, message_text) 
						VALUES(:id, :user, :time, :text)
					');
					$insert->execute(array(
						'id' => '',
						'user' => $rslt0['id_membre'],
						'time' => time(),
						'text' => $_POST['message']
					))or die(print_r($db->errorInfo()));
					echo true;

				} else{echo 'Votre dernier message est trop récent. Baissez le rythme :D';}
						
			} else{echo 'Votre dernier message est très similaire.';}
					
		} else{echo 'Votre message est vide.';}
				
	} else{echo 'Votre message est vide.';}
			
} else{echo 'Vous devez être connecté.';}
		
?>




