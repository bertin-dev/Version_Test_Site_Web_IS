<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
    <title>La newsletter de MonSite.fr</title>
</head>
<body>
 <?php
    if(isset($_GET['email'])) // On v�rifie que la variable $_GET['email'] existe.
    {
 
        if( !empty($_POST['email']) AND $_GET['email']==1 AND isset($_POST['new'])) /* On v�rifie que la variable $_POST['email'] contient bien quelque chose, que la variable $_GET['email'] est �gale � 1 et que la variable $_POST['new'] existe. */
        {
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) // On v�rifie qu'on a bien rentr� une adresse e-mail valide.
        {
 
            if($_POST['new']==0) // Si la variable $_POST['new'] est �gale � 0, cela signifie que l'on veut s'inscrire.
            {
 
            // On d�finit les param�tres de l'e-mail.
            $email = $_POST['email'];
            $message = 'Pour valider votre inscription � la newsletter de MonSite.fr, <a href="http://www.the-builders.org/Newsletter/public/inscription.php?tru=1&amp;email='.$email.'">cliquez ici</a>.';
 
            $destinataire = $email;
            $objet = "Inscription � la newsletter de MonSite.fr" ;
 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: http://www.the-builders.org' . "\r\n";
                if (@mail($destinataire, $objet, $message, $headers) ) // On envoie l'e-mail.
                {
 
                echo "Pour valider votre inscription, veuillez cliquer sur le lien dans l'e-mail que nous venons de vous envoyer.";
				
				
				
				
  // Envoi du mail d'activation
                              $sujet = "Activation de votre compte utilisateur";
                              
                         $message = " Ce mail vous a �t� envoyer car il a �t� enregistr� lors de l'inscription sur le \n";
             $message .= "site www.info-mac.fr. Pour valider votre inscription, merci de cliquer sur le lien suivant :\n";
                         //$message .= "http://" . $_SERVER["SERVER_NAME"];
                         $message .= 'http://'.$_SERVER['HTTP_HOST'];
                         $end=end(explode('/',$_SERVER['PHP_SELF']));
                         $rep=str_replace($end,'',$_SERVER['PHP_SELF']);
                         $message .= $message.$rep.'activer-compte-utilisateur.php?id=8';
                         $message .= '&clef=pipo';
                              
                              // Si une erreur survient
                              if(@mail($_POST['email'], $sujet, $message))
                              {
                                 echo 'Envoi du mail avec Success!';
                              }
							  else
							  {
								  echo 'envoi impossible';
							  }
				
				
				
                }
                else
                {
                echo "Il y a eu une erreur lors de l'envoi du mail pour votre inscription.";
                }
            }
            elseif($_POST['new']==1) // Si la variable $_POST['new'] est �gale � 1, cela signifie que l'on veut se d�sinscrire.
            {
 
            // On d�finit les param�tres de l'e-mail.
            $email = $_POST['email'];
            $message = 'Pour valider votre d�sinscription de la newsletter de MonSite.fr, <a href="http://www.monsite.fr/desinscription.php?tru=1&amp;email='.$email.'">cliquez ici</a>.';
 
            $destinataire = $email;
            $objet = "D�sinscription de la newsletter de MonSite.fr" ;
 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: http://www.the-builders.org' . "\r\n";
                if ( mail($destinataire, $objet, $message, $headers) ) 
                {
 
                echo "Pour valider votre d�sinscription, veuillez cliquer sur le lien dans l'e-mail que nous venons de vous envoyer.";
                }
                else
                {
                echo "Il y a eu une erreur lors de l'envoi du mail pour votre d�sinscription.";
                }
            }
            else
            {
            echo "Il y a eu une erreur !";
            }
        }
        else
        {
        echo "Vous n\'avez pas entr� une adresse e-mail valide ! Veuillez recommencer !";
        }
        }
        else
        {
        echo "Il y a eu une erreur.";
        }
    }
    else // Si les champs n'ont pas �t� remplis.
    {
?>
La newsletter :
<form method="post" action="index.php?email=1">
Adresse e-mail : <input type="text" name="email" size="25" /><br />
<input type="radio" name="new" value="0" />S''inscrire
<input type="radio" name="new" value="1" />Se d�sinscrire<br />
<input type="submit" value="Envoyer" name="submit" /> <input type="reset" name="reset" value="Effacer" />
</form>
<?php
    }
?>
</body>
</html>