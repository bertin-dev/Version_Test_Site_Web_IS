<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" lang="fr" content="FORMULAIRE D'INSCRIPTION à L'INSTITUT SALOMON">
    <meta name="author" content="Etudiant Bertin Mounok, Dr. Philippe Totto Ndong">
	<meta name="keyword"  lang="fr" content="Centre de formation professionnel,Assistance de Direction Manager, Audit et Controle de Gestion,Communication Leadership et Cohesion d'equipe,Community Management,Conduite et Gestion des Projets,Coutenance,Creation de Charte Graphique,Culture Digitale,Deleguer Efficacement et prendre des Decisions,developpement Mobile,developpement Web,Developper son Potentiel Humain,Developper son propre Leadership,Elaborer un Plan de Management des Risques,Elaborer une DSF,Entreprenariat et Montage de Projet,Excel VBA,Gestion de la Paie,Gestion des Ressources Humaines,Infographie 2D3D4D,Les Fintech,Maintenance des Reseaux Informatiques,Maintenance Informatique,Management Associatif,Management et Leadership,Management_projets,Marketing Digital,Mener Efficacement les Negociations Commerciales,Methode et Outils de Fidelisation de la clientele,Montage Video et Spot,MS Access,MS Project Server Professionnel,Presenter Efficacement vos idees et projets,Redaction d'un Referentiel Projet Propre a Votre Entreprise,Redaction Professionnelle,Rediger un Business Plan,Rediger un cahier de Charge,Rediger un Plan Capacitif,Rediger un Schema Directeur,Sage - Comptabilite,Sage - Gestion commerciale,Sage - Paie,Secretaire,Secretariat Assistance Accueil,Secretariat Bureautique Bilingue,Secretariat Comptable,Web Design ,Bertin_Mounok, Philippe_Totto, Apropos de Nous, portfolio, Contact, Service E-Learning">
	<!-- Icône du site (favicon) -->
	<link rel="icon" type="image/jpg" href="images/logo.jpg" alt="LOGO INSTITUT SALOMON" title="Logo Officiel de l'Institut Salomon"/>
    <title>Inscription | INSTITUT SALOMON</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/animate.min.css" rel="stylesheet">
     
	<link href="css/main.css" rel="stylesheet">
	 <link href="css/responsive.css" rel="stylesheet">
	 <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    
	

  </head>
  <body style="border: 5px dashed black;">

  
<?php
 include 'Database Configuration/config.php';
 include 'configuration serveur/config_server.php';

$ret = $bdd->prepare('SELECT * FROM formateur WHERE numero=:numero');
						$ret->execute(array('numero'=>$_SESSION['contact_F']));
						$prof = $ret->fetch();
						ECHO $id_formateur = $prof['id_formateur'];	
						ECHO '<br>';
						ECHO $filiere_prof = $prof['filiere'];
ECHO '<hr>';


$rfiliere14 = $bdd->prepare('SELECT ref_formateur, nom_filiere, id_filiere FROM membre, filiere WHERE id_filiere=ref_filiere');
						$rfiliere14->execute();
						$rligne14 = $rfiliere14->fetch();
						echo $rligne14['ref_formateur'];
						ECHO '<br>';
						echo $rligne14['nom_filiere'];
						ECHO '<br>';
						echo $rligne14['id_filiere'];
						
if($filiere_prof==$rligne14['nom_filiere'])
						{
						$miseAjour1 = $bdd->prepare('UPDATE membre SET ref_formateur=:nvTimestamp WHERE ref_filiere=:id_filiere');
	                     $miseAjour1->execute(array('nvTimestamp' => $id_formateur, 'id_filiere'=>$rligne14['id_filiere']));
						}



echo 'sml,mcls';

												ECHO '<hr>';
							
							
							
						ECHO '<hr><hr>';
						
			
			
			
ECHO '<>';

						
?>				  

 </body>
  </html>