<?php session_start();
require '../Database Configuration/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
  <link rel="shortcut icon" href="../../images/favicon.jpg">
 <link rel="shortcut icon" href="../../images/favicon.ico">
    <title>Suppression de l'Inscrit</title>
  <style type="text/css">
  .titresupp {
	font-size: 30px;
	font-weight: bold;
	text-decoration: underline;
	text-align: center;
}
  .tableadmin {
	text-align: center;
}
  </style>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  </head>
  <body background="../pattern17.png">
<?php
include '../configuration serveur/config_server.php';
?>
  
<p class="titresupp"><img src="images/attention.jpg" width="100" height="100" alt="" /></p>
<p class="titresupp">Supprimer cet inscrit?? </p>
<table border="5" class="tableadmin">
   <?php

  
  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  if(isset($_GET["idEtudiant"]) AND !empty($_GET["idEtudiant"]))
{
 
 $req=$bdd->prepare('SELECT * FROM membre WHERE id_membre=:user');
$ID_Utilisateur  = $_GET["idEtudiant"] ;
 $req->execute(array('user'=>$ID_Utilisateur));



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


<form name="insertion" action="supp3.php" method="POST">
  <input type="hidden" name="ID_Utilisateur" value="<?php echo($ID_Utilisateur) ;?>">
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
           <td class="centrerdanscase">Compte Activé ?</td>
           <td class="centrerdanscase">Dernière Connexion</td>
		   <td class="centrerdanscase">Adresse IP</td>
           <td class="centrerdanscase">Supprimer ?</td>
           <td class="centrerdanscase">Modifier ?</td>
</tr>
        
       

        <tr>
         <td class="centrerdanscase"> <?php echo($result['id_membre']);?>       </td>
          <td class="centrerdanscase"> <?php echo($result['nom_membre']);?>       </td>
          <td class="centrerdanscase"> <?php echo($result['prenom_membre']);?>       </td>
          <td class="centrerdanscase"> <?php echo($result3['nom_filiere']);?>      </td>
          <td class="centrerdanscase"> <?php echo($result['cours_choisi']);?> </td>
          <td class="centrerdanscase"> <?php echo($result1['prenom_f'].' '.$result1['nom_f']);?></td>
		  <td class="centrerdanscase"> <?php echo($result2['nom_quartier']);?></td>
		  <td class="centrerdanscase"> <?php echo($result['password']);?></td>
		  <td class="centrerdanscase"> <?php echo($result['civilite']);?></td>
		  <td class="centrerdanscase"> <?php echo($result['email']);?></td>
		  <td class="centrerdanscase"> <?php echo($result['age']);?></td>
		  <td class="centrerdanscase"> <?php echo($result['numero']);?></td>
		  <td class="centrerdanscase"> <?php echo($result4['contenu'].'<br>'. date('d/m/Y H\h : i\m\i\n',$result4['date_poste']));?></td>
		  <td class="centrerdanscase"> <img src="<?php echo ($result['avatars']);?>"> </td>
          <td class="centrerdanscase"> <?php echo(date('d/m/Y H\h : i\m\i\n',$result['date_inscription']));?>       </td>
          <td class="centrerdanscase"> <?php echo('Etat');?>      </td>
          <td class="centrerdanscase"> <?php echo(date('d/m/Y H\h : i\m\i\n',$result['date_connexion']));?>       </td>
		  <td class="centrerdanscase"> <?php echo($result['ip_membre']);?></td>
         

                 
                  
          <td class="centrerdanscase"> <a href="<?php echo"supp3.php?id_Etu=".$result['id_membre'].""?>"><img src="images/icon-supprimer.jpg" alt="Supp" width="30" height="30"  style="border:0;"></td>
    </tr>
    </form>

  <?php
	   
  }//fin if 
}














 if(isset($_GET["idFormateur"]) AND !empty($_GET["idFormateur"]))
{
   $req=$bdd->prepare('SELECT * FROM formateur WHERE id_formateur=:user');
$ID_Utilisateur  = $_GET["idFormateur"] ;
 $req->execute(array('user'=>$ID_Utilisateur));
 
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


<form name="insertion" action="supp3.php" method="POST">
  <input type="hidden" name="ID_Utilisateur" value="<?php echo($ID_Utilisateur) ;?>">
  <tr> 
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
</tr>
        
       

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
		  <td class="centrerdanscase"> <img src="<?php echo ($result['avatars']);?>"> </td>
		  		  <td class="centrerdanscase"> <?php echo($result['biographie']);?></td>
				  		  <td class="centrerdanscase"> <?php echo($result['experience']);?></td>
				  		  <td class="centrerdanscase"> <?php echo($result['matricule']);?></td>
          <td class="centrerdanscase"> <?php echo(date('d/m/Y H\h : i\m\i\n',$result['date_inscription']));?>       </td>
          <td class="centrerdanscase"> <?php echo('Etat');?>      </td>
          <td class="centrerdanscase"> <?php echo(date('d/m/Y H\h : i\m\i\n',$result['date_connexion']));?>       </td>
		  <td class="centrerdanscase"> <?php echo($result['ip_form']);?></td>
         

                 
                  
          <td class="centrerdanscase"> <a href="<?php echo"supp3.php?id_Form=".$result['id_formateur'].""?>"><img src="images/icon-supprimer.jpg" alt="Supp" width="30" height="30"  style="border:0;"></td>
    </tr>
    </form>

  <?php
	   
  }//fin if 
}
  ?>
</table> 
</body>
</html>