<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
    <title>Envoi de la newsletter</title>
    <style type="text/css">
            h2, th, td
            {
                text-align:center;
            }
            table
            {
                border-collapse:collapse;
                border:2px solid white;
                margin:auto;
            }
            th, td
            {
                border:1px solid black;
            }
        </style>
</head>
<body>
<p align=center><font size="6"><font color="red">Envoi de la newsletter</font></font></p>
 
<?php
// On se connecte.
 try
		{
		$bdd= new PDO ('mysql:host=localhost; dbname=tp_newsletter', 'root', '');
		}
		catch(Exception $e)
		{
			die('Erreur'. $e->getMessage());
		}
 
// On r�cup�re les 5 derni�res news.

$news=$bdd->prepare('SELECT contenu,timestamp FROM news ORDER BY id DESC LIMIT 0, 5');
	$news->execute();
	
 
$fichier_message = '<html>
<head>
    <title>Newsletter de MonSite.fr</title>
</head>
<body bgcolor="black">
<font face="verdana"><font color="white"><font size="5"><p align="center"><font color="red"><u>Balzac61</u></font></p></font>
<font size="3">
<p align="left">Voici les derni�res news de MonSite.fr :<br /><ul>'; //On d�finit le message.
 
    while($donnee = $news->fetch()) 
    {
    $fichier_message .= '<li>'.$donnee["contenu"].'(le'.date("D, d M Y H:i:s",$donnee["timestamp"]).')</li>'; //On ajoute les news au message.
    }
 
$fichier_message .= '</ul></body>
</html>'; // On termine le message.
 
 
// On r�cup�re de la table newsletter les personnes inscrites.

$liste_vrac=$bdd->prepare('SELECT email FROM newsletter');
	$liste_vrac->execute();

 
// On d�finit la liste des inscrits.
$liste = 'monsite@monsite.fr';
    while ($donnees = $liste_vrac->fetch())
    {
    $liste .= ','; //On s�pare les adresses par une virgule.
    $liste .= $donnees['email'];
    }
$message = $fichier_message;
$destinataire = $liste; 
 
$date = date("d/m/Y");
 
$objet = "Newsletter de MonSite.fr du $date"; // On d�finit l'objet qui contient la date.
 
// On d�finit le reste des param�tres.
$headers  = 'MIME-Version: 1.0' . '\r\n';
$headers .= 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
$headers .= 'From: monsite@monsite.fr' . '\r\n'; // On d�finit l'exp�diteur.
$headers .= 'Bcc:' . $liste . '' . '\r\n'; // On d�finit les destinataires en copie cach�e pour qu'ils ne puissent pas voir les adresses des autres inscrits.
 
    // On envoie l'e-mail.
    if ( mail($destinataire, $objet, $fichier_message, $headers) ) 
    {
?>
Envoi de la newsletter r�ussi.
<?php
    }
    else
    {
?>
�chec de l'envoi de la newsletter.
<?php
    }
?>
<br /><br /><u>Liste des inscrits :</u><br />
<table>
<tr>
<th>e-mail</th>
</tr>
<?php
 
 
 
$liste_inscrits_vrac=$bdd->prepare('SELECT email FROM newsletter');	 
$liste_inscrits_vrac->execute();
 
    while ($donnees = $liste_inscrits_vrac->fetch())
    {
?>
 
<tr>
<td><?php echo ($donnees['email']); ?></td>
</tr>
 
<?php
    }
?>
</table>
</body>
</html>