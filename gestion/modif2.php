<?php session_start();
require '../Database Configuration/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
  <link rel="shortcut icon" href="../../images/favicon.jpg">
 <link rel="shortcut icon" href="../../images/favicon.ico">
    <title>Modification de l'Inscrit</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  </head>
  <body background="../pattern17.png">
<?php
include '../configuration serveur/config_server.php';
 
  if(isset($_GET["idEtudiant"]) AND !empty($_GET["idEtudiant"]))
{
 
 $req=$bdd->prepare('SELECT * FROM membre WHERE id_membre=:user');
$ID_Utilisateur  = $_GET["idEtudiant"] ;
 $req->execute(array('user'=>$ID_Utilisateur));


 echo '<center><h1><u>MODIFIER LE PROFIL DES ETUDIANTS INSCRITS SUR LA PLATE-FORME</u></h1></center>';
 
  //affichage des données:
  if($result=$req->fetch());
  {
$ref_formateur = $result['ref_formateur'];
$ref_quartier = $result['ref_quartier'];
$ref_filiere = $result['ref_filiere'];
$id_membre = $result['id_membre'];

$req1=$bdd->prepare('SELECT nom_f, prenom_f FROM formateur WHERE id_formateur=:ref');
$req1->execute(array('ref'=>$ref_formateur));
$result1=$req1->fetch();

$req2=$bdd->prepare('SELECT nom_quartier FROM quartier WHERE id_quartier=:ref');
$req2->execute(array('ref'=>$ref_quartier));
$result2=$req2->fetch();

$req3=$bdd->prepare('SELECT nom_filiere FROM filiere WHERE id_filiere=:ref');
$req3->execute(array('ref'=>$ref_filiere));
$result3=$req3->fetch();

$req4=$bdd->prepare('SELECT contenu, date_poste FROM commentaire WHERE ref_membre=:ref');
$req4->execute(array('ref'=>$id_membre));
$result4=$req4->fetch();
  ?>

<form name="insertion" action="modif3.php" method="POST">
  <input type="hidden" name="ID_Utilisateur" value="<?php echo($ID_Utilisateur) ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
    <tr align="center">
      <td>ID</td>
      <td><input type="text" name="ID_Utilisateur" value="<?php echo($result['id_membre']) ;?>"></td>
      </tr>
      <tr align="center">
      <td>Nom</td>
      <td><input type="text" name="nom" value="<?php echo($result['nom_membre']) ;?>"></td>
      </tr>
      <tr align="center">
      <td>Prénom</td>
      <td><input type="text" name="prenom" value="<?php echo($result['prenom_membre']) ;?>"></td>
    </tr>
    <tr align="center">
      <td>filière</td>
      <td><input type="text" name="filiere" value="<?php echo($result3['nom_filiere']) ;?>"></td>
    </tr>
	<tr align="center">
      <td>Cours Choisi</td>
      <td><input type="text" name="cours" value="<?php echo($result['cours_choisi']) ;?>"></td>
    </tr>
	<tr align="center">
      <td>Formateur Responsable</td>
      <td><input type="text" name="formateur" value="<?php echo($result1['prenom_f'].' '.$result1['nom_f']) ;?>"></td>
    </tr>
	<tr align="center">
      <td>Quartier</td>
      <td><input type="text" name="quartier" value="<?php echo($result2['nom_quartier']) ;?>"></td>
    </tr>
	<tr align="center">
      <td>Password</td>
      <td><input type="password" name="pass" value="<?php echo($result['password']) ;?>"></td>
    </tr>
	<tr align="center">
      <td>Civilité</td>
      <td><input type="text" name="civilite" value="<?php echo($result['civilite']) ;?>" maxlength="3"></td>
    </tr>
    <tr align="center">
      <td>Email</td>
      <td><input type="email" name="email" value="<?php echo($result['email']) ;?>"></td>
    </tr>
	<tr align="center">
      <td>Age</td>
      <td><input type="text" name="age" value="<?php echo($result['age']) ;?>"></td>
    </tr>
	<tr align="center">
      <td>Numero</td>
      <td><input type="tel" name="numero" value="<?php echo($result['numero']) ;?>" maxlength="9"></td>
    </tr>
	<tr align="center">
      <td>Commentaire</td>
      <td><textarea name="commentaire"> <?php echo($result4['contenu']) ;?></textarea></td>
    </tr>

	<tr align="center">
      <td>IP</td>
      <td><input type="text" name="ip" value="<?php echo($result['ip_membre']) ;?>"></td>
    </tr>
    <tr align="center">
      <td colspan="2"><button type="submit" align="middle"> Mise à Jour </button> </td>
    </tr>
  </table>
</form>

  <?php
  }//fin if 
}




 if(isset($_GET["idFormateur"]) AND !empty($_GET["idFormateur"]))
{
 
 $req=$bdd->prepare('SELECT * FROM formateur WHERE id_formateur=:user');
$ID_Utilisateur1  = $_GET["idFormateur"] ;
 $req->execute(array('user'=>$ID_Utilisateur1));


 echo '<center><h1><u>MODIFIER UN FORMATEUR SUR LA PLATE-FORME</u></h1></center>';
 
  //affichage des données:
  if($result=$req->fetch());
  {

$ref_quartier = $result['ref_quartier'];
//$ref_filiere = $result['ref_filiere'];



$req2=$bdd->prepare('SELECT nom_quartier FROM quartier WHERE id_quartier=:ref');
$req2->execute(array('ref'=>$ref_quartier));
$result2=$req2->fetch();

//$req3=$bdd->prepare('SELECT nom_filiere FROM filiere WHERE id_filiere=:ref');
//$req3->execute(['ref'=>$ref_filiere]);
//$result3=$req3->fetch();

  ?>

<form name="insertion" action="modif3.php" method="POST">
  <input type="hidden" name="ID_Utilisateur1" value="<?php echo($ID_Utilisateur1) ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
    <tr align="center">
      <td>ID</td>
      <td><input type="text" name="ID_Utilisateur1" value="<?php echo($result['id_formateur']) ;?>"></td>
      </tr>
      <tr align="center">
      <td>Nom</td>
      <td><input type="text" name="nomf" value="<?php echo($result['nom_f']) ;?>"></td>
      </tr>
      <tr align="center">
      <td>Prénom</td>
      <td><input type="text" name="prenomf" value="<?php echo($result['prenom_f']) ;?>"></td>
    </tr>
    <tr align="center">
      <td>filière</td>
      <td><input type="text" name="filieref" value="<?php echo($result['filiere']) ;?>"></td>
    </tr>
	
	
	<tr align="center">
      <td>Quartier</td>
      <td><input type="text" name="quartierf" value="<?php echo($result2['nom_quartier']) ;?>"></td>
    </tr>
	<tr align="center">
      <td>Password</td>
      <td><input type="password" name="passf" value="<?php echo($result['mdp']) ;?>"></td>
    </tr>
	<tr align="center">
      <td>Civilité</td>
      <td><input type="text" name="civilitef" value="<?php echo($result['civilite']) ;?>"></td>
    </tr>
    <tr align="center">
      <td>Email</td>
      <td><input type="email" name="emailf" value="<?php echo($result['email']) ;?>"></td>
    </tr>
	<tr align="center">
      <td>Numero</td>
      <td><input type="tel" name="numerof" value="<?php echo($result['numero']) ;?>" maxlength="9"></td>
    </tr>
	<tr align="center">
      <td>Mini-Biographie</td>
      <td><textarea name="biof"> <?php echo($result['biographie']) ;?></textarea></td>
    </tr>
	<tr align="center">
      <td>Expérience</td>
      <td><input type="text" name="experiencef" value="<?php echo($result['experience']) ;?>"></td>
    </tr>
	<tr align="center">
      <td>Matricule</td>
      <td><input type="text" name="matriculef" value="<?php echo($result['matricule']) ;?>"></td>
    </tr>
	<tr align="center">
      <td>IP</td>
      <td><input type="text" name="ip" value="<?php echo($result['ip_form']) ;?>"></td>
    </tr>
    <tr align="center">
      <td colspan="2"><button type="submit" align="middle"> Mise à Jour </button> </td>
    </tr>
  </table>
</form>

  <?php
  }//fin if 
}
  ?>

</body>
</html>