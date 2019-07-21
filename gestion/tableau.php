<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" lang="fr" content="">
    <meta name="author" content="">
	<meta name="keyword"  lang="fr" content="">
	<!-- Icône du site (favicon) -->
	<link rel="icon" type="image/jpg" href="../images/logo.jpg"/>
    <title>ADMINISTRATION | INSTITUT SALOMON</title>

    <!-- Bootstrap -->

	 	 <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    
  </head>
  <body background="../pattern17.png">


<style type="text/css">
.centrerdanscase {
	text-align: center;
}
.titrecentrer {
	font-size: 30px;
	font-weight: bold;
	text-decoration: underline;
	text-align: center;
}
</style>


<?php
 
    require '../Database Configuration/config.php';
	include '../configuration serveur/config_server.php';
	
	$result = $bdd->prepare('SELECT COUNT(*) AS nbEtudiants FROM membre');
	$result->execute();
	$etudiants=$result->fetch();
	
  $result1 = $bdd->prepare('SELECT COUNT(*) AS nbFormateurs FROM formateur');
	$result1->execute();
	$formateurs=$result1->fetch();
	
	$result2 = $bdd->prepare('SELECT COUNT(*) AS nbMsg FROM message');
	$result2->execute();
	$msg=$result2->fetch();


?>			
			
			
			
			
			
			
       
	    <article>
	
<br><br><br><br>	
<center>

<table border="5" class="tableadmin">
         <tr> 
          <td class="centrerdanscase"><a href="modif.php"><strong>TABLEAU DE BORD</strong></a></td>
		  </tr> 

		  <tr>
		  <td class="centrerdanscase"><a href="a la une.php"><strong>A LA UNE</strong></a></td>
          </tr>
		  
          <tr>
		  <td id="users" class="centrerdanscase"> </td>
          </tr>
		  
		  <tr>
		  <td class="centrerdanscase">ETUDIANTS INSCRITS: <em>(<?php echo $etudiants['nbEtudiants']; ?>)</em></td>
          </tr>
		  
		  <tr>
		  <td class="centrerdanscase">FORMATEURS INSCRITS: <em>(<?php echo $formateurs['nbFormateurs']; ?>)</em></td>
          </tr>
		  
		  
		  <tr>
		  <td class="centrerdanscase"><strong>MESSAGES RECEPTIONNES: </strong> <em>(<?php echo $msg['nbMsg']; ?>)</em></td>
          </tr>
		  
		  <tr>
		  <td class="centrerdanscase"><a href="envoi newsletter.php">LISTE DES MESSAGES RECEPTIONNES</a></td>
          </tr>
		  
		  <tr>
		  <td class="centrerdanscase"><strong><a href="newsletter.php">NEWSLETTER</a></strong></td>
          </tr>
</table>

</center>
  
  
  </article><hr>

  
 <center>
 <h1>ETUDIANTS EN LIGNE</h1>
<?php include('../avatar_online.php');?>
</center>



	<script src="../jquery.js"></script>
<script>
$(function(){
function getonline(){
				$('#users').load('../phpscripts/get-online0.php', function() {
				
      });
}
setInterval(getonline, 3000);

});
</script>
	



  </body>
</html>