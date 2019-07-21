<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
    <title>La newsletter http://www.the-builders.org</title>
</head>
<body background="../pattern17.png"> 
 <?php
   
 
        if( !empty($_POST['email']) AND isset($_POST['objet'], $_POST['msg'])) /* On vérifie que la variable $_POST['email'] contient bien quelque chose, que la variable $_GET['email'] est égale à 1 et que la variable $_POST['new'] existe. */
        {
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) // On vérifie qu'on a bien rentré une adresse e-mail valide.
        {
 
            // On définit les paramètres de l'e-mail.
            $email = $_POST['email'];
            $message = $_POST['msg'];
 
            $destinataire = $email;
            $objet = $_POST['objet'];
 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: http://www.the-builders.org' . "\r\n";
                if (@mail($destinataire, $objet, $message, $headers) ) // On envoie l'e-mail.
                {
				                 
                            // Envoi du mail d'activation
                              $sujet = $_POST['objet'];
                              $message = $_POST['msg'];
                              
                              // Si une erreur survient
                              if(@mail($_POST['email'], $sujet, $message))
                              {
                                 $statut = 'Envoi du mail avec Success!';
                              }
							  else
							  {
								  $statut = 'envoi impossible';
							  }
				
				
				
                }
                else
                {
                $statut = "Il y a eu une erreur lors de l'envoi du mail.";
                }
         
        }
        else
        {
        $statut = "Vous n\'avez pas entré une adresse e-mail valide ! Veuillez recommencer !";
        }
        }
?>

<!---------------------------------------------------ENVOI PARTICULIER------------------------------------->
  <center>

<p align=center><font size="6"><font color="black"><u>ENVOI PARTICULIER</u></font></font></p>
<form method="post" action="newsletter.php">
Adresse e-mail * <input type="email" name="email" size="25" required="required" placeholder="info@the-builders.org"/><br /><br />

Objet * <input type="text" name="objet" required="required" placeholder="Sujet"/><br /><br />

<label>Message *</label>
<textarea name="msg" required="required" rows="10" cols="30" placeholder="Votre Message"></textarea><br><br>
<input type="submit" value="Envoyer votre Message" name="submit" /> 
</form>


<?php
if(isset($statut))
	echo $statut;
?>
</center>


<!---------------------------------------------------ENVOI GENERAL------------------------------------->
<?php

    require '../Database Configuration/config.php';
	include '../configuration serveur/config_server.php';
	
	$result_msg = $bdd->prepare('SELECT email_msg FROM message');
	$result_msg->execute();
	
	$result_formateur = $bdd->prepare('SELECT formateur.email FROM formateur');
	$result_formateur->execute();
	
	
	$result_membre = $bdd->prepare('SELECT membre.email FROM membre');
	$result_membre->execute();
  


if( isset($_POST['submit'])) /* On vérifie que la variable $_POST['email'] contient bien quelque chose, que la variable $_GET['email'] est égale à 1 et que la variable $_POST['new'] existe. */
        {
        if (isset($_POST['sujetG'], $_POST['messageG'])) // On vérifie qu'on a bien rentré une adresse e-mail valide.
        {
			$mailM = '';$mailF = ''; $mailV = ''; $statutG='';
				                 // Envoi du mail d'activation
                              $sujet = $_POST['sujetG'];
                              $message = $_POST['messageG'];
								
								
								 while($result_msg->fetch())
								 {
                                $mailV .= $result_msg->fetch()['email_msg'].', ';
								 }
								 
								 if(@mail($mailV, $sujet, $message))
							      $statutG .= "Envoi du message aux visteurs Réussit<br>";	
							
								 while($result_formateur->fetch())
								 {
                                 $mailF .= $result_formateur->fetch()['email'].', ';
								}
								if(@mail($mailF, $sujet, $message))
									$statutG .= "Envoi du message aux Formateurs Réussit<br>";
								
								 while($result_membre->fetch())
								 {
                                $mailM .= $result_membre->fetch()['email'].', ';
								}
                               if(@mail($mailM, $sujet, $message))
								   $statutG .= "Envoi du message aux Etudiants Réussit<br>";
							   
							   $success = "ENVOI DES EMAILS TERMINE AVEC SUCCESS!";
         
        }
        else
        {
        $statutG = "Vous n\'avez pas entré une adresse e-mail valide ! Veuillez recommencer !";
        }
        }
?>

<br>
<center>

<p align=center><font size="6"><font color="black"><u>ENVOI GENERAL</u></font></font></p>
	<form method="post" action="newsletter.php">
                   
                  
                        
                            <label>Sujet *</label>
                            <input type="text" name="sujetG" size="25" required="required" placeholder="Sujet"><br><br>
                       
                        
                            <label>Message *</label>
                            <textarea name="messageG" required="required" rows="10" cols="30" placeholder="Votre Message"></textarea><br>
                                           
                        
                            <button type="submit" name="submit" required="required">Envoyez votre Message</button>
                      
                 
      </form>
	  <?php
if(isset($statutG) and !empty($statutG))
{	echo $statutG.'<br>';
     echo $success;
}
?>
</center>

</body>
</html>