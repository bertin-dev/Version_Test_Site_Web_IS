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
<body background="../pattern17.png"> 
<p align=center><font size="6"><font color="black"><u>MESSAGES DES INTERNAUTES</u></font></font></p>
 
<?php
// On se connecte.
require '../Database Configuration/config.php';
include '../configuration serveur/config_server.php';
 
// On récupère les 5 dernières news.

$news=$bdd->prepare('SELECT contenu, date_reception_msg FROM message ORDER BY id_message DESC');
$news->execute();
	
 
$fichier_message = '<html>
<head>
    <title>Newsletter de MonSite.fr</title>
</head>
<body bgcolor="black">
<font face="verdana"><font color="white"><font size="5"><p align="center"><font color="red"><u>Balzac61</u></font></p></font>
<font size="3">
<p align="left">Voici les dernières news de MonSite.fr :<br /><ul>'; //On définit le message.
 
    while($donnee = $news->fetch()) 
    {
    $fichier_message .= '<li>'.$donnee["contenu"].'(le'.date("D, d M Y H:i:s",$donnee["date_reception_msg"]).')</li>'; //On ajoute les news au message.
    }
 
$fichier_message .= '</ul></body>
</html>'; // On termine le message.
 
 
// On récupère de la table newsletter les personnes inscrites.

$liste_vrac=$bdd->prepare('SELECT email_msg FROM message');
	$liste_vrac->execute();

 
// On définit la liste des inscrits.
$liste = 'http://www.the-builders.org';
    while ($donnees = $liste_vrac->fetch())
    {
    $liste .= ','; //On sépare les adresses par une virgule.
    $liste .= $donnees['email_msg'];
    }
$message = $fichier_message;
$destinataire = $liste; 
 
$date = date("d/m/Y");
 
$objet = "Newsletter the-builders.org du $date"; // On définit l'objet qui contient la date.
 
// On définit le reste des paramètres.
$headers  = 'MIME-Version: 1.0' . '\r\n';
$headers .= 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
$headers .= 'From: monsite@the-builders.org' . '\r\n'; // On définit l'expéditeur.
$headers .= 'Bcc:' . $liste . '' . '\r\n'; // On définit les destinataires en copie cachée pour qu'ils ne puissent pas voir les adresses des autres inscrits.
 
    // On envoie l'e-mail.
    if (@mail($destinataire, $objet, $fichier_message, $headers) ) 
    {
?>
Envoi de la newsletter réussi.
<?php
    }
    else
    {
?>
Échec de l'envoi de la newsletter.
<?php
    }
?>
<br /><br /><u>Liste des visiteurs ayant envoyés les messages:</u><br />
<table>
<tr>
<th>Nom de l'Expéditeur</th>
<th>E-mail Expéditeur</th>
<th>Numero Expéditeur</th>
<th>Sujet</th>
<th>Message</th>
<th>date d'envoi</th>
</tr>
<?php
 
 
 
$liste_inscrits_vrac=$bdd->prepare('SELECT nom_exp, email_msg, numero_msg, sujet_msg, contenu, date_reception_msg FROM message');	 
$liste_inscrits_vrac->execute();
 
    while ($donnees = $liste_inscrits_vrac->fetch())
    {
?>
 
<tr>
<td><?php echo ($donnees['nom_exp']); ?></td>
<td><?php echo ($donnees['email_msg']); ?></td>
<td><?php echo ($donnees['numero_msg']); ?></td>
<td><?php echo ($donnees['sujet_msg']); ?></td>
<td><?php echo ($donnees['contenu']); ?></td>
<td><?php echo date("D, d M Y H:i:s", $donnees["date_reception_msg"]); ?></td>
</tr>
 
<?php
    }
?>
</table>
</body>
</html>