<?php
    if($_GET['tru']==1)
    {
 
    setcookie("email", $_GET['email'], time()+25); // On cr�e un cookie qui expirera 25 secondes plus tard pour des raisons de s�curit�.
 
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
    <meta http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<?php
    if($_GET['tru']==2)
    {
?>
 
    <meta http-equiv="refresh" content="1; url=http://127.0.0.1/projects/Newsletter/public/" /> <!-- Redirection vers la page d'accueil du site si on a entr� son e-mail. -->
 
<?php
    }
    else
    {
?>
 
    <meta http-equiv="refresh" content="25; url=http://127.0.0.1/projects/Newsletter/public/" /> <!-- Redirection vers la page d'accueil du site si on tarde trop � entrer son e-mail. -->
 
<?php
    }
?>
    <title>Validation de votre d�sinscription de la newsletter de MonSite.fr</title>
</head>
<body>
<p align="center"><font size="5">Validation de votre d�sinscription</font></p>
 
<?php
    if($_GET['tru']==1) //si la variable $_GET['tru'] est �gale � 1
    // On affiche le formulaire.
    {
?>
<font color="red">Attention, vous avez 25 secondes pour remplir le formulaire. Pass� ce d�lai, celui-ci ne sera plus valide.</font>
<form method="post" action="desinscription.php?tru=2">
Entrez votre adresse e-mail : <input type="text" name="email" size="25" /><br />
<input type="submit" value="Envoyer" name="submit" /> <input type="reset" name="reset" value="Effacer" />
</form>
<?php
    }
    elseif($_GET['tru']==2) // Sinon, si la variable $_GET['tru'] est �gale � 2.
    {
    include('../conDB.php');
		
		
    $email_mail = mysql_real_escape_string($_COOKIE['email']);
    $email_entre = mysql_real_escape_string($_POST['email']);
 
        if($email_entre==$email_mail) // Si les deux adresses e-mail sont identiques.
        {
			$delete = $bdd->prepare('DELETE FROM newsletter WHERE email=:time');
$delete->execute(array(
	'time' => $email_entre ));

 
        echo "Vous avez bien �t� d�sinscrit de la newsletter de MonSite.fr ! Vous allez �tre redirig� dans 1 seconde.";
 
        }
        else
        {
        echo "Vous n'avez pas entr� la bonne adresse e-mail !!";
        }
    }
    else
    {
    echo "Il y a eu une erreur.";
    }
?>
</body>
</html>