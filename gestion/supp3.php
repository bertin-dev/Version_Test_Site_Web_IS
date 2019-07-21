<?php session_start();
require '../Database Configuration/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../../images/favicon.jpg">
 <link rel="shortcut icon" href="../../images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Coureur supprim&eacute;</title>
<style type="text/css">
.supcentrer {
	font-size: 30px;
	text-decoration: underline;
	text-align: center;
}
</style>
</head>
<body background="../pattern17.png">
<?php
include '../configuration serveur/config_server.php';
?>
  


<div class="supcentrer">
<?php 
if (isset($_GET['id_Etu']) AND !empty($_GET['id_Etu']))
	{ 
      $tutu=htmlentities($_GET['id_Etu']); 
	
	
	
$req=$bdd->prepare('SELECT * FROM membre WHERE id_membre=:user');
$req->execute(array('user'=>$tutu));
$result=$req->fetch();	

$ref_formateur = $result['ref_formateur'];
$ref_quartier = $result['ref_quartier'];
//$ref_filiere = $result['ref_filiere'];
$id_membre = $result['id_membre'];


$req4=$bdd->prepare('DELETE FROM commentaire WHERE ref_membre=:ref');
$req4->execute(array('ref'=>$id_membre));
$result4=$req4->fetch();

$req1=$bdd->prepare('DELETE FROM formateur WHERE id_formateur=:ref');
$req1->execute(array('ref'=>$ref_formateur));
$result1=$req1->fetch();

$req2=$bdd->prepare('DELETE FROM quartier WHERE id_quartier=:ref');
$req2->execute(array('ref'=>$ref_quartier));
$result2=$req2->fetch();

//$req3=$bdd->prepare('DELETE FROM filiere WHERE id_filiere=:ref');
//$req3->execute(['ref'=>$ref_filiere]);
//$result3=$req3->fetch();


$req=$bdd->prepare('DELETE FROM membre WHERE id_membre=:user');
$req->execute(array('user'=>$tutu));

if($req)
      { ?><div class="moterreur"><?php echo 'ETUDIANT SUPPRIME AVEC SUCCESS' ; ?><br><br></div><?php }
      else { ?><div class="moterreur"><?php echo 'ERREUR DE SUPPRESSION DE L\'ETUDIANT'; ?>
  <h2><br>
    <br>
  </h2>
</div>
<h2>
  <?php }  
?>
  </h2>
<h2 class="supcentrer">Inscrit Effacé</h2>
<h2> <a href="modif.php"><img src="images/retour.png" alt="RETOUR" style="border:0;" TITLE="Retour"></a></h2>
</td>
<?php
}


if (isset($_GET['id_Form']) AND !empty($_GET['id_Form']))
	{ 
      $tutu=htmlentities($_GET['id_Form']); 

$req=$bdd->prepare('SELECT * FROM formateur WHERE id_formateur=:user');
$req->execute(array('user'=>$tutu));
$result=$req->fetch();	

$ref_quartier = $result['ref_quartier'];
$ref_filiere = $result['ref_filiere'];
 


$req2=$bdd->prepare('DELETE FROM quartier WHERE id_quartier=:ref');
$req2->execute(array('ref'=>$ref_quartier));
$result2=$req2->fetch();

$req3=$bdd->prepare('DELETE FROM filiere WHERE id_filiere=:ref');
$req3->execute(array('ref'=>$ref_filiere));
$result3=$req3->fetch();


$req=$bdd->prepare('DELETE FROM formateur WHERE id_formateur=:user');
$req->execute(array('user'=>$tutu));

if($req)
      { ?><div class="moterreur"><?php echo 'FORMATEUR SUPPRIME AVEC SUCCESS' ; ?><br><br></div><?php }
      else { ?><div class="moterreur"><?php echo 'ERREUR DE SUPPRESSION DU FORMATEUR'; ?>
  <h2><br>
    <br>
  </h2>
</div>
<h2>
  <?php }  
?>
  </h2>
<h2 class="supcentrer">Inscrit Effacé</h2>
<h2> <a href="modif.php"><img src="images/retour.png" alt="RETOUR" style="border:0;" TITLE="Retour"></a></h2>
</td>
<?php
}
?>


</div>

</body>
</html>