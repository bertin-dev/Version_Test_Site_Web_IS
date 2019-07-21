<?php
session_start();
require "Database Configuration/config.php";
include("connectes.php");
include("Vues.php");
// Redirige l'utilisateur s'il est déjà identifié
if(isset($_COOKIE["ID_UTILISATEUR"]))
{
     header("Location: index.php");
}
else
{
     
     // Vérifie que de bonnes valeurs sont passées en paramètres
     if(!preg_match('/^[0-9]+$/', $_GET["id"]) || !preg_match('/^[a-f0-9]{8}$/', strtolower($_GET["clef"])))
     {
          header("Location: index.php");
     }
     else
     {
          
          // Connexion à la base de données
          // Valeurs à modifier selon vos paramètres configuration
            include 'configuration serveur/config_server.php';
          
          // Sélection de l'utilisateur concerné
          /*$result = mysql_query("
               SELECT ID_Utilisateur
                    , Compte_Active
                    , Clef_Activation
               FROM Comptes_Utilisateurs
               WHERE ID_Utilisateur = '" . $_GET["id"] . "'
               AND Clef_Activation = '" . strtolower($_GET["clef"]) . "'
          ");*/
          
		  
			   
			
			$result=$bdd->prepare('SELECT COUNT(*) FROM membre WHERE id_membre=:membre AND clef_activation=:clef');
            $result->execute(array('membre'=>$_GET['id'], 'clef'=>$_GET["clef"]));

			
          // Si une erreur survient
          if(!$result)
          {
               $message = "Une erreur est survenue lors de l'activation de votre compte utilisateur";
          }
          else
          {
               
               // Si aucun enregistrement n'est trouvé
               if($result->fetchColumn() == 0)
               {
                    header("Location: index.php");
               }
               else
               {
                    
                    // Récupération du tableau de données retourné
                    //$row = mysql_fetch_array($result);
					
					$retour=$bdd->prepare('SELECT COUNT(*) FROM membre WHERE id_membre=:membre AND clef_activation=:clef');
                    $retour->execute(array('membre'=>$_GET['id'], 'clef'=>strtolower($_GET["clef"])));
				    $row = $retour->fetch();
                    
                    // Vérification que le compte ne soit pas déjà activé
                    if($row["Compte_Active"] != 0)
                    {
                         $message = "Votre compte utilisateur a déjà été activé";
                    }
                    else
                    {
                         
                         /* Activation du compte utilisateur
                         $result = mysql_query("
                              UPDATE Comptes_Utilisateurs
                              SET Compte_Active = '1'
                              WHERE ID_Utilisateur = '" . $_GET["id"] . "'
                              AND Clef_Activation = '" . strtolower($_GET["clef"]) . "'
                         ");
						 */
						 
						 $modif = $bdd->prepare('UPDATE membre SET etat_compte=:id WHERE id_membre='.$_GET["id"].'AND clef_activation='.strtolower($_GET["clef"]));
	                     $modif->execute(array('id' => 1));
                         
                         // Si une erreur survient
                         if(!$modif)
                         {
                              $message = "Une erreur est survenue lors de l'activation de votre compte utilisateur";
                         }
                         else
                         {
                              $message = "Votre compte utilisateur a correctement été activé";
                         }
                         
                    }
                          // Fermeture de la connexion à la base de données
                          $retour->closeCursor();
          
               }
               
          }
          
    
     }
     
}

?>
<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" lang="fr" content="HOME PAGE DE L'INSTITUT SALOMON">

    <meta name="author" content="Etudiant Bertin Mounok, Dr. Philippe Totto Ndong">

	<meta name="keyword"  lang="fr" content="Centre de formation professionnel,Assistance de Direction Manager, Audit et Controle de Gestion,Communication Leadership et Cohesion d'equipe,Community Management,Conduite et Gestion des Projets,Coutenance,Creation de Charte Graphique,Culture Digitale,Deleguer Efficacement et prendre des Decisions,developpement Mobile,developpement Web,Developper son Potentiel Humain,Developper son propre Leadership,Elaborer un Plan de Management des Risques,Elaborer une DSF,Entreprenariat et Montage de Projet,Excel VBA,Gestion de la Paie,Gestion des Ressources Humaines,Infographie 2D3D4D,Les Fintech,Maintenance des Reseaux Informatiques,Maintenance Informatique,Management Associatif,Management et Leadership,Management_projets,Marketing Digital,Mener Efficacement les Negociations Commerciales,Methode et Outils de Fidelisation de la clientele,Montage Video et Spot,MS Access,MS Project Server Professionnel,Presenter Efficacement vos idees et projets,Redaction d'un Referentiel Projet Propre a Votre Entreprise,Redaction Professionnelle,Rediger un Business Plan,Rediger un cahier de Charge,Rediger un Plan Capacitif,Rediger un Schema Directeur,Sage - Comptabilite,Sage - Gestion commerciale,Sage - Paie,Secretaire,Secretariat Assistance Accueil,Secretariat Bureautique Bilingue,Secretariat Comptable,Web Design ,Bertin_Mounok, Philippe_Totto">

	<!-- Icône du site (favicon) -->

	<link rel="icon" type="image/jpg" href="images/logo.jpg"/>

	<!-- Fil RSS du site -->

    <link rel="alternate" type="application/rss+xml" title="News de mon site" href="news.xml" />

	<!-- Page d'aide du site -->

    <link rel="help" title="Politique d'accessibilité" href="accessibilite.html" />

	

    <!-- Page d'accueil du site -->

    <link rel="start" title="Accueil | http://www.institutSalomon.org" href="index.php" />

    <title>Accueil | INSTITUT SALOMON</title>



    <!-- Bootstrap -->

    <link href="css/bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link href="css/animate.min.css" rel="stylesheet">

    <link href="css/prettyPhoto.css" rel="stylesheet">      

	<link href="css/main.css" rel="stylesheet">

	 <link href="css/responsive.css" rel="stylesheet">

	 <link href="css/magnific-popup1.css" rel="stylesheet"/>

     <link href="css/fonts.css" rel="stylesheet"/>

     <link href="css/pixelcreo.css" rel="stylesheet"/>	  

	 <!--[if lt IE 9]>

    <script src="js/html5shiv.js"></script>

    <script src="js/respond.min.js"></script>

    <![endif]-->       

    

  </head>

  <body class="homepage">   

	<?php include_once("analyticstracking.php") ?> 

	<?php include('header.html'); ?>

	

<!--Contenu: THE BUILDERS INSTITUTE & BUSINESS SCHOOL  et le LOGO de la page WEB--> 
 <?php include 'head.html';?>

 <!--Contenu Partiel de la page WEB ie Section, article, sidebar, aside et footer-->
  <div id="page-content">    
    <section id="content">
  <div class="container">
    <div class="row">
    
    <!--Contenu: MENU VERTICAL version mobile, tablets et PC-->
        

                <!--Contenu: Informations sur le site provenant du lien cliqué sur le menu vertical accordeon-->
      <div class="col-xs-12 col-md-4 col-lg-6">
        
        <div align="center">
        <article>
		<?php if(isset($message) AND $message=='Votre compte utilisateur a correctement été activé') 
		{?>
	     <div class="status alert alert-success" style="display: block"><?php echo $message; ?></div><br>
		<a href="index.php" title="PAGE D'ACCUEIL!!!"> CLIQUEZ ICI </a> 
		<?php
		$_SESSION['ID']=1;
		}
		?>
		
         <?php if(isset($message) AND $message!='Votre compte utilisateur a correctement été activé')?>
         <div class="status alert alert-danger" style="display: block"><?php echo $message; ?></div>		 
        </article>
        </div>
        </div>

       

        </div>
  </div>
  </section>
  </div>
  
  
   <?php include('footer.html'); ?>

	<?php include_once("conditions d'utilisation.html") ?> 

	<?php include_once("login.php") ?>
	
	

</body>
</html>