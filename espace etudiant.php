<?php session_start();?>

<?php
 include 'Database Configuration/config.php';
 include 'configuration serveur/config_server.php';
 $success='';
 // Envoi du mail d'activation
                              $sujet = "Activation de votre compte utilisateur";
                              
                         $msg = " Ce mail vous a été envoyer car il a été enregistré lors de l'inscription sur le \n";
                         $msg .= "site web de l'institut Salomon Pour valider votre inscription, merci de cliquer sur le lien suivant :\n";
                         //$message .= "http://" . $_SERVER["SERVER_NAME"];
                          $msg .= 'http://'.$_SERVER['HTTP_HOST'];
                         //$end=end(explode('/',$_SERVER['PHP_SELF']));
						 
						 /*$a=explode('/',$_SERVER['PHP_SELF']);
						 $end=end($a);*/
						 
					     $end=current(array_reverse(explode('/', $_SERVER['PHP_SELF'])));
                         
						 $rep=str_replace($end,'',$_SERVER['PHP_SELF']);
                         $msg .= $msg.$rep.'<a href=activer-compte-utilisateur.php?id='.$_SESSION['dernier']; //"mysql_insert_id();
                         $msg .= '&clef='. $_SESSION['clef_activation'].'>Lien</a>';
                              
							  
							  
							  /* Pour envoyer le courrier HTML, vous pouvez mettre l'en-tête du Contenu-type */
                          $headers  = 'MIME-Version: 1.0' . "\r\n";
                          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                             /* additional headers */
                          $headers .= "To: ".$_SESSION['prenom_Etu'].' '.$_SESSION['nom_Etu']." <".$_SESSION['email_Etu'].">\r\n";
                          $headers .= "From: Site <info@the-Builders.org>\r\n";



                              // Si une erreur survient
                              if(!@mail($_SESSION['email_Etu'], $sujet, $msg, $headers))
                              {
                                   $success = "Une erreur est survenue lors de l'envoi du mail d'activation<br />\n";
                                   $success .= "Veuillez contacter l'administrateur afin d'activer votre compte<br/>".'<br>';
								   $success .= ''.$msg;  
                              }
                              else
                              {
                                   
                                   // Message de confirmation
                                   $success = "Votre compte utilisateur a partiellement été créée<br />\n";
                                   $success .= "Un email vient de vous être envoyé afin de l'activer\n";
                                   $suppression = $bdd->prepare('DELETE FROM membre, etat WHERE membre.date_inscription <"'.(time() - 172800).'" AND etat.etat_compte=0"');    
                              }
							  
							  
							  
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
	<link rel="icon" type="image/jpg" href="images/logo.jpg" alt="LOGO INSTITUT SALOMON" title="Logo Officiel de l'Institut Salomon"/>
    <title>RESULTATS | INSTITUT SALOMON</title>

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
  
  
  
  
  <div class="panel panel-default"  id="plan">
   <div id="rapport" class="alert alert-danger" style="display:none;"></div>
  
  <div id="inscription">
  <?php
  echo $success;
  
  ?>
  </div>
  
  
  
  
  </div>
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
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
	  
	
	
  </body>
</html>