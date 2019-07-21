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
  <body class="homepage">
<?php include_once("analyticstracking.php") ?>   
<?php include('header.html'); ?>
		
	<div class="map wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="index.php" title="Accueil | INSTITUT SALOMON"><i class="fa fa-home fa-2x"></i></a><i class="icon-angle-right"></i></li>
					<li class="active" title="Inscrivez-vous Ici">Service E-Learning</li>
				</ul>
			</div>
	</div>
	
	
	<section id="contact-page" style="background-image: url('images/services/bg_services.jpg'); color: white!important;">
        <div class="container">
		
			
			
            <center><h1>INSCRIPTIONS <small><u>En Ligne </u></small></h1>
                <p class="lead">Les champs mentionnés par<b> * </b>sont obligatoires</p>
				</center>
            <div class="row contact-wrap wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.9s"> 
               
			
			
			 <div class="col-sm-12 wow fadeInDown" style="margin: auto;">
                    <div class="accordion">
                        <div class="panel-group" id="accordion1">
						
		
                          <div class="panel panel-default"  id="plan">
						  <div id="rapport" class="alert alert-danger" style="display:none;"></div>
                            <div class="panel-heading active">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#espace_etudiant"><center>ESPACE ETUDIANT</center></a></h3>
                            </div>

                            <div id="espace_etudiant" class="panel-collapse collapse in">
                              <div style="background-image: url('arriereentete2.jpg');">
                                  <div class="media accordion-inner">
                                        <div class="media-body">
                                             
											 <form id="inscription" class="contact-form" name="contact-form" method="post" action="traitement.php?inscription=inscription" enctype="multipart/form-data">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Nom *</label>
                            <input type="text" id="nomE" name="nomE" class="form-control" required="required" placeholder="Entrez votre nom" value="<?php if(isset($_POST['nomE'])){echo $_POST['nomE'];}?>">
                        </div>
						
						<div class="form-group">
                            <label>Prenom *</label>
                            <input type="text" id="prenomE" name="prenomE" class="form-control" required="required" placeholder="Entrez votre prenom" value="<?php if(isset($_POST['prenomE'])){echo $_POST['prenomE'];}?>">
                        </div>
						
						<div class="form-group"><label for="civilite">Civilité <b> *</b> </label>		
                         <input type="radio" required name="sexe" value="M" id="civilite" tabindex="4"><font size="2">  <label>   Homme </label></font>
                         <input type="radio" required name="sexe" value="Mme" id="civilite" tabindex="5"><font size="2">  <label>   Femme</label></font>
			            </div>
						
						
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" id="emailE" name="emailE" class="form-control" required="required" placeholder="Ex: institutsalomon@the-builders.org" value="<?php if(isset($_POST['emailE'])){echo $_POST['emailE'];}?>">
                        </div>
						
                        <div class="form-group">
                            <label>Téléphone <b>*</b></label>
                            <input type="tel" class="form-control" placeholder="Ex: 695903367" maxlength="9" id="telephoneE" name="telephoneE" required value="<?php if(isset($_POST['telephoneE'])){echo $_POST['telephoneE'];}?>" >
                        </div>
						
						<div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg" required="required">INSCRIPTION</button>
                        </div>
						
						
						<div id="rapport" class="alert alert-danger" style="display:none;"></div>
		<div>
			&nbsp &nbsp <img src="ajax-loader31.gif" class="uploads" style="display:none;">
		</div>
						
						
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="coursE">Formation Sollicitée</label>
                            <select id="coursE" name="coursE" class="form-control" required>
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
						
						<div class="form-group">
                            <label>Quartier <b>*</b></label>
                            <select id="quartierE" name="quartierE" class="form-control">
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
						
						<div class="form-group">
                            <label>Age <b>*</b></label>
                            <select id="ageE" name="ageE" class="form-control">
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
						
						<div class="form-group">
                            <label>Mot de Passe <b>*</b></label>
                            <input type="password" class="form-control" placeholder="Password" id="passE" name="passE" required>
                        </div>
						
						<div class="form-group">
                            <label>Confirmez le Mot de Passe <b>*</b></label>
                            <input type="password" class="form-control" placeholder="Password" id="pass_confirmE" name="pass_confirmE" required>
                        </div>
						
                        
                    </div>
                </form>
                                        </div>
                                  </div>
                              </div>
                            </div>
                          </div>
						  
<!--------------------------------------------------------------------------------------------ESPACE FORMATEUR------------------------------------->						  
						  <div class="panel panel-default"  id="formateur">
						  <div id="rapport" class="alert alert-danger" style="display:none;"></div>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#espace_formateur"><center>ESPACE FORMATEUR</center></a></h3>
                            </div>
                            <div id="espace_formateur" class="panel-collapse collapse">
                              <div class="panel-body" style="background-image: url('arriereentete2.jpg');">
                                 
								  <form id="envoi" class="contact-form" name="contact-form" method="post" action="execution.php?envoi=envoi" enctype="multipart/form-data">
				
                    <div class="col-sm-5 col-sm-offset-1">
			
					
                        <div class="form-group">
                            <label>Nom *</label>
                            <input type="text" name="nomF" class="form-control" required="required" placeholder="Entrez votre nom" value="<?php if(isset($_POST['nomF'])){echo $_POST['nomF'];}?>" autofocus>
                        </div>
						
						<div class="form-group">
                            <label>Prenom *</label>
                            <input type="text" name="prenomF" class="form-control" required="required" placeholder="Entrez votre prenom" value="<?php if(isset($_POST['prenomF'])){echo $_POST['prenomF'];}?>">
                        </div>
						
						<div class="form-group">		
                         <input type="radio" required name="sexe" value="M" id="sexeM" tabindex="4"><font size="2"><label> Homme </label></font>
                         <input type="radio" required name="sexe" value="Mme" id="sexeF" tabindex="5"><font size="2"><label> Femme</label></font>
			            </div>
						
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="emailF" class="form-control" required="required" placeholder="Ex: cyrille@yahoo.fr" value="<?php if(isset($_POST['emailF'])){echo $_POST['emailF'];}?>">
                        </div>
						
                        <div class="form-group">
                            <label>Contact <b>*</b></label>
                            <input type="tel" class="form-control" placeholder="Ex: 677463029" maxlength="9" name="telephoneF" required value="<?php if(isset($_POST['telephoneF'])){echo $_POST['telephoneF'];}?>" max="9" min="3">
                        </div>
						
						<div class="form-group">
                            <label>Profession<b>*</b></label>
                            <select name="experience" required class="form-control">
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
						
						<div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg" required="required">INSCRIPTION</button>
                        </div>
						
						<div id="rapport2" class="alert alert-danger" style="display:none;"></div>
		<div>
			&nbsp &nbsp <img src="ajax-loader31.gif" class="uploads" style="display:none;">
		</div>
		
		
                    </div>
					<div class="col-sm-5">
                    <div class="form-group">
                            <label for="coursF">Formation Dispensée</label>
                            <select id="coursF" name="coursF" class="form-control" required>
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
							<option value="Presenter Efficacement vos idees et projets">Elaborer un plan de management des risques</option>
							<option value="Conduite et Gestion des Projets">Elaborer une DSF</option>
							<option value="coutenance">Rédaction d'un Référentiel Projet à votre Entreprise</option>
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
						
						<div class="form-group">
                            <label>Quartier <b>*</b></label>
                            <select name="quartier" class="form-control">
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
							<option value="PK8"> PK 8</option>
							<option value="PK_9"> PK 9</option>
							<option value="PK_10"> PK 10</option>
							<option value="PK_11"> PK 11</option>
							<option value="PK_12"> PK 12</option>
							<option value="PK_13"> PK 13</option>
							<option value="PK_14"> PK 14</option>
							<option value="Autres"> Autres</option>
							</select>
                        </div>
						
						
						<div class="form-group">
                            <label>Mot de Passe <b>*</b></label>
                            <input type="password" class="form-control" placeholder="Password" name="passF" required>
                        </div>
						
						<div class="form-group">
                            <label>Confirmez le Mot de Passe <b>*</b></label>
                            <input type="password" class="form-control" placeholder="Password" name="pass_confirmF" required>
                        </div>
						
						<div class="form-group">
						   
						    
							<label>Matricule Enseignant <b>*</b></label>
                            <input type="text" class="form-control" placeholder="Ex: 17IS24329" name="matriculeF" required maxlength="9">
						
                            <label for="biographie">Mini Biographie </label><br>
                            <textarea name="biographie" id="biographie" class="form-control">
							<?php if(isset($_POST['biographie'])){echo $_POST['biographie'];}?>
							</textarea>
							
							
                        </div>
                        
                    </div>
                </form>
								 
             </div>
        </div>
    </div>
		</div>				  
						  
						  
						  </div>
                            </div>
                          </div>
						  
	
            </div><!--/.row--> 
        </div><!--/.container-->
    </section><!--/#contact-page-->

    <?php include('footer.html'); ?>
	<?php include_once("conditions d'utilisation.html") ?>
	<?php include_once("login.php") ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>   
    <script src="js/wow.min.js"></script>
	<script src="js/main.js"></script>
	
	
	<!--code JQUERY***********************************-->
    <script src="jquery.js"></script>
    <script>
      $(function() {
		  
				
		  $('#inscription').on('submit', function (e) {
        // On empêche le navigateur de soumettre le formulaire
        e.preventDefault();
		$('.uploads').show();
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
			var test=$('#rapport').html(data).show();
			$('.uploads').hide();
				
			    
	}
           
       });
        });
	  });
		  
      </script>
	  
	  
	  
	  
	  
	  
	  
	  
	  <script>
      $(function() {
		  
				
		  $('#envoi').on('submit', function (e) {
        // On empêche le navigateur de soumettre le formulaire
        e.preventDefault();
		$('.uploads').show();
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
			var test=$('#rapport2').html(data).show();
			$('.uploads').hide();
				
			    
	}
           
       });
        });
	  });
		  
      </script>
	  
	
	
  </body>
</html>