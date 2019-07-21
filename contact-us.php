<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" lang="fr" content="Nous Contacter à L'INSTITUT SALOMON">
    <meta name="author" content="Etudiant Bertin Mounok, Dr. Philippe Totto Ndong">
	<meta name="keyword"  lang="fr" content="Centre de formation professionnel,Assistance de Direction Manager, Audit et Controle de Gestion,Communication Leadership et Cohesion d'equipe,Community Management,Conduite et Gestion des Projets,Coutenance,Creation de Charte Graphique,Culture Digitale,Deleguer Efficacement et prendre des Decisions,developpement Mobile,developpement Web,Developper son Potentiel Humain,Developper son propre Leadership,Elaborer un Plan de Management des Risques,Elaborer une DSF,Entreprenariat et Montage de Projet,Excel VBA,Gestion de la Paie,Gestion des Ressources Humaines,Infographie 2D3D4D,Les Fintech,Maintenance des Reseaux Informatiques,Maintenance Informatique,Management Associatif,Management et Leadership,Management_projets,Marketing Digital,Mener Efficacement les Negociations Commerciales,Methode et Outils de Fidelisation de la clientele,Montage Video et Spot,MS Access,MS Project Server Professionnel,Presenter Efficacement vos idees et projets,Redaction d'un Referentiel Projet Propre a Votre Entreprise,Redaction Professionnelle,Rediger un Business Plan,Rediger un cahier de Charge,Rediger un Plan Capacitif,Rediger un Schema Directeur,Sage - Comptabilite,Sage - Gestion commerciale,Sage - Paie,Secretaire,Secretariat Assistance Accueil,Secretariat Bureautique Bilingue,Secretariat Comptable,Web Design ,Bertin_Mounok, Philippe_Totto, Apropos de Nous, portfolio, Contact, Service E-Learning">
	<!-- Icône du site (favicon) -->
	<link rel="icon" type="image/jpg" href="images/logo.jpg" alt="LOGO INSTITUT SALOMON" title="Logo Officiel de l'Institut Salomon"/>
    <title>Contact | INSTITUT SALOMON</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">      
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
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.595559914932!2d9.746348217443854!3d4.044491300000019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10610d0c59acf439%3A0x88c7ca743e1a7993!2sLAIC+DE+PK+8!5e1!3m2!1sfr!2scm!4v1472345990228" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	
<?php	
	  if(isset($_POST['submit']))
  {
    require 'Database Configuration/config.php';
	include 'configuration serveur/config_server.php';
	
	 if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) // On vérifie qu'on a bien rentré une adresse e-mail valide.
        {
			$msg = 'email non conforme!';
		}
	else
	{
	$_POST['name'] = addslashes($_POST['name']);
	addslashes($_POST['numero']);
	addslashes($_POST['subject']);
	$_POST['message'] = addslashes($_POST['message']);

	
	
	$result = $bdd->prepare('INSERT INTO message (nom_exp, email_msg, numero_msg, sujet_msg, contenu, date_reception_msg) VALUES (?, ?, ?, ?, ?, ?)');
	$result->execute(array($_POST['name'], $_POST['email'], $_POST['numero'], $_POST['subject'], $_POST['message'], time()));
	
	if(!$result)
    $msg="Echec d'Envoi!!!";
    else
	$msg="Envoi Effectué avec Succès!!!";
	}
  }


?>

	
	
	<section id="contact-page" style="background:url('pattern17.png')">
        <div class="container">
            <center><h2>Déposer Votre Message</h2>
                <p class="lead">Pour toute Suggestion ou information Supplémentaire, Veuillez-remplir ce formulaire S.V.P. Vous serez Notifié par mail afin de répondre à votre préoccupation</p></center>
            <div class="row contact-wrap wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.9s"> 
                <div class="status alert alert-success" style="display: none"></div>
                <?php	
				if(isset($msg) AND $msg=='Envoi Effectué avec Succès!!!')
				echo '<div class="status alert alert-success" style="display: block">'.$msg.'</div>';
			   
			   else if(isset($msg) AND $msg=='Echec d\'Envoi!!!')
			   echo '<div class="status alert alert-warning" style="display: block">'.$msg.'</div>';
		      
			   else if(isset($msg) AND $msg=='email non conforme!')
			   echo '<div class="status alert alert-danger" style="display: block">'.$msg.'</div>';
			     ?>
				
				
				<form class="contact-form" name="contact-form" method="post" action="Contact-us.php">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label style="color: black;">Nom *</label>
                            <input type="text" name="name" class="form-control" required="required" placeholder="Entrez votre nom">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">E-mail *</label>
                            <input type="email" name="email" class="form-control" required="required" placeholder="Votre mail">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Téléphone *</label>
                            <input type="number" class="form-control" placeholder="Votre Numero" name="numero">
                        </div>                       
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label style="color: black;">Sujet *</label>
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Sujet">
                        </div>
                        <div class="form-group">
                            <label style="color: black;">Message *</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Votre Message"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Envoyez votre Message</button>
                        </div>
                    </div>
                </form>



				
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
  </body>
</html>