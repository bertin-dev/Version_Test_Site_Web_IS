<?php session_start();
include('phpscripts/functions.php');
require 'Database Configuration/config.php';
?>
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
	<link rel="icon" type="image/jpg" href="../images/logo.jpg" alt="LOGO INSTITUT SALOMON" title="Logo Officiel de l'Institut Salomon"/>
    <title>Modifier Profil | INSTITUT SALOMON</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/animate.min.css" rel="stylesheet">
     <link href="css/responsive.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	

</head>
<body>
  <?php include_once("analyticstracking.php") ?>   
	<?php include('header.html'); 
	 include 'configuration serveur/config_server.php';
?>




<!-- Page banner end -->
<section id="bodySection">
<div class="container">					
<div class="row">


<?php
if(isset($_GET['etudiant']) AND $_GET['etudiant']==1)
{

$req001=$bdd->prepare('SELECT * FROM membre WHERE numero=:pseudo');
$req001->execute(array('pseudo'=>$_SESSION['contact_Etu']));
$rslt001=$req001->fetch();
$ref_filiere = $rslt001['ref_filiere'];
$ref_quartier = $rslt001['ref_quartier'];
$ref_formateur = $rslt001['ref_formateur'];

//filiere
$req0011=$bdd->prepare('SELECT nom_filiere FROM filiere WHERE id_filiere=:pseudo');
$req0011->execute(array('pseudo'=>$ref_filiere));
$rslt0011=$req0011->fetch();

//quartier
$req0012=$bdd->prepare('SELECT nom_quartier FROM quartier WHERE id_quartier=:pseudo');
$req0012->execute(array('pseudo'=>$ref_quartier));
$rslt0012=$req0012->fetch();

//formateur
$req0013=$bdd->prepare('SELECT nom_f FROM formateur WHERE id_formateur=:pseudo');
$req0013->execute(array('pseudo'=>$ref_formateur));
$rslt0013=$req0013->fetch();
?>	



					
<div class="team col-xs-12 col-lg-12">		
<div class="thumbnail" style="margin-top:em;padding:1em;">
<h3 align="left"><?php echo $rslt001['prenom_membre'];?> >> Modifier Profil</h3>					
</div>
			
<div class="thumbnail" style="background-color:rgba();" >
			<li class="media well well-small" style="background-image:url('pattern17.png');">
			<span>
				<a class="pull-left" href="#">
				
				<img src="<?php echo $rslt001['avatars'];?>" class="img-rounded" id="infos3" width="100px" height="100px" align="">
				 
				</a>
			</span>	
				<div class="media-body" style="background-color:rgba();border-radius:5px; padding:0.5em;">
				<div id="infos1">  
				
					<h3 class="media-heading" style=";">#<?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?></h3>
		
				<div style="background-color:rgba(0,0,0,0.1); font-size:1.1em;margin-top:0.3em;border-left:5px solid rgba(245,76,16,1);padding:0.5em;border-radius:5px;">
					<div style="margin-top:em;"><b>Nom : </b><span style="color:grey;font-weight:bold;"><i> <?php echo $rslt001['nom_membre'];?></i></span></div>
					<div style="margin-top:em;"><b>Prenom : </b><span style="color:grey;font-weight:bold;"><i> <?php echo $rslt001['prenom_membre'];?></i></span></div>
					<div style="margin-top:0.3em;"><b style=""> Age : </b> <span style="color:rgba(0,74,148,1);font-weight:bold;">@<?php echo  $rslt001['age'].' ans';?></span></div>
					<div style="margin-top:0.3em;"><b style=""> Sexe : </b> <span style="color:rgba(0,74,148,1);font-weight:bold;">@<?php if ($rslt001['civilite']=="M") echo'Masculin'; else echo 'Feminin';?></span></div>
					<div style="margin-top:0.3em;"><b style=""> Quartier : </b> <span style="color:grey;font-weight:bold;"><?php echo $rslt0012['nom_quartier'];?></span></div>
					<div style="margin-top:0.3em;"><b> Formateur : </b> <span style="color:grey;font-weight:bold;"><?php echo  $rslt0013['nom_f'];?></span></div>
					<div style="margin-top:0.3em;"><b> Filière : </b> <span style="color:grey;font-weight:bold;"><?php echo  $rslt0011['nom_filiere'];?></span></div>
					<div style="margin-top:0.3em;"><b> Cours Suivi : </b> <span style="color:grey;font-weight:bold;"><?php echo  $rslt001['cours_choisi'];?></span></div>
					<div style="margin-top:0.3em;"><b> Email : </b> <span style="color:grey;font-weight:bold;"><?php echo  $rslt001['email'];?></span></div>
					<div style="margin-top:0.3em;"><b> Numéro de Téléphone : </b> <span style="color:grey;font-weight:bold;"><?php echo  $rslt001['numero'];?></span></div>
					<div style="margin-top:0.3em;"><b> Dernière Connexion : </b> <span style="color:grey;font-weight:bold;"><?php echo  date('d/m/Y  H\h: i \m\i\n', $rslt001['date_connexion']);?></span></div>
					<div style="margin-top:0.3em;"><b> Date d'Inscription : </b> <span style="color:grey;font-weight:bold;"><?php echo  date('d/m/Y  H\h: i \m\i\n' ,$rslt001['date_inscription']);?></span></div>
					<div id="rslt"></div>
				</div>	
				</div>	
					<br/>
					 <div align="right" style="background-color:white;"> 	
							 <button class="btn" style="font-size:1.1em;" title="<?php echo $rslt001['niveau'];?>" name="<?php echo $rslt001['filiere'];?>" id="infos_perso"><b>Modifier Vos Informations personnelles <img src="next.png" width="16px" height="16px"></b></button><br>
								<div style="margin-top:0.2em;display:none;border:0px solid;background-color:rgba(0,0,0,0.12);padding:1em;" id="block_infos" align="left">
									<h4 style="color:rgba(245,76,16,0.8);">Modifier vos informations personnelles...</h4>
									<div id="rapport1" class="" style="display:none;width:px;padding:0.5em;font-size:1.1em;"></div>
									<form class="form-horizontal" id="infos" action="modifications.php?infos=infos&id_membre=<?php echo $rslt001['id_membre'];?>" method="post" enctype="multipart/form-data">
									<fieldset>
										<div class="row-fluid">
											<div class="form-group">
											 <label for="nom">Nom *</label>
												<input type="text" id="nom" value="<?php echo $rslt001['nom_membre'];?>" class="form-control" placeholder="Nom Propre" name="nom" style="font-size:1.6em; height:1.7em;" required>
											</div>
										</div>
										
										<div class="row-fluid">
											<div class="form-group">
											 <label for="prenom">Prenom *</label>
												<input type="text" id="prenom" value="<?php echo $rslt001['prenom_membre'];?>" class="form-control" placeholder="Prenom" name="prenom" style="font-size:1.6em; height:1.7em;" required>
											</div>
										</div>
		                  
                        <div class="row-fluid">						  
						<div class="form-group"><label for="civilite">Civilité <b> *</b> </label>		
                         <input type="radio" required name="sexe" value="M" id="civilite" tabindex="4"><font size="2">  <label>   Homme </label></font>
                         <input type="radio" required name="sexe" value="Mme" id="civilite" tabindex="5"><font size="2">  <label>   Femme</label></font>
			            </div>
						</div>
									   
										<div class="row-fluid">
											<div class="form-group">
											 <label for="email">Email *</label>
												<input type="email" id="email" value="<?php echo $rslt001['email'];?>" class="form-control" placeholder="Ex: institutsalomon@the-builders.org" name="email" style="font-size:1.3em; height:1.7em;" required>
											</div>
										</div>
										<div class="row-fluid">    
											<div class="form-group">
											 <label for="contact">Numéro *</label>
												<input type="tel" id="contact" value="<?php echo $rslt001['numero'];?>" class="form-control" placeholder="Ex: 699564325" name="telephone" style="font-size:1.3em; height:1.7em;" required maxlength="9">
											</div>
										</div>
										<div class="row-fluid">    
											<div class="form-group">
												<label for="filiere">Formation Sollicitée</label>
							 <select id="filiere" name="cours" class="form-control" style="font-size:1.2em; height:2.5em;width:em;" required>
							<optgroup label="MANAGEMENT">
							<option value="Management des Projets">Management des Projets</option>
							<option value="Management Associatif">Management Associatif</option>
							<option value="Gestion des Ressources Humaines">Gestion des Ressources Humaines</option>
							<option value="Audit et Controle de Gestion">Audit et Contrôle de Gestion</option>
							<option value="Gestion de la Paie">Gestion de la Paie</option>
							</optgroup>
							
							<optgroup label="FORMATION CLE EN MAIN">
							<option value="Ms Project Server Professionnel">Ms Project Server Professionnel</option>
							<option value="Ms Access">Ms Access</option>
							<option value="Excel VBA">Excel VBA</option>
							<option value="Entreprenariat et Montage de Projet">Entreprenariat et Montage de Projet</option>
							<option value="Infographie">Infographie 2D/3D/4D</option>
							<option value="Montage Video et Spot">Montage Vidéo et Spot</option>
							<option value="Web Design">Web Design</option>
							<option value="Redaction Professionnelle">Rédaction Professionnelle</option>
							</optgroup>
							
							<optgroup label="FORMATION A LA CARTE">
							<option value="Rediger un Schema Directeur">Rédiger un Schéma Directeur</option>
							<option value="Rediger un Business Plan">Rédiger un Business Plan</option>
							<option value="Rediger un Plan Capacitif">Rédiger un Plan Capacitif</option>
							<option value="Rediger un Cahier de Charge">Rédiger un Cahier de Charge</option>
							<option value="Elaborer un plan de management des risques">Elaborer un plan de management des risques</option>
							<option value="Elaborer une DSF">Elaborer une DSF</option>
							<option value="Redaction d'un Referentiel Projet a votre Entreprise">Rédaction d'un Référentiel Projet à votre Entreprise</option>
							<option value="Creation de charte Graphique">Création de charte Graphique</option>
							</optgroup>
							
							
							<optgroup label="TRAINING DE HAUT NIVEAU">
							<option value="Communication Leadership et cohesion d'equipe">Communication Leadership et cohésion d'équipe</option>
							<option value="Management et Leadership">Management et Leadership</option>
							<option value="Developper son Propre Leadership">Développer son Propre Leadership</option>
							<option value="Developper son Potentiel Humain">Développer son Potentiel Humain</option>
							<option value="Deleguer Efficacement et prendre des decisions">Déléguer Efficacement et prendre des décisions</option>
							<option value="Presenter Efficacement vos idees et projets">Présenter Efficacement vos idées et projets</option>
							<option value="Conduite et Gestion des Projets">Conduite et Gestion des Projets</option>
							<option value="coutenance">coutenance</option>
							</optgroup>
							
							<optgroup label="SECRETARIAT">
							<option value="Assistance de Direction ou Manager">Assistance de Direction/Manager</option>
							<option value="secretaire">Secrétaire</option>
							<option value="secretaire d'assistance ou Accueil">secretaire/assistance/Accueil</option>
							<option value="secretaire Bureautique Bilingue">secrétaire Bureautique Bilingue</option>
							<option value="secretaire Comptable">secrétaire Comptable</option>
							</optgroup>
							
							
								
							<optgroup label="MAINTENANCE">
							<option value="Maintenance Informatique">Maintenance Informatique</option>
							<option value="Maintenance des Reseaux Informatique">Maintenance des Réseaux Informatique</option>
							</optgroup>
							
							<optgroup label="DIGITAL">
							<option value="Culture Digitale">Culture Digitale</option>
							<option value="Marketing Digital">Marketing Digital</option>
							<option value="Fintech">Les Fintech</option>
							<option value="Community Management">Community Management</option>
							</optgroup>
							
							<optgroup label="DEVELOPPEMENT">
							<option value="Applications Web">Applications Web</option>
							<option value="Applications Mobile">Applications Mobile</option>
							</optgroup>
							
							<optgroup label="COMPTABILITE">
							<option value="Sage Comptabilite">Sage - Comptabilité</option>
							<option value="Sage gestion Commerciale">Sage - gestion Commerciale</option>
							<option value="Sage Paie">Sage - Paie</option>
							</optgroup>
							
							<optgroup label="VENTE">
							<option value="Methode et Outils de Fidelisation de la Clientele">Méthode et Outils de Fidélisation de la Clientèle</option>
							<option value="Mener Efficacement les Negociations Commerciales">Mener Efficacement les Négociations Commerciales</option>
							</optgroup>
							
							</select>			
											</div>
										</div>
							

							
							<div class="row-fluid">    							
							<div class="form-group">
                            <label>Quartier <b>*</b></label>
                            <select id="quartier" name="quartier" class="form-control" style="font-size:1.2em; height:2.5em;">
							<option value="Akwa"> Akwa</option>
							<option value="Bali"> Bali</option>
							<option value="Bonaberi"> Bonaberi</option>
							<option value="Bonapriso"> Bonapriso</option>
							<option value="Bonanjo"> Bonanjo</option>
							<option value="Bonamoussadi"> Bonamoussadi</option>
							<option value="Denver"> Denver</option>
							<option value="Santa_Barbara"> Santa Barbara</option>
							<option value="Kotto"> Kotto</option>
							<option value="New_Bell"> New Bell</option>
							<option value="Beedi"> Beedi</option>
							<option value="Hôpital_Général"> Hôpital Général</option>
							<option value="Makepe"> Makepe</option>
							<option value="Cité_des_Palmiers"> Cité des Palmiers</option>
							<option value="Ngodi"> Ngodi</option>
							<option value="Camp_Yabassi"> Camp Yabassi</option>
							<option value="Mboppi"> Mboppi</option>
							<option value="Bepanda"> Bépanda</option>
							<option value="Ange_Raphael"> Ange Raphael</option>
							<option value="Ndogbong"> Ndogbong</option>
							<option value="Yassa"> Yassa</option>
							<option value="Akwa_Nord"> Akwa-Nord</option>
							<option value="Deido"> Deido</option>
							<option value="PK 8"> PK 8</option>
							<option value="PK 9"> PK 9</option>
							<option value="PK 10"> PK 10</option>
							<option value="PK 11"> PK 11</option>
							<option value="PK 12"> PK 12</option>
							<option value="PK 13"> PK 13</option>
							<option value="PK 14"> PK 14</option>
							<option value="Autres"> Autres</option>
							</select>
                        </div>
                        </div>
										
							<div class="row-fluid">
							<div class="form-group">
                            <label>Age <b>*</b></label>
                            <select id="age" name="age" class="form-control" style="font-size:1.2em; height:2.5em;width:em;" required>
							<option value="16"> 16 ans</option>
							<option value="17"> 17 ans</option>
							<option value="18"> 18 ans</option>
							<option value="19"> 19 ans</option>
							<option value="20"> 20 ans</option>
							<option value="21"> 21 ans</option>
							<option value="22"> 22 ans</option>
							<option value="23"> 23 ans</option>
							<option value="24"> 24 ans</option>
							<option value="25"> 25 ans</option>
							<option value="26"> 26 ans</option>
							<option value="27"> 27 ans</option>
							<option value="28"> 28 ans</option>
							<option value="29"> 29 ans</option>
							<option value="30"> 30 ans</option>
							<option value="31"> 31 ans</option>
							<option value="32"> 32 ans</option>
							<option value="33"> 33 ans</option>
							<option value="34"> 34 ans</option>
							<option value="35"> 35 ans</option>
							<option value="36"> 36 ans</option>
							<option value="37"> 37 ans</option>
							<option value="38"> 38 ans</option>
							<option value="39"> 39 ans</option>
							<option value="40"> 40 ans</option>
							<option value="41"> 41 ans</option>
							<option value="42"> 42 ans</option>
							<option value="43"> 43 ans</option>
							<option value="44"> 44 ans</option>
							<option value="45"> 45 ans</option>
							<option value="46"> 46 ans</option>
							<option value="47"> 47 ans</option>
							<option value="48"> 48 ans</option>
							<option value="49"> 49 ans</option>
							<option value="50"> 50 ans</option>
							<option value="plus"> Plus de 50 ans</option>
							</select>
                        </div>
						</div>		
										
										<div style="display:none;" id="uploads">
											<img src="ajax-loader28.gif">
										</div>
										
										<br><br><div align="left" style="margin-top:-1em;">
										<button class="btn-success btn-large" type="submit" >Mettre à jour</button>
										</div>
										
									</fieldset>
								  </form>
							</div>
							
							
							
							<button class="btn" style="font-size:1.1em;" id="infos_pass"><b>Modifier Mot de passe <img src="next.png" width="16px" height="16px"></b></button><br>
							<div id="rapport2" align="left" style="display:none;width:px;padding:0.5em;font-size:1.1em;"></div>
								<div style="margin-top:0.2em;display:none;border:0px solid;background-color:rgba(0,0,0,0.12);padding:1em;" id="block_pass" align="left">
									<h4 style="color:rgba(245,76,16,0.8);">Modification du mot de passe...</h4>
									<form class="form-horizontal" id="pass" action="modifications.php?pass=pass&id_membre=<?php echo $rslt001['id_membre'];?>" method="post" enctype="multipart/form-data">
									<fieldset>
									<div class="row-fluid">    
										<div class="form-group">
											<input type="password" id="mtp" class="form-control" placeholder="Ancien mot de passe" name="pass0" style="font-size:1.3em; height:1.7em;" required>
										</div>
									</div>
									<div class="row-fluid">    
										<div class="form-group">
											<input type="password" id="rmtp" class="form-control" placeholder="Nouveau mot de passe" name="pass1" style="font-size:1.3em; height:1.7em;" required>
										</div>
									</div>
									<div class="row-fluid">    
										<div class="form-group">
											<input type="password" id="rmtp0" class="form-control" placeholder="Confirmer Nouveau mot de passe" name="pass2" style="font-size:1.3em; height:1.7em;" required>
										</div>
									</div>
									
									<div style="display:none;" id="uploads1">
											<img src="ajax-loader28.gif">
									</div>
									
									<br><br><div align="left" style="margin-top:-1em;">
										<button class="btn-success btn-large" type="submit" >Modifier</button>
									</div>
										
									</fieldset>
								  </form>
							</div>  
							   <button class="btn" style="font-size:1.1em;" id="infos_photo"><b>Photo de profil <img src="next.png" width="16px" height="16px"></b></button><br>
								
								<div style="margin-top:0.2em;display:none;border:0px solid;background-color:rgba(0,0,0,0.12);padding:1em;" id="block_photo" align="left">
									<h4 style="color:rgba(245,76,16,0.8);">Changer de photo de profil</h4>
									<div id="rapport3" class="" style="display:none;width:px;padding:0.5em;font-size:1.1em;"></div>
									<form class="form-horizontal" id="photo" action="modifications.php?photo=photo" name="<?php echo $rslt001['avatars'];?>" method="post" enctype="multipart/form-data">
									<fieldset>
									<div class="row-fluid">
											<div class="media-object" >
												<img src="<?php echo $rslt001['avatars'];?>" class="photo" width="" height="">
											</div>
									</div>
									<div class="row-fluid">    
										<div class="form-group">
											<input type="file" id="avatars" class="input-xxlarge"  name="avatars" style="font-size:1.2em; height:1.5em;margin-top:0.2em;border-radius:5px;background-color:rgba(0,0,0,0.2);"> 		
											<input type="submit" id="charger" class="btn-primary" title="Nous rejoindre" style="font-size:1.2em;padding:0.4em;" value="Charger l'image"> 
											<div style="display:none;" id="uploads2">
												<img src="ajax-loaderr.gif">
											</div>
										</div>
									</div>
									
									<br><br><div align="left" style="margin-top:-1em;">
										<button class="btn-success btn-large" type="submit" name="<?php echo $rslt001['id_membre'];?>" id="terminer">Mettre a jour</button>
									</div>
										
									</fieldset>
								  </form>
							</div>   
					</div>
				
				</div>
				
		  </li>	
</div><br>


<br/>
	
</div>

<?php	
}
if(isset($_GET['formateur']) AND $_GET['formateur']==1)
{
	
	
$req001=$bdd->prepare('SELECT * FROM formateur WHERE numero=:pseudo');
$req001->execute(array('pseudo'=>$_SESSION['contact_F']));
$rslt001=$req001->fetch();
$ref_filiere = $rslt001['filiere'];
$ref_quartier = $rslt001['ref_quartier'];

//filiere
$req0011=$bdd->prepare('SELECT nom_filiere FROM filiere WHERE nom_filiere=:pseudo');
$req0011->execute(array('pseudo'=>$ref_filiere));
$rslt0011=$req0011->fetch();

//quartier
$req0012=$bdd->prepare('SELECT nom_quartier FROM quartier WHERE id_quartier=:pseudo');
$req0012->execute(array('pseudo'=>$ref_quartier));
$rslt0012=$req0012->fetch();


?>	



					
<div class="team col-xs-12 col-lg-12">		
<div class="thumbnail" style="margin-top:em;padding:1em;">
<h3 align="left"><?php echo $rslt001['prenom_f'];?> >> Modifier Profil</h3>					
</div>
			
<div class="thumbnail" style="background-color:rgba();" >
			<li class="media well well-small" style="background-image:url('pattern17.png');">
			<span>
				<a class="pull-left" href="#">
				
				<img src="<?php echo $rslt001['avatars'];?>" class="img-rounded" id="infos3" width="100px" height="100px" align="">
				 
				</a>
			</span>	
				<div class="media-body" style="background-color:rgba();border-radius:5px; padding:0.5em;">
				<div id="infos1">  
				
					<h3 class="media-heading" style=";">#<?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h3>
		
				<div style="background-color:rgba(0,0,0,0.1); font-size:1.1em;margin-top:0.3em;border-left:5px solid rgba(245,76,16,1);padding:0.5em;border-radius:5px;">
					<div style="margin-top:em;"><b>Nom : </b><span style="color:grey;font-weight:bold;"><i> <?php echo $rslt001['nom_f'];?></i></span></div>
					<div style="margin-top:em;"><b>Prenom : </b><span style="color:grey;font-weight:bold;"><i> <?php echo $rslt001['prenom_f'];?></i></span></div>
					<div style="margin-top:0.3em;"><b style=""> Sexe : </b> <span style="color:rgba(0,74,148,1);font-weight:bold;">@<?php if ($rslt001['civilite']=="M") echo'Masculin'; else echo 'Feminin';?></span></div>
					<div style="margin-top:0.3em;"><b style=""> Quartier : </b> <span style="color:grey;font-weight:bold;"><?php echo $rslt0012['nom_quartier'];?></span></div>
					<div style="margin-top:0.3em;"><b> Filière : </b> <span style="color:grey;font-weight:bold;"><?php echo  $rslt0011['nom_filiere'];?></span></div>
					<div style="margin-top:0.3em;"><b> Email : </b> <span style="color:grey;font-weight:bold;"><?php echo  $rslt001['email'];?></span></div>
					<div style="margin-top:0.3em;"><b> Numéro de Téléphone : </b> <span style="color:grey;font-weight:bold;"><?php echo  $rslt001['numero'];?></span></div>
					<div style="margin-top:0.3em;"><b> Matricule : </b> <span style="color:grey;font-weight:bold;"><?php echo $rslt001['matricule'];?></span></div>
					<div style="margin-top:0.3em;"><b> Expérience : </b> <span style="color:grey;font-weight:bold;"><?php echo $rslt001['experience'];?></span></div>
					<div style="margin-top:0.3em;"><b> Mini Biographie : </b> <span style="color:grey;font-weight:bold;"><?php echo $rslt001['biographie'];?></span></div>
					<div style="margin-top:0.3em;"><b> Dernière Connexion : </b> <span style="color:grey;font-weight:bold;"><?php echo  date('d/m/Y  H\h: i \m\i\n', $rslt001['date_connexion']);?></span></div>
					<div style="margin-top:0.3em;"><b> Date d'Inscription : </b> <span style="color:grey;font-weight:bold;"><?php echo  date('d/m/Y  H\h: i \m\i\n' ,$rslt001['date_inscription']);?></span></div>
					<div id="rslt"></div>
				</div>	
				</div>	
					<br/>
					 <div align="right" style="background-color:white;"> 	
							 <button class="btn" style="font-size:1.1em;" title="<?php echo $rslt001['niveau'];?>" name="<?php echo $rslt001['filiere'];?>" id="infos_perso"><b>Modifier Vos Informations personnelles <img src="next.png" width="16px" height="16px"></b></button><br>
								<div style="margin-top:0.2em;display:none;border:0px solid;background-color:rgba(0,0,0,0.12);padding:1em;" id="block_infos" align="left">
									<h4 style="color:rgba(245,76,16,0.8);">Modifier vos informations personnelles...</h4>
									<div id="rapport1" class="" style="display:none;width:px;padding:0.5em;font-size:1.1em;"></div>
									<form class="form-horizontal" id="infos" action="modifications.php?prof=prof&id_formateur=<?php echo $rslt001['id_formateur'];?>" method="post" enctype="multipart/form-data">
									<fieldset>
										<div class="row-fluid">
											<div class="form-group">
											 <label for="nom">Nom *</label>
												<input type="text" id="nom" value="<?php echo $rslt001['nom_f'];?>" class="form-control" placeholder="Nom Propre" name="nom" style="font-size:1.6em; height:1.7em;" required>
											</div>
										</div>
										
										<div class="row-fluid">
											<div class="form-group">
											 <label for="prenom">Prenom *</label>
												<input type="text" id="prenom" value="<?php echo $rslt001['prenom_f'];?>" class="form-control" placeholder="Prenom" name="prenom" style="font-size:1.6em; height:1.7em;" required>
											</div>
										</div>
		                  
                        <div class="row-fluid">						  
						<div class="form-group"><label for="civilite">Civilité <b> *</b> </label>		
                         <input type="radio" required name="sexe" value="M" id="civilite" tabindex="4"><font size="2">  <label>   Homme </label></font>
                         <input type="radio" required name="sexe" value="Mme" id="civilite" tabindex="5"><font size="2">  <label>   Femme</label></font>
			            </div>
						</div>
									   
										<div class="row-fluid">
											<div class="form-group">
											 <label for="email">Email *</label>
												<input type="email" id="email" value="<?php echo $rslt001['email'];?>" class="form-control" placeholder="Ex: bertin_Mounok@the-builders.org" name="email" style="font-size:1.6em; height:1.7em;" required>
											</div>
										</div>
										<div class="row-fluid">    
											<div class="form-group">
											 <label for="contact">Numéro *</label>
												<input type="tel" id="contact" value="<?php echo $rslt001['numero'];?>" class="form-control" placeholder="Ex: 699564325" name="telephone" style="font-size:1.6em; height:1.7em;" required maxlength="9">
											</div>
										</div>
										<div class="row-fluid">    
											<div class="form-group">
												<label for="filiere">Formation Dispéssée</label>
							 <select id="filiere" name="cours" class="form-control" style="font-size:1.2em; height:2.5em;width:em;" required>
							<optgroup label="MANAGEMENT">
							<option value="Management des Projets">Management des Projets</option>
							<option value="Management Associatif">Management Associatif</option>
							<option value="Gestion des Ressources Humaines">Gestion des Ressources Humaines</option>
							<option value="Audit et Controle de Gestion">Audit et Contrôle de Gestion</option>
							<option value="Gestion de la Paie">Gestion de la Paie</option>
							</optgroup>
							
							<optgroup label="FORMATION CLE EN MAIN">
							<option value="Ms Project Server Professionnel">Ms Project Server Professionnel</option>
							<option value="Ms Access">Ms Access</option>
							<option value="Excel VBA">Excel VBA</option>
							<option value="Entreprenariat et Montage de Projet">Entreprenariat et Montage de Projet</option>
							<option value="Infographie">Infographie 2D/3D/4D</option>
							<option value="Montage Video et Spot">Montage Vidéo et Spot</option>
							<option value="Web Design">Web Design</option>
							<option value="Redaction Professionnelle">Rédaction Professionnelle</option>
							</optgroup>
							
							<optgroup label="FORMATION A LA CARTE">
							<option value="Rediger un Schema Directeur">Rédiger un Schéma Directeur</option>
							<option value="Rediger un Business Plan">Rédiger un Business Plan</option>
							<option value="Rediger un Plan Capacitif">Rédiger un Plan Capacitif</option>
							<option value="Rediger un Cahier de Charge">Rédiger un Cahier de Charge</option>
							<option value="Elaborer un plan de management des risques">Elaborer un plan de management des risques</option>
							<option value="Elaborer une DSF">Elaborer une DSF</option>
							<option value="Redaction d'un Referentiel Projet a votre Entreprise">Rédaction d'un Référentiel Projet à votre Entreprise</option>
							<option value="Creation de charte Graphique">Création de charte Graphique</option>
							</optgroup>
							
							
							<optgroup label="TRAINING DE HAUT NIVEAU">
							<option value="Communication Leadership et cohesion d'equipe">Communication Leadership et cohésion d'équipe</option>
							<option value="Management et Leadership">Management et Leadership</option>
							<option value="Developper son Propre Leadership">Développer son Propre Leadership</option>
							<option value="Developper son Potentiel Humain">Développer son Potentiel Humain</option>
							<option value="Deleguer Efficacement et prendre des decisions">Déléguer Efficacement et prendre des décisions</option>
							<option value="Presenter Efficacement vos idees et projets">Présenter Efficacement vos idées et projets</option>
							<option value="Conduite et Gestion des Projets">Conduite et Gestion des Projets</option>
							<option value="coutenance">coutenance</option>
							</optgroup>
							
							<optgroup label="SECRETARIAT">
							<option value="Assistance de Direction ou Manager">Assistance de Direction/Manager</option>
							<option value="secretaire">Secrétaire</option>
							<option value="secretaire d'assistance ou Accueil">secretaire/assistance/Accueil</option>
							<option value="secretaire Bureautique Bilingue">secrétaire Bureautique Bilingue</option>
							<option value="secretaire Comptable">secrétaire Comptable</option>
							</optgroup>
							
							
								
							<optgroup label="MAINTENANCE">
							<option value="Maintenance Informatique">Maintenance Informatique</option>
							<option value="Maintenance des Reseaux Informatique">Maintenance des Réseaux Informatique</option>
							</optgroup>
							
							<optgroup label="DIGITAL">
							<option value="Culture Digitale">Culture Digitale</option>
							<option value="Marketing Digital">Marketing Digital</option>
							<option value="Fintech">Les Fintech</option>
							<option value="Community Management">Community Management</option>
							</optgroup>
							
							<optgroup label="DEVELOPPEMENT">
							<option value="Applications Web">Applications Web</option>
							<option value="Applications Mobile">Applications Mobile</option>
							</optgroup>
							
							<optgroup label="COMPTABILITE">
							<option value="Sage Comptabilite">Sage - Comptabilité</option>
							<option value="Sage gestion Commerciale">Sage - gestion Commerciale</option>
							<option value="Sage Paie">Sage - Paie</option>
							</optgroup>
							
							<optgroup label="VENTE">
							<option value="Methode et Outils de Fidelisation de la Clientele">Méthode et Outils de Fidélisation de la Clientèle</option>
							<option value="Mener Efficacement les Negociations Commerciales">Mener Efficacement les Négociations Commerciales</option>
							</optgroup>
							
							</select>			
											</div>
										</div>
							

							
							<div class="row-fluid">    							
							<div class="form-group">
                            <label>Quartier <b>*</b></label>
                            <select id="quartier" name="quartier" class="form-control" style="font-size:1.2em; height:2.5em;">
							<option value="Akwa"> Akwa</option>
							<option value="Bali"> Bali</option>
							<option value="Bonaberi"> Bonaberi</option>
							<option value="Bonapriso"> Bonapriso</option>
							<option value="Bonanjo"> Bonanjo</option>
							<option value="Bonamoussadi"> Bonamoussadi</option>
							<option value="Denver"> Denver</option>
							<option value="Santa_Barbara"> Santa Barbara</option>
							<option value="Kotto"> Kotto</option>
							<option value="New_Bell"> New Bell</option>
							<option value="Beedi"> Beedi</option>
							<option value="Hôpital_Général"> Hôpital Général</option>
							<option value="Makepe"> Makepe</option>
							<option value="Cité_des_Palmiers"> Cité des Palmiers</option>
							<option value="Ngodi"> Ngodi</option>
							<option value="Camp_Yabassi"> Camp Yabassi</option>
							<option value="Mboppi"> Mboppi</option>
							<option value="Bepanda"> Bépanda</option>
							<option value="Ange_Raphael"> Ange Raphael</option>
							<option value="Ndogbong"> Ndogbong</option>
							<option value="Yassa"> Yassa</option>
							<option value="Akwa_Nord"> Akwa-Nord</option>
							<option value="Deido"> Deido</option>
							<option value="PK 8"> PK 8</option>
							<option value="PK 9"> PK 9</option>
							<option value="PK 10"> PK 10</option>
							<option value="PK 11"> PK 11</option>
							<option value="PK 12"> PK 12</option>
							<option value="PK 13"> PK 13</option>
							<option value="PK 14"> PK 14</option>
							<option value="Autres"> Autres</option>
							</select>
                        </div>
                        </div>
												
										
										<div class="row-fluid">
										<div class="form-group">
                            <label>Profession<b>*</b></label>
                            <select name="experience" required class="form-control" style="font-size:1.2em; height:2.5em;width:em;" required>
							<option value="Prof"> Professeur </option>
							<option value="Dr"> Docteur </option>
							<option value="Expert Comptable"> Expert Comptable</option>
							<option value="Ingénieur"> Ingénieur </option>
							<option value="Enseignant"> Enseignant </option>
							<option value="Consultant"> Consultant </option>
							<option value="Eleve_Ingénieur"> Elève Ingénieur </option>
							<option value="Comptable"> Comptable </option>
							<option value="Entrepreneur"> Entrepreneur </option>
							<option value="Etudiant"> Etudiant </option>
							<option value="Informaticien"> Informaticien </option>
							<option value="Directeur des Systèmes d'Informations"> Directeur des Systèmes d'Informations </option>
							<option value="Manageur"> Manageur </option>
							<option value="Marketeur"> Marketeur </option>
							<option value="Infographe"> Infographe </option>
							<option value="Rédacteur"> Rédacteur </option>
							<option value="Commerciale"> Commerciale </option>
							<option value="Communicateur"> Communicateur </option>
							<option value="Secretaire"> secretaire </option>
							</select>
                        </div>
								</div>		
										
										
										<div class="row-fluid">
											<div class="form-group">
						   
						    
							<label>Matricule Enseignant <b>*</b></label>
                            <input type="text" class="form-control" placeholder="Ex: 17IS24329" name="matricule" required maxlength="9">
						
                            <label for="biographie">Mini Biographie </label><br>
                            <textarea name="biographie" id="biographie" class="form-control">
							<?php if(isset($_POST['biographie'])){echo $_POST['biographie'];}?>
							</textarea>
							
							</div>
                        </div>
										
										<div style="display:none;" id="uploads">
											<img src="ajax-loader28.gif">
										</div>
										
										<br><br><div align="left" style="margin-top:-1em;">
										<button class="btn-success btn-large" type="submit" >Mettre à jour</button>
										</div>
										
									</fieldset>
								  </form>
							</div>
							
							
							
							<button class="btn" style="font-size:1.1em;" id="infos_pass"><b>Modifier Mot de passe <img src="next.png" width="16px" height="16px"></b></button><br>
							<div id="rapport2" align="left" style="display:none;width:px;padding:0.5em;font-size:1.1em;"></div>
								<div style="margin-top:0.2em;display:none;border:0px solid;background-color:rgba(0,0,0,0.12);padding:1em;" id="block_pass" align="left">
									<h4 style="color:rgba(245,76,16,0.8);">Modification du mot de passe...</h4>
									<form class="form-horizontal" id="pass" action="modifications.php?passf=passf&id_formateur=<?php echo $rslt001['id_formateur'];?>" method="post" enctype="multipart/form-data">
									<fieldset>
									<div class="row-fluid">    
										<div class="form-group">
											<input type="password" id="mtp" class="form-control" placeholder="Ancien mot de passe" name="pass0" style="font-size:1.3em; height:1.7em;" required>
										</div>
									</div>
									<div class="row-fluid">    
										<div class="form-group">
											<input type="password" id="rmtp" class="form-control" placeholder="Nouveau mot de passe" name="pass1" style="font-size:1.6em; height:1.7em;" required>
										</div>
									</div>
									<div class="row-fluid">    
										<div class="form-group">
											<input type="password" id="rmtp0" class="form-control" placeholder="Confirmer Nouveau mot de passe" name="pass2" style="font-size:1.6em; height:1.7em;" required>
										</div>
									</div>
									
									<div style="display:none;" id="uploads1">
											<img src="ajax-loader28.gif">
									</div>
									
									<br><br><div align="left" style="margin-top:-1em;">
										<button class="btn-success btn-large" type="submit" >Modifier</button>
									</div>
										
									</fieldset>
								  </form>
							</div>  
							   <button class="btn" style="font-size:1.1em;" id="infos_photo"><b>Photo de profil <img src="next.png" width="16px" height="16px"></b></button><br>
								
								<div style="margin-top:0.2em;display:none;border:0px solid;background-color:rgba(0,0,0,0.12);padding:1em;" id="block_photo" align="left">
									<h4 style="color:rgba(245,76,16,0.8);">Changer de photo de profil</h4>
									<div id="rapport3" class="" style="display:none;width:px;padding:0.5em;font-size:1.1em;"></div>
									<form class="form-horizontal" id="photo" action="modifications.php?photo=photo" name="<?php echo $rslt001['avatars'];?>" method="post" enctype="multipart/form-data">
									<fieldset>
									<div class="row-fluid">
											<div class="media-object" >
												<img src="<?php echo $rslt001['avatars'];?>" class="photo" width="" height="">
											</div>
									</div>
									<div class="row-fluid">    
										<div class="form-group">
											<input type="file" id="avatars" class="input-xxlarge"  name="avatars" style="font-size:1.2em; height:1.5em;margin-top:0.2em;border-radius:5px;background-color:rgba(0,0,0,0.2);"> 		
											<input type="submit" id="charger" class="btn-primary" title="Nous rejoindre" style="font-size:1.2em;padding:0.4em;" value="Charger l'image"> 
											<div style="display:none;" id="uploads2">
												<img src="ajax-loaderr.gif">
											</div>
										</div>
									</div>
									
									<br><br><div align="left" style="margin-top:-1em;">
										<button class="btn-success btn-large" type="submit" name="<?php echo $rslt001['id_formateur'];?>" id="terminer">Mettre a jour</button>
									</div>
										
									</fieldset>
								  </form>
							</div>   
					</div>
				
				</div>
				
		  </li>	
</div><br>


<br/>
	
</div>

	
<?php		
}
?>	
<!-- Sidebar comumn -->

</div>
</div>
</div>
</section>
 <!-- Footer
  ================================================== -->
<?php include('footer.html');?>
	   <?php include_once("conditions d'utilisation.html") ?>
	   <?php include_once("login.php") ?>
<span id="themesBtn"></span>
 <script src="jquery.js"></script>
    <script>
     $(function () {
  
		$('#infos_perso').click(function(){
		var element = $(this);	
		var I = element.attr("name");
		var J = element.attr("title");
		$('#block_infos').toggle();
		$('#filiere').val(I);
		$('#niveau').val(J);
		
		});
		
		$('#infos_pass').click(function(){

		$('#block_pass').toggle();	
		});

		$('#infos_photo').click(function(){

		$('#block_photo').toggle();	
		});
/**************************************************************************/
       $('#infos').on('submit', function (e) {
        // On empêche le navigateur de soumettre le formulaire
        e.preventDefault();
		$('#uploads').show();
        var $form = $(this);
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();
 
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            contentType: false, // obligatoire pour de l'upload
            processData: false, // obligatoire pour de l'upload
            dataType: 'html', // selon le retour attendu
            data:data,
            success:function(data){
				$('#uploads').hide();
				$('#rapport1').html('<br><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><p><b><i>'+data+'</i></b></p></div>').show();
				$('#infos1').load('infos_perso.php',function(){
					
				});
			
	}
           
       });
        });      


		$('#pass').on('submit', function (e) {
        // On empêche le navigateur de soumettre le formulaire
        e.preventDefault();
		$('#uploads1').show();
        var $form = $(this);
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();
 
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            contentType: false, // obligatoire pour de l'upload
            processData: false, // obligatoire pour de l'upload
            dataType: 'html', // selon le retour attendu
            data:data,
            success:function(data){
			$('#uploads1').hide();	
			$('#rapport2').html('<br><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><p><b><i>'+data+'</i></b></p></div>').show();
				
	}
           
       });
        });
/***********************************************/


	 
/************************************************************/
	$('#photo').on('submit', function (e) {
        // On empêche le navigateur de soumettre le formulaire
        e.preventDefault();
		$('.uploads2').show();
        var $form = $(this);
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();
		var element = $(this);	
		var I = element.attr("name");
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            contentType: false, // obligatoire pour de l'upload
            processData: false, // obligatoire pour de l'upload
            dataType: 'html', // selon le retour attendu
            data: data,
            success:function(data){
				
				$('.photo').attr('src',data);
				$('.photo').attr('width','');
				$('.photo').attr('height','');
				$('#charger').replaceWith('<input type="submit" id="annuler" class="btn-success" title="Nous rejoindre" style="font-size:1.2em;padding:0.4em;" value="Annuler">')
				$('.uploads2').hide();
				$('#annuler').click(function(){
	
							$('#annuler').replaceWith('<input type="submit" id="charger" class="btn-primary" title="Nous rejoindre" style="font-size:1.2em;padding:0.4em;" value="Charger l\image">');
							$('.photo').attr('src',I);
							$('.photo').attr('width','150px');
							$('.photo').attr('height','150px');
							$('#avatars').replaceWith('<input type="file" id="avatars" class="input-xxlarge"  name="avatars" style="font-size:1.2em; height:1.5em;margin-top:0.2em;border-radius:5px;background-color:rgba(0,0,0,0.2);">');
		});
	}
           
       })
        });	


		$('#terminer').click(function (){
        
		var element = $(this);	
		var I = element.attr("name");
		$('#uploads2').show();
        $.ajax({
            url:'modifications.php?ok=ok&id_membre='+I,
            type:'post',
            data:'terminer=ok',
            success:function(data){
				$('#uploads2').hide();
				$('#rapport3').html('<br><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><p><b><i>'+data+'</i></b></p></div>').show();
				
				$('body').load('mise_a_jour.php', function() {
				
      });
					
				
	}		
           
       });
        });



$('#terminer').click(function (){
        
		var element = $(this);	
		var I = element.attr("name");
		$('#uploads2').show();
        $.ajax({
            url:'modifications.php?okay=okay&id_formateur='+I,
            type:'post',
            data:'terminer=ok',
            success:function(data){
				$('#uploads2').hide();
				$('#rapport3').html('<br><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><p><b><i>'+data+'</i></b></p></div>').show();
				
				$('body').load('mise_a_jour.php', function() {
				
      });
					
				
	}		
           
       });
        });		
	});
	
/***********************************************************/
	  
	  
   </script>
	  
</body>
</html>