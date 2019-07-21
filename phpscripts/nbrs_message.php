	<?php 
	session_start();
	include('../connexion_base_donnee.php');

			//on compte le nombre de message dans la discussions
			$query = $bdd->prepare("
			SELECT count(*)As total 
			FROM chat_messages
			WHERE message_time >= :time ");
		$query->execute(array(
			'time' => $_SESSION['time']
		));
		$dn=$query->fetch();
		if($dn['total']>0)
		{
	?>
	<span style="color:rgba(245,76,16,1);"><b>Il y'a <?php echo $dn['total'];?> message(s) dans la discussions...</b></span>
	<?php
		}else{echo "ndem";}
	?>