<?php session_start();
require '../Database Configuration/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../../images/favicon.jpg">
 <link rel="shortcut icon" href="../../images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Modifications effectu&eacute;es</title>
<style type="text/css">
.grossirtext {
	font-size: 24px;
	font-weight: bold;
	text-decoration: underline;
	text-align: center;
}
</style>
</head>
<body background="../pattern17.png">
<?php
include '../configuration serveur/config_server.php';

if(isset($_POST['ID_Utilisateur']) AND !empty($_POST['ID_Utilisateur']))
  {
 $req=$bdd->prepare('SELECT * FROM membre WHERE id_membre=:user');
$ID_Utilisateur  = $_POST['ID_Utilisateur'] ;
 $req->execute(array('user'=>$ID_Utilisateur));
?>



<span class="grossirtext">
  <span class="grossirtext">
<?php
if($result=$req->fetch())
  {
	  $nom = $_POST['nom'];
	  $prenom = $_POST['prenom'];
     $cours = $_POST['cours'];
	 $pass = $_POST['pass'];
	 $civilite = $_POST['civilite'];
	 $email = $_POST['email'];
	 $age = $_POST['age'];
	 $numero = $_POST['numero'];
	     $ip = $_POST['ip'];
 
 
    
     $filiere1 = $_POST['filiere'];	
	 $formateur1 = $_POST['formateur'];
     $quartier1 = $_POST['quartier'];
	 $commentaire1 = $_POST['commentaire']; 


	
 $ref_formateur = $result['ref_formateur'];
 $ref_quartier = $result['ref_quartier'];
 $ref_filiere = $result['ref_filiere'];
 $id_membre = $result['id_membre'];


$req1=$bdd->prepare('UPDATE formateur SET nom_f=:nom WHERE id_formateur=:ref');
$req1->execute(array('nom'=>$formateur1, 'ref'=>$ref_formateur));
$result1=$req1->fetch();


$req2=$bdd->prepare('UPDATE quartier SET nom_quartier=:quartier WHERE id_quartier=:ref');
$req2->execute(array('quartier'=>$quartier1, 'ref'=>$ref_quartier));
$result2=$req2->fetch();



$req3=$bdd->prepare('UPDATE filiere SET nom_filiere=:nom_fil WHERE id_filiere=:ref');
$req3->execute(array('nom_fil'=>$filiere1,'ref'=>$ref_filiere));
$result3=$req3->fetch();

$req4=$bdd->prepare('UPDATE commentaire SET contenu=:content, date_poste=:ajout WHERE ref_membre=:ref');
$req4->execute(array('content'=>$commentaire1, 'ajout'=>time(), 'ref'=>$id_membre));
$result4=$req4->fetch();

 $req=$bdd->prepare('UPDATE membre SET nom_membre=:nom, prenom_membre=:prenom, email=:email, password=:mdp, civilite=:civilite, age=:age, numero=:contact, cours_choisi=:cours, ip_membre=:ip WHERE id_membre=:id_membre');
										
										$req->execute(array(
															'nom'=>$nom,
															'prenom'=>$prenom,
															'email'=>$email,
															'mdp'=>$pass,
															'civilite'=>$civilite,
															'age'=>$age,
															'contact'=>$numero,
															'cours'=>$cours,
															'ip'=>$ip,	
															'id_membre'=>$ID_Utilisateur
															));
															
/*
echo '<script>alert('.$ref_formateur.'); </script>';





	

 
  //création de la requête SQL:
 
 
 */
  //affichage des résultats, pour savoir si la modification a marchée:
  if($req)
  {
    echo("Données Modifiées") ;
  }
  else
  {
    echo("La modification à échouée") ;
  }
?>
</p>
<?php
  }
  ?>
  </span></span>
<p><span class="grossirtext"><span class="grossirtext"><a href="modif.php"><img src="images/icon-ok.png" alt="ok" width="70" height="70" hspace="45" /></a></span></span><br><br>

</p>
<?php
  }
  
  if(isset($_POST['ID_Utilisateur1']) AND !empty($_POST['ID_Utilisateur1']))
  {
	  
	   $req=$bdd->prepare('SELECT * FROM formateur WHERE id_formateur=:user');
  $ID_Utilisateur  = $_POST['ID_Utilisateur1'] ;
 $req->execute(array('user'=>$ID_Utilisateur));
?>



<span class="grossirtext">
  <span class="grossirtext">
<?php
if($result=$req->fetch())
  {
	  $nom = $_POST['nomf'];
	  $prenom = $_POST['prenomf'];
     $filiere = $_POST['filieref'];
	 $pass = $_POST['passf'];
	 $civilite = $_POST['civilitef'];
	 $email = $_POST['emailf'];
	 $numero = $_POST['numerof'];
	     $biographie = $_POST['biof'];
		    $experience = $_POST['experiencef'];
			   $matricule = $_POST['matriculef'];
			      $ip = $_POST['ip'];
 

 $quartier = $_POST['quartierf'];
 $ref_quartier = $result['ref_quartier'];
 //$ref_filiere = $result['ref_filiere'];



$req2=$bdd->prepare('UPDATE quartier SET nom_quartier=:quartier WHERE id_quartier=:ref');
$req2->execute(array('quartier'=>$quartier, 'ref'=>$ref_quartier));
$result2=$req2->fetch();


/*
$req3=$bdd->prepare('UPDATE filiere SET nom_filiere=:nom_fil WHERE id_filiere=:ref');
$req3->execute(['nom_fil'=>$filiere,'ref'=>$ref_filiere]);
$result3=$req3->fetch();*/


 $req=$bdd->prepare('UPDATE formateur SET nom_f=:nom_f, prenom_f=:prenom_f, email=:email, mdp=:mdp, civilite=:civilite, numero=:contact, filiere=:cours, biographie=:biof, experience=:exp, matricule=:mat, ip_form=:ip WHERE id_formateur=:id_membre');
										
										$req->execute(array(
															'nom_f'=>$nom,
															'prenom_f'=>$prenom,
															'email'=>$email,
															'mdp'=>$pass,
															'civilite'=>$civilite,
															'contact'=>$numero,
															'cours'=>$filiere,
															'biof'=>$biographie,
															'exp'=>$experience,
															'mat'=>$matricule,
															'ip'=>$ip,	
															'id_membre'=>$ID_Utilisateur
															));
															

  if($req)
  {
    echo("Données Modifiées") ;
  }
  else
  {
    echo("La modification à échouée") ;
  }
?>
</p>
<?php
  }
  ?>
  </span></span>
<p><span class="grossirtext"><span class="grossirtext"><a href="modif.php"><img src="images/icon-ok.png" alt="ok" width="70" height="70" hspace="45" /></a></span></span><br><br>

</p>
<?php
  }
  ?>
</body>
</html>