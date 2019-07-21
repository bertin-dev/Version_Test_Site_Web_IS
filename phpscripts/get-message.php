<?php
session_start();
include('functions.php');
// Appel de la fonction de connexion à la base de données
$db = db_connect();


	// ON PEUT CONTINUER !!!
	/* On effectue la requête sur la table contenant les messages. On récupère
	les 100 derniers messages. Enfin, on affiche le tout. */

/* Si vous voulez faire appraître les messages depuis l'actualisation
de la page, laissez l'AVANT-DERNIERE ligne de la requete, sinon, supprimez-la */
$query = $db->prepare("
	SELECT message_id, message_user, message_time, message_text,id_membre, pseudo,avatars
	FROM chat_messages
	LEFT JOIN membres ON membres.id_membre = chat_messages.message_user
	WHERE message_time >= :time
	ORDER BY message_time ASC LIMIT 0,100
");
$query->execute(array(
	'time' => $_GET['dateConnexion']
));
$count = $query->rowCount();
if($count != 0) {
	while($data=$query->fetch())
	{
		$message = htmlspecialchars($data['message_text']); 
		$message=code($message);
		$message = urllink($message);
		if($data['pseudo']==$_SESSION['pseudo'])
		{
?>
<script>
	function test(test)
	{
	window.document.formulaire.message.value += '' + test + ' ';
	document.getElementById('message').focus();
	}
</script>
<div id="messages_content" onfocus="blnscroll=false;"onblur="blnscroll=true;">	
	<table><tr><td style="height:px;" valign="bottom">
	<table style="width:100%">
		<tr style=""><td style="width:15%;color:#077692;" valign="top" align="center">
			<a href="#post" onclick="javascript:test('[g][color=green]<?php echo $data['pseudo'];?> => [/color][/g]');return(false)" style="color:#077692">
			<img src="<?php echo $data['avatars'];?>" width="50px" height="50px" class="img-circle">
			<br> #<span style="color:'.$color.'"><?php echo $data['pseudo'];?></span><br><?php echo date('[H:i]', $data['message_time']);?>
			</td>		
			<td style="width:85%;padding-left:10px;" valign="top"></a>
			<?php echo $message;?><br />
		</td></tr>
		</table>
	</td></tr></table>
	</div>
	<script type="text/javascript">
	var element=document.getElementById("text");
	element.scrollTop=element.scrollHeight;
	</script>
			<?php
		}else{
		?>
<div id="messages_content">	
	<table><tr><td style="height:px;" valign="bottom">
	<table style="width:100%">
		<tr><td style="width:15%" valign="top">
			<a href="#post" onclick="" style="color:black">
			<img src="<?php echo $data['avatars'];?>" width="64px" height="64px" class="img-circle">
			<br> #<span style="color:'.$color.'"><?php echo $data['pseudo'];?></span><br><?php echo date('[H:i]', $data['message_time']);?>
			</td>		
			<td style="width:85%;padding-left:10px;" valign="top"></a>
			<?php echo $message;?><br />
		</td></tr>
		</table>
	</td></tr></table>
	</div>
		<?php	
	}
	}
}else{	echo 'Aucun message n\'a été envoyé pour le moment.';}
$query->closeCursor();


?>