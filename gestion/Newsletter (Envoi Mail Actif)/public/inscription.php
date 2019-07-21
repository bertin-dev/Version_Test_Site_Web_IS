<?php
    if($_GET['tru']==1)
    {
 
    setcookie("email", $_GET['email'], time()+25); // On crée un cookie qui expirera 25 secondes plus tard pour des raisons de sécurité.
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
    <meta http-equiv="refresh" content="10; url=http://www.the-builders.org/Newsletter" /> <!-- Redirection vers la page d'accueil du site si on a entré son e-mail. -->
 
<?php
    }
    else
    {
?>
 
    <meta http-equiv="refresh" content="50; url=http://www.the-builders.org/Newsletter" /> <!-- Redirection vers la page d'accueil du site si on tarde trop à entrer son e-mail. -->
 
<?php
    }
?>
 
    <title>Validation de votre inscription à la newsletter de MonSite.fr</title>
 
</head>
<body>
<p align="center"><font size="5">Validation de votre inscription</font></p>
<?php
    if($_GET['tru']==1) //Si la variable $_GET['tru'] est égale à 1.
    // On affiche le formulaire
    {
?>
<font color="red">Attention, vous avez 25 secondes pour remplir le formulaire. Passé ce délai, celui-ci ne sera plus valide.</font>
<form method="post" action="inscription.php?tru=2">
Entrez votre e-mail : <input type="text" name="email" size="25" /><br />
<input type="submit" value="Envoyer" name="submit" /> <input type="reset" name="reset" value="Effacer" />
</form>
<?php
    }
elseif($_GET['tru']==2) // Sinon, si la variable $_GET['tru'] est égale à 2.
    {
		include('../conDB.php');
		
    $email_mail = $_COOKIE['email'];
    $email_entre = $_POST['email'];
 
        if($email_entre==$email_mail) // Si les deux adresses e-mail sont identiques.
        {
		
        $retour=$bdd->prepare('INSERT INTO newsletter (email) VALUES(:mail)');
        $retour->execute(array('mail'=>$email_entre));		
 
        echo "Vous avez bien été inscrit à la newsletter de MonSite.fr ! Vous allez être redirigé dans 1 seconde.";
 
        }
        else
        {
 
        echo "Vous n'avez pas entré la bonne adresse e-mail !";
 
        }
    }
    else
    {
echo "Il y a eu une erreur.";
    }
?>
</body>
</html>