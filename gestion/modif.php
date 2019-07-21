<?php session_start();
require '../Database Configuration/config.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Gestion des inscrits</title>
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
</head>

<?php
include '../configuration serveur/config_server.php';
?>


<body background="../pattern17.png">
<p class="titrecentrer">GESTION DES INSCRITS </p>

<table border="5" class="tableadmin">
  <?php
 
$req=$bdd->prepare('SELECT * FROM membre ORDER BY id_membre DESC');
$req->execute();


 echo '<center><h1><u>LISTE COMPLETE DES ETUDIANTS INSCRITS SUR LA PLATE-FORME</u></h1></center>';

?>
<form action="modif.php" method="post">
         <tr> 
          <td class="centrerdanscase">ID</td>
          <td class="centrerdanscase">Nom</td>     
          <td class="centrerdanscase">Prénom</td>
           <td class="centrerdanscase">Filière</td>
		   <td class="centrerdanscase">Cours Choisi</td>
		   <td class="centrerdanscase">Formateur Responsable</td>
		   <td class="centrerdanscase">Quartier</td>
		   <td class="centrerdanscase">Password</td>
		   <td class="centrerdanscase">Civilité</td>
           <td class="centrerdanscase">Email</td>
		   <td class="centrerdanscase">Age</td>
		   <td class="centrerdanscase">Numero</td>
		   <td class="centrerdanscase">Commentaires<br>Publié le:</td>
		   <td class="centrerdanscase">avatars</td>
           <td class="centrerdanscase">Date d'Inscription</td>
           <td class="centrerdanscase">Compte Activé?</td>
           <td class="centrerdanscase">Dernière Connexion</td>
		   <td class="centrerdanscase">Adresse IP</td>
           <td class="centrerdanscase">Supprimer?</td>
           <td class="centrerdanscase">Modifier?</td>
         </tr>
        
         <?php
     while($result=$req->fetch())
       { 
        ?>
        
<?php 


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
        <tr>
          <td class="centrerdanscase"> <?php echo($result['id_membre']);?>       </td>
          <td class="centrerdanscase"> <?php echo($result['nom_membre']);?>       </td>
          <td class="centrerdanscase"> <?php echo($result['prenom_membre']);?>       </td>
          <td class="centrerdanscase"> <?php echo($result3['nom_filiere']);?>      </td>
          <td class="centrerdanscase"> <?php echo($result['cours_choisi']);?> </td>
          <td class="centrerdanscase"> <?php echo($result1['nom_f']);?></td>
		  <td class="centrerdanscase"> <?php echo($result2['nom_quartier']);?></td>
		  <td class="centrerdanscase"> <?php echo($result['password']);?></td>
		  <td class="centrerdanscase"> <?php echo($result['civilite']);?></td>
		  <td class="centrerdanscase"> <?php echo($result['email']);?></td>
		  <td class="centrerdanscase"> <?php echo($result['age']);?></td>
		  <td class="centrerdanscase"> <?php echo($result['numero']);?></td>
		  <td class="centrerdanscase"> <?php echo($result4['contenu'].'<br>'. date('d/m/Y H\h : i\m\i\n',$result4['date_poste']))?></td>
		  <td class="centrerdanscase"> <img src="../<?php echo $result['avatars'];?>" class="img-rounded" width="50px" height="50px"> </td>
          <td class="centrerdanscase"> <?php echo(date('d/m/Y H\h : i\m\i\n',$result['date_inscription']));?>       </td>
          <td class="centrerdanscase"> <?php echo('Etat');?>      </td>
          <td class="centrerdanscase"> <?php echo(date('d/m/Y H\h : i\m\i\n',$result['date_connexion']));?>       </td>
		  <td class="centrerdanscase"> <?php echo($result['ip_membre']);?></td>
		  
          <td class="centrerdanscase"> <a href="<?php echo"supp2.php?idEtudiant=".$result['id_membre'].""?>"><img alt="Supp" width="30" height="30"  style="border:0;"></a></td>
          <td class="centrerdanscase"> <a href="<?php echo"modif2.php?idEtudiant=".$result['id_membre'].""?>"><img alt="Edit" width="30" height="30"  style="border:0;"></a></td>
         
        </tr>
    </form>
<?php
       }  
$req->closeCursor();

?> 
</table>











<br><br><br><br>
<table border="5" class="tableadmin">
  <?php
 
$req=$bdd->prepare('SELECT * FROM formateur ORDER BY id_formateur DESC');
$req->execute();


 echo '<center><h1><u>LISTE COMPLETE DES FORMATEURS INSCRITS SUR LA PLATE-FORME</u></h1></center>';

?>
<form action="modif.php" method="post">
         <tr> 
          <td class="centrerdanscase">ID</td>
          <td class="centrerdanscase">Nom</td>     
          <td class="centrerdanscase">Prénom</td>
           <td class="centrerdanscase">Filière</td>


		   <td class="centrerdanscase">Quartier</td>
		   <td class="centrerdanscase">Password</td>
		   <td class="centrerdanscase">Civilité</td>
           <td class="centrerdanscase">Email</td>

		   <td class="centrerdanscase">Numéro</td>
		   <td class="centrerdanscase">avatars</td>
		   <td class="centrerdanscase">Mini-Biographie</td>
		   <td class="centrerdanscase">Expérience</td>
		   <td class="centrerdanscase">Matricule</td>
           <td class="centrerdanscase">Date d'Inscription</td>
           <td class="centrerdanscase">Compte Activé?</td>
           <td class="centrerdanscase">Dernière Connexion</td>
		   <td class="centrerdanscase">Adresse IP</td>
           <td class="centrerdanscase">Supprimer?</td>
           <td class="centrerdanscase">Modifier?</td>
         </tr>
        
         <?php
     while($result=$req->fetch())
       { 
        ?>
		
<?php 


$ref_quartier = $result['ref_quartier'];




$req2=$bdd->prepare('SELECT nom_quartier FROM quartier WHERE id_quartier=:ref');
$req2->execute(array('ref'=>$ref_quartier));
$result2=$req2->fetch();

?>
        <tr>
          <td class="centrerdanscase"> <?php echo($result['id_formateur']);?>       </td>
          <td class="centrerdanscase"> <?php echo($result['nom_f']);?>       </td>
          <td class="centrerdanscase"> <?php echo($result['prenom_f']);?>       </td>
          <td class="centrerdanscase"> <?php echo($result['filiere']);?>      </td>


		  <td class="centrerdanscase"> <?php echo($result2['nom_quartier']);?></td>
		  <td class="centrerdanscase"> <?php echo($result['mdp']);?></td>
		  <td class="centrerdanscase"> <?php echo($result['civilite']);?></td>
		  <td class="centrerdanscase"> <?php echo($result['email']);?></td>

		  <td class="centrerdanscase"> <?php echo($result['numero']);?></td>
		  <td class="centrerdanscase"> <img src="../<?php echo $result['avatars'];?>" class="img-rounded" width="50px" height="50px"> </td>
		  		  <td class="centrerdanscase"> <?php echo($result['biographie']);?></td>
				  		  <td class="centrerdanscase"> <?php echo($result['experience']);?></td>
				  		  <td class="centrerdanscase"> <?php echo($result['matricule']);?></td>
          <td class="centrerdanscase"> <?php echo(date('d/m/Y H\h : i\m\i\n',$result['date_inscription']));?>       </td>
          <td class="centrerdanscase"> <?php echo('Etat');?>      </td>
          <td class="centrerdanscase"> <?php echo(date('d/m/Y H\h : i\m\i\n',$result['date_connexion']));?>       </td>
		  <td class="centrerdanscase"> <?php echo($result['ip_form']);?></td>
		  
          <td class="centrerdanscase"> <a href="<?php echo"supp2.php?idFormateur=".$result['id_formateur'].""?>"><img src="images/icon-supprimer.jpg" alt="Supp" width="30" height="30"  style="border:0;"></a></td>
          <td class="centrerdanscase"> <a href="<?php echo"modif2.php?idFormateur=".$result['id_formateur'].""?>"><img src="images/icon-modifier.png" alt="Edit" width="30" height="30"  style="border:0;"></a></td>
         
        </tr>
    </form>
<?php
       }  
$req->closeCursor();

?> 
</table>

</body>
</html>