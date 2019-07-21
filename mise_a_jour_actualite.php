<?php session_start();
include('phpscripts/functions.php');
require 'Database Configuration/config.php';
$db = db_connect();
$balises = true;
?>
<!DOCTYPE html>
<html lang="fr">
<head><!-- 
    <meta charset="utf-8">
    <title>Nzoupe - Actualités</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
   
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link id="callCss" rel="stylesheet" href="themes/current/bootstrap.min.css" type="text/css" media="screen"/>
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="themes/css/base.css" rel="stylesheet" type="text/css">
	<style type="text/css" id="enject"></style>
	<style type="text/css"></style>
	
	 -->
	 <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" lang="fr" content="FORMULAIRE D'INSCRIPTION à L'INSTITUT SALOMON">
    <meta name="author" content="Etudiant Bertin Mounok, Dr. Philippe Totto Ndong">
	<meta name="keyword"  lang="fr" content="Centre de formation professionnel,Assistance de Direction Manager, Audit et Controle de Gestion,Communication Leadership et Cohesion d'equipe,Community Management,Conduite et Gestion des Projets,Coutenance,Creation de Charte Graphique,Culture Digitale,Deleguer Efficacement et prendre des Decisions,developpement Mobile,developpement Web,Developper son Potentiel Humain,Developper son propre Leadership,Elaborer un Plan de Management des Risques,Elaborer une DSF,Entreprenariat et Montage de Projet,Excel VBA,Gestion de la Paie,Gestion des Ressources Humaines,Infographie 2D3D4D,Les Fintech,Maintenance des Reseaux Informatiques,Maintenance Informatique,Management Associatif,Management et Leadership,Management_projets,Marketing Digital,Mener Efficacement les Negociations Commerciales,Methode et Outils de Fidelisation de la clientele,Montage Video et Spot,MS Access,MS Project Server Professionnel,Presenter Efficacement vos idees et projets,Redaction d'un Referentiel Projet Propre a Votre Entreprise,Redaction Professionnelle,Rediger un Business Plan,Rediger un cahier de Charge,Rediger un Plan Capacitif,Rediger un Schema Directeur,Sage - Comptabilite,Sage - Gestion commerciale,Sage - Paie,Secretaire,Secretariat Assistance Accueil,Secretariat Bureautique Bilingue,Secretariat Comptable,Web Design ,Bertin_Mounok, Philippe_Totto, Apropos de Nous, portfolio, Contact, Service E-Learning">
	<!-- Icône du site (favicon) -->
	<link rel="icon" type="image/jpg" href="../images/logo.jpg" alt="LOGO INSTITUT SALOMON" title="Logo Officiel de l'Institut Salomon"/>
    <title>Actualités | INSTITUT SALOMON</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/animate.min.css" rel="stylesheet">
     <link href="css/responsive.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	

</head>
<body>

<?php
/**
* function wordCut($sText, $iMaxLength, $sMessage)
*
* + cuts an wordt after $iMaxLength characters
*
* @param string $sText the text to cut
* @param integer $iMaxLength the text's maximum length
* @param string $sMessage piece of text which is added to the cut text, e.g. '...read more'
*
* @returns string
**/
include('bbcode0.php');
function wordCut($sText, $iMaxLength, $sMessage)
{
if (strlen($sText) > $iMaxLength)
{
$sString = wordwrap($sText, ($iMaxLength-strlen($sMessage)), '[cut]', 1);
$asExplodedString = explode('[cut]', $sString);

echo $sCutText = $asExplodedString[0];

echo "<span style='font-size:1.1em;'>".$sCutText."</span>".$sMessage."";
}
else
{
echo "".$sText."";
}
}
?>

<?php include_once("analyticstracking.php") ?>   
<?php include('header.html'); 
include 'configuration serveur/config_server.php';
?> 
<section>
<div class="container">	
<div class="row">
<?php
//affichage des elements de l'actualité par filiere
$fil=$bdd->prepare('SELECT * FROM filiere WHERE nom_filiere=:nom');
$fil->execute(array('nom'=>$_SESSION['filiere_F']));
$filieres=$fil->fetch();
$nom_filiere = $filieres['nom_filiere'];
$id_specialite = $filieres['id_filiere'];
?>



<section id="bodySection">
<div class="container">					
<div class="row">	

<div class="team col-xs-12 col-lg-3">
<br><br><br>
<?php include('cadre prof.php');?>
<div class="row team-bar col-md-offset-1">
					<div class="first-one-arrow hidden-xs">
						<hr>
					</div>
					<div class="first-arrow hidden-xs">
						<hr> <i class="fa fa-angle-up"></i>
					</div>
					
					<div class="fourth-arrow hidden-xs">
						<hr> <i class="fa fa-angle-down"></i>
					</div>	
			</div>
<?php include('cadre.php');?>	
<div class="row team-bar col-md-offset-1">
					<div class="first-one-arrow hidden-xs">
						<hr>
					</div>
					<div class="first-arrow hidden-xs">
						<hr> <i class="fa fa-angle-up"></i>
					</div>
					
					<div class="fourth-arrow hidden-xs">
						<hr> <i class="fa fa-angle-down"></i>
					</div>	
			</div>
<?php include('avatar_online.php');?>
			<div class="row team-bar col-md-offset-1">
					<div class="first-one-arrow hidden-xs">
						<hr>
					</div>
					<div class="first-arrow hidden-xs">
						<hr> <i class="fa fa-angle-up"></i>
					</div>
					
					<div class="fourth-arrow hidden-xs">
						<hr> <i class="fa fa-angle-down"></i>
					</div>	
			</div>
<?php include('list_cours.php');?>
	       </div><!--/.col-xs-12 col-lg-3 -->
		   
		   
					
<div class="team col-xs-12 col-lg-9">	
			    <article><hr>
		<?php
		
		 /*-------------------------------------------------------MAGEMENT---------------------------------------------------------*/
      if($nom_filiere=='management')
        {
        ?>			
		  <center><h2><strong><u>FILIERE:</u></strong> MANAGEMENT</h2></center>
        




<?php
include 'configuration serveur/config_server.php';
			$nombreDeMessagesParPage = 5; // Essayez de changer ce nombre pour voir :o)
			// Maintenant, on va afficher les messages
			if (isset($_GET['page']))
			{
					$page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
			}
			else // La variable n'existe pas, c'est la première fois qu'on charge la page
			{	 
					$page = 1; // On se met sur la page 1 (par défaut)
			}
				 
			// On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
			$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage;
			
			$req=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil AND nom_cours IN("Management des Projets", "Management Associatif", "Gestion des Ressources Humaines", "Audit et Controle de Gestion", "Gestion de la Paie") ORDER BY id_actualite DESC LIMIT '.$premierMessageAafficher.','.$nombreDeMessagesParPage);
 $req->execute(array('id_fil'=>$id_specialite));




while($rslt=$req->fetch())
{
	$req0=$bdd->prepare('SELECT id_formateur, prenom_f, avatars FROM formateur WHERE id_formateur=:id_formateur');
	$req0->execute(array('id_formateur'=>$rslt['ref_formateur']));
	$rslt0=$req0->fetch(); 
	$id_formateur = $rslt0['id_formateur'];
	
	$reC=$bdd->prepare('SELECT nom_cours FROM actualite WHERE ref_formateur=:id_formateur');
	$reC->execute(array('id_formateur'=>$id_formateur));
	$rsltC=$reC->fetch(); 
?>				
			 
		 
			
			 
<div class="thumbnail" style="background-color:rgba();">
<div style="background-image:url('arriereentete2.jpg');border-top:2px solid white;border-left:2px solid white;border-right:2px solid white;">
<p class="meta" style="margin-top:0.5em;background-image:url('arriereentete2.jpg');"><img align="left" src="<?php echo $rslt0['avatars'];?>" width="64px" height="64px" class="img-rounded" style="margin-top:-0.2em;margin-left:0.2em;"> </p>
<br><p align="left">&nbsp <b style="background-color:rgba(245,76,16,0.5); padding:0.1em;">@<?php echo $rslt0['prenom_f'];?> #<?php echo $rslt['id_actualite'];?> <sup>ème</sup> Vidéo Upload</b>
<h3 align=""  style="margin-top:1em;border-top:5px solid rgba(245,76,16,0.8);height:em;"><a href="#" title="<?php echo $rslt['contenu'];?>"> <?php echo $rslt['titre'];?></a></h3>
</p>
</div>


<p align="center" style="font-weight:bold;"> 
<img src="detail.png"> Cours: 
<a href="#" title="Filiere: <?php echo $_SESSION['filiere_F'];?>"><?php echo $rsltC['nom_cours'];?> </a>, date d'ajout: <?php echo date('d/m/Y H:i', $rslt['date_ajout']); ?>
</p>


<p style="display:block;padding:em;">
<?php 

//ESPACE DE POSTE DES VIDEOS
if(isset($rslt['image']) AND !empty($rslt['image']))
{
?>
<video src="<?php echo $rslt['image'];?>" controls poster="images/Formateurs/sk.jpg" loop></video>
<?php
}
//on recupere le nbrs total de like et de dislike preload="auto"
$req0=$bdd->prepare('SELECT aime, noaime FROM actualite WHERE id_actualite=:id_actualite');
$req0->execute(array('id_actualite'=>$id_formateur));//$rslt['id_actualite']
$rslt0=$req0->fetch();	
$like=$rslt0['aime'];
$dislike=$rslt0['noaime'];
$total=$like+$dislike;
	
$req01=$bdd->prepare('SELECT * FROM membre WHERE numero=:pseudo');
$req01->execute(array('pseudo'=>$_SESSION['contact_Etu']));
$rslt01=$req01->fetch();

?></p>
<p class="contenu" id="ici_comment" style="display:block;padding:1em;background-color:rgba(245,76,16,0.2);" align="left">
	<?php 
	$sText = htmlspecialchars($rslt['contenu']); 
	$sText=code($sText);
	$sText = urllink($sText);
	$sText = nl2br($sText);

	$iMaxLength = 1000;
	$sMessage = '...<br><br><a href="commentaires.php?id='.$rslt['id_actualite'].'#ici_comment" id='.$rslt['id_actualite'].'class="afficher_plus">Lire la suite</a>';
	wordCut("$sText", "$iMaxLength", "$sMessage");
	?>
</p>
	
     <div class="tab-tr" id="t1" style="background-color:rgba();">
			<?php
				$req2=$bdd->prepare('SELECT * FROM mespreferes WHERE ref_actualite=:id_actualite AND ref_membre=:id_membre');
				$req2->execute(array('id_actualite'=>$rslt['id_actualite'],'id_membre'=>$rslt01['id_membre']));
				$rslt2=$req2->fetch();
				
				if($rslt2['aime']==1)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" style="" class="like-btn like-h">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			
			<?php	
				}
				else if($rslt2['aime']==2)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn dislike-h"></div>
			<?php
				}
			else
			{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			<?php
					
			}
			//requetes pour compter le nombre de commentaires
			$req3=$bdd->prepare('SELECT count(*) As nbrs_comment FROM commentaire WHERE ref_actualite=:id_actualite');
			$req3->execute(array('id_actualite'=>$rslt['id_actualite']));
			$rslt3=$req3->fetch();
			?>
			<div class="share-btn share-btn<?php echo $rslt['id_actualite'];?>" id="<?php echo $rslt['id_actualite'];?>" style="font-weight:bold;">Commentaire(<?php echo $rslt3['nbrs_comment'];?>)</div>
			
            <div class="stat-cnt" style="background-color:rgba();padding:em;">
                <div class="rate-count rate-count<?php echo $rslt['id_actualite'];?>" id="<?php echo $total;?>"><?php echo $total;?></div>
                <div class="stat-bar">

                    <div class="bg-green" style="width:;"></div>
                    <div class="bg-red" style="width:100%;"></div>
                </div><!-- stat-bar -->
				
				<div class="dislike-count" id="dislike-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['noaime'];?></div>
				<div class="like-count" id="like-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['aime'];?></div>
  
            </div><!-- /stat-cnt -->
						
        </div><!-- /tab-tr -->
<br><br>
<div style="background-image:url('pattern12.png');padding:0.5em;">
<div id="mycomment"></div>
	<form id="<?php echo $rslt['id_actualite'];?>" class="form_comment form_comment<?php echo $rslt['id_actualite'];?>" name="formulaire">
				
					<div style="width:;" align="left" id="mydiv" class="mydiv<?php echo $rslt['id_actualite'];?>"> 
						<img src="<?php echo $rslt001['avatars'];?>" align="left" width="50px" height="50px" class="img-rounded" style="display: inline-block;width:%;" align="left">
						<p style="clear: both;display: inline-block;width:70%;vertical-align:top;">
							<input type="text" align="" id="contenu" class="form-control contenu contenu<?php echo $rslt['id_actualite'];?>" placeholder="Laissez un commentaire" name="contenu" style="font-size:1.1em;border-radius:5px; height:3.1em;">&nbsp <span class="uploads" style="display:none;"><img src="ajax-loader1.gif"></span><span style="font-weight:bold;color:rgba(245,76,16,1);"><button type="button"class="btn btn-primary0 smileys" id="<?php echo $rslt['id_actualite'];?>"><img src="confus.gif" width="18px" height="18px">Smileys</button></span>
								
							<input type="submit" style="display:none;">&nbsp <span class="load_comment" style="display:none;"><img src="ajax-loader6.gif"></span>
							<div style="background-color:;padding:em;border-radius:5px;margin-left:3em;display:none;" id="img_smileys<?php echo $rslt['id_actualite'];?>">
								<img src="smileys/heureux.png" class="lol" alt=":Happy:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/lol.png" class="lol" title="lol" alt=":lol:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/triste.png" class="lol" title="triste" alt=":triste:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cool.png" class="lol" title="cool" alt=":frime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/rire.png" class="lol" title="rire" alt=":D"	 id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/peur.png" class="lol" title="peur" alt=":o.O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cry.png" class="lol" title="cry" alt=":cry:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/kiss.png" class="lol" title="kiss" alt=":*" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/unsure.png" class="lol" title="unsure" alt="/:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/angel.png" class="lol" title="angel" alt=":O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/pacman.png" class="lol" title="pacman" alt=":V" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/confused.png" class="lol" title="confus" alt=":confus:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/blague.png" class="lol" title="blague" alt=":B" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/aime.png" class="lol" title="aime" alt=":aime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/choc.gif" class="lol" title="choc" alt=":o" id="<?php echo $rslt['id_actualite'];?>" width="32px" height="32px"/>
								<img src="smileys/punition.gif" class="lol" title="punition" alt=":3" onClick="javascript:contenu('');return(false)" width="35px" height="35px"/>
							</div>
							</p>
							
					</div>	
			
</form>	
<script>
function smilies0(img)
{
window.document.formulaire.contenu.value += '' + img + ' ';
document.getElementById('contenu').focus();
}
</script>	 
<div id="block_comment<?php echo $rslt['id_actualite'];?>">
<?php
$req4=$bdd->prepare('SELECT * FROM commentaire WHERE ref_actualite=:id_actualite ORDER BY id_commentaire DESC LIMIT 0,5');
$req4->execute(array('id_actualite'=>$rslt['id_actualite']));
$_SESSION['id_actualite']=$rslt['id_actualite'];
while($rslt4=$req4->fetch())
{
$message = htmlspecialchars($rslt4['contenu']); 
$message=code($message);
$message = urllink($message);

$req5=$bdd->prepare('SELECT * FROM membre WHERE id_membre=:numero');
$req5->execute(array('numero'=>$rslt4['ref_membre']));
$rslt5=$req5->fetch();	
 
?>
<div align="left" style="width:100%;">	

	<img src="<?php echo $rslt5['avatars'];?>" width="50px" height="50px" class="img-rounded" style="display: inline-block;">
	<p style="padding:0.8em;background-color:white;text-align:left;clear: both;display: inline-block;width:60%;vertical-align:top;">
		<?php
		
		
		
		
		
		
		//on affihe le bouton fermer si e commentaire nous appartient
		if($rslt5['numero']==$_SESSION['contact_Etu'])
		{	 
		?>
			<button type="button" class="close supp" id="supp<?php echo $rslt4['id_commentaire'];?>" name="<?php echo $rslt4['id_commentaire'];?>" style="font-size:1.5em;font-weigjt:bold;" data-dismiss=""><span style="display:none;" class="supp"><?php echo $rslt4['id_commentaire'];?></span>×</button>
		<?php
		}
		?>
		
		
		
		
		
		
	<?php echo $message;?><br><br>
		<b><span style="color:rgba(0,74,148,1);">@<?php echo $rslt4['id_commentaire'];?><?php echo $rslt5['prenom_membre'];?></span></b>&nbsp &nbsp <span style="color:rgba(245,76,16,1);"><?php echo date('d/m/Y H\h:i', $rslt4['date_poste']); ?></span> 
	<div id=""></div>
	<div id="rapport4" class="alert alert-success rslt<?php echo $rslt4['id_commentaire'];?>" style="display:none;width:446px;padding:0.5em;font-size:1.1em;"></div>
	</p>
</div>

<?php	
}
//si le nombre de commentaire est superieur a 5 on affiche le texte afficher plus de commentaires
if($rslt3['nbrs_comment']>=5)
{	 
?>
<div align="left" style="margin-left:50px;margin-top:5px;"><a href="commentaires.php?id=<?php echo $rslt['id_actualite'];?>#ici_comment" id="<?php echo $rslt['id_actualite'];?>" class="afficher_plus"> Afficher plus de commentaires</a></div>
<?php
}
?>
</div>
</div>			
</div><br>
<?php
}			 
		
// On met dans une variable le nombre de messages qu'on veut par page		
				// On récupère le nombre total de messages
				$req06=$bdd->query('SELECT count(*) As nb_messages FROM actualite ORDER BY id_actualite DESC ');
				$donnees=$req06->fetch();
				
				
				$totalDesMessages = $donnees['nb_messages'];
				// On calcule le nombre de pages à créer
				$nombreDePages  = ceil($totalDesMessages / $nombreDeMessagesParPage);
				
				$req07=$bdd->query('SELECT * FROM actualite ORDER BY id_actualite DESC');
				$donnees1=$req07->fetch();
				
				// Puis on fait une boucle pour écrire les liens vers chacune des pages
				echo '<br/><p lass="pagination pull-right" id="pagination" align="center"><b>[ Page : ';
				/* Boucle sur les pages */
				for ($i = 1 ; $i <= $nombreDePages ; $i++) {
				  if ($i < ($page-3) )
					$i = $page - 3;
						if ($i >= $page + 3 AND $i <= $nombreDePages - 3)
								echo "...";
				  if ($i > ($page+2) )
					$i = $nombreDePages ;
				  if ($i == $page )
					echo "<span id='page_active'>$i</span>";
				  else
					echo ' <button  class="page btn"  name= "'.$i.'" id="pages">'.$i.'</button> ';
				}
				echo ' ]<b></p><br/>';
		
		}
		
		/*______________________________________________________FORMATION CLE EN MAIN________________________________________________________________________________*/
		 else if($nom_filiere=='formation cle en main')
		 {
         ?>		  
		  		  <center><h2><strong><u>FORMATION CLE EN MAIN</u></strong></h2></center>
        




<?php
include 'configuration serveur/config_server.php';
			$nombreDeMessagesParPage = 5; // Essayez de changer ce nombre pour voir :o)
			// Maintenant, on va afficher les messages
			if (isset($_GET['page']))
			{
					$page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
			}
			else // La variable n'existe pas, c'est la première fois qu'on charge la page
			{	 
					$page = 1; // On se met sur la page 1 (par défaut)
			}
				 
			// On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
			 $premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage;
			
$req=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil AND nom_cours IN("Ms Project Server Professionnel", "Ms Access","Excel VBA","Entreprenariat et Montage de Projet", "Infographie", "Montage Video et Spot", "Web Design", "Redaction Professionnelle") ORDER BY id_actualite DESC LIMIT '.$premierMessageAafficher.','.$nombreDeMessagesParPage);
 $req->execute(array('id_fil'=>$id_specialite));



while($rslt=$req->fetch())
{
	$req0=$bdd->prepare('SELECT id_formateur, prenom_f, avatars FROM formateur WHERE id_formateur=:id_formateur');
	$req0->execute(array('id_formateur'=>$rslt['ref_formateur']));
	$rslt0=$req0->fetch(); 
	$id_formateur = $rslt0['id_formateur'];
	
	$reC=$bdd->prepare('SELECT nom_cours FROM actualite WHERE ref_formateur=:id_formateur');
	$reC->execute(array('id_formateur'=>$id_formateur));
	$rsltC=$reC->fetch(); 
?>				
			 
		 
			
			 
<div class="thumbnail" style="background-color:rgba();">
<div style="background-image:url('arriereentete2.jpg');border-top:2px solid white;border-left:2px solid white;border-right:2px solid white;">
<p class="meta" style="margin-top:0.5em;background-image:url('arriereentete2.jpg');"><img align="left" src="<?php echo $rslt0['avatars'];?>" width="64px" height="64px" class="img-rounded" style="margin-top:-0.2em;margin-left:0.2em;"> </p>
<br><p align="left">&nbsp <b style="background-color:rgba(245,76,16,0.5); padding:0.1em;">@<?php echo $rslt0['prenom_f'];?> #<?php echo $rslt['id_actualite'];?> <sup>ème</sup> Vidéo Upload</b>
<h3 align=""  style="margin-top:1em;border-top:5px solid rgba(245,76,16,0.8);height:em;"><a href="#" title="<?php echo $rslt['contenu'];?>"> <?php echo $rslt['titre'];?></a></h3>
</p>
</div>


<p align="center" style="font-weight:bold;"> 
<img src="detail.png"> Cours: 
<a href="#" title="Filiere: <?php echo $_SESSION['filiere_F'];?>"><?php echo $rsltC['nom_cours'];?> </a>, date d'ajout: <?php echo date('d/m/Y H:i', $rslt['date_ajout']); ?>
</p>


<p style="display:block;padding:em;">
<?php 

//ESPACE DE POSTE DES VIDEOS
if(isset($rslt['image']) AND !empty($rslt['image']))
{
?>
<video src="<?php echo $rslt['image'];?>" controls poster="images/Formateurs/sk.jpg" loop></video>
<?php
}
//on recupere le nbrs total de like et de dislike preload="auto"
$req0=$bdd->prepare('SELECT aime, noaime FROM actualite WHERE id_actualite=:id_actualite');
$req0->execute(array('id_actualite'=>$id_formateur));//$rslt['id_actualite']
$rslt0=$req0->fetch();	
$like=$rslt0['aime'];
$dislike=$rslt0['noaime'];
$total=$like+$dislike;
	
$req01=$bdd->prepare('SELECT * FROM membre WHERE numero=:pseudo');
$req01->execute(array('pseudo'=>$_SESSION['contact_Etu']));
$rslt01=$req01->fetch();

?></p>
<p class="contenu" id="ici_comment" style="display:block;padding:1em;background-color:rgba(245,76,16,0.2);" align="left">
	<?php 
	$sText = htmlspecialchars($rslt['contenu']); 
	$sText=code($sText);
	$sText = urllink($sText);
	$sText = nl2br($sText);

	$iMaxLength = 1000;
	$sMessage = '...<br><br><a href="commentaires.php?id='.$rslt['id_actualite'].'#ici_comment" id='.$rslt['id_actualite'].'class="afficher_plus">Lire la suite</a>';
	wordCut("$sText", "$iMaxLength", "$sMessage");
	?>
</p>
	
     <div class="tab-tr" id="t1" style="background-color:rgba();">
			<?php
				$req2=$bdd->prepare('SELECT * FROM mespreferes WHERE ref_actualite=:id_actualite AND ref_membre=:id_membre');
				$req2->execute(array('id_actualite'=>$rslt['id_actualite'],'id_membre'=>$rslt01['id_membre']));
				$rslt2=$req2->fetch();
				
				if($rslt2['aime']==1)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" style="" class="like-btn like-h">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			
			<?php	
				}
				else if($rslt2['aime']==2)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn dislike-h"></div>
			<?php
				}
			else
			{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			<?php
					
			}
			//requetes pour compter le nombre de commentaires
			$req3=$bdd->prepare('SELECT count(*) As nbrs_comment FROM commentaire WHERE ref_actualite=:id_actualite');
			$req3->execute(array('id_actualite'=>$rslt['id_actualite']));
			$rslt3=$req3->fetch();
			?>
			<div class="share-btn share-btn<?php echo $rslt['id_actualite'];?>" id="<?php echo $rslt['id_actualite'];?>" style="font-weight:bold;">Commentaire(<?php echo $rslt3['nbrs_comment'];?>)</div>
			
            <div class="stat-cnt" style="background-color:rgba();padding:em;">
                <div class="rate-count rate-count<?php echo $rslt['id_actualite'];?>" id="<?php echo $total;?>"><?php echo $total;?></div>
                <div class="stat-bar">

                    <div class="bg-green" style="width:;"></div>
                    <div class="bg-red" style="width:100%;"></div>
                </div><!-- stat-bar -->
				
				<div class="dislike-count" id="dislike-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['noaime'];?></div>
				<div class="like-count" id="like-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['aime'];?></div>
  
            </div><!-- /stat-cnt -->
						
        </div><!-- /tab-tr -->
<br><br>
<div style="background-image:url('pattern12.png');padding:0.5em;">
<div id="mycomment"></div>
	<form id="<?php echo $rslt['id_actualite'];?>" class="form_comment form_comment<?php echo $rslt['id_actualite'];?>" name="formulaire">
				
					<div style="width:;" align="left" id="mydiv" class="mydiv<?php echo $rslt['id_actualite'];?>"> 
						<img src="<?php echo $rslt001['avatars'];?>" align="left" width="50px" height="50px" class="img-rounded" style="display: inline-block;width:%;" align="left">
						<p style="clear: both;display: inline-block;width:70%;vertical-align:top;">
							<input type="text" align="" id="contenu" class="form-control contenu contenu<?php echo $rslt['id_actualite'];?>" placeholder="Laissez un commentaire" name="contenu" style="font-size:1.1em;border-radius:5px; height:3.1em;">&nbsp <span class="uploads" style="display:none;"><img src="ajax-loader1.gif"></span><span style="font-weight:bold;color:rgba(245,76,16,1);"><button type="button"class="btn btn-primary0 smileys" id="<?php echo $rslt['id_actualite'];?>"><img src="confus.gif" width="18px" height="18px">Smileys</button></span>
								
							<input type="submit" style="display:none;">&nbsp <span class="load_comment" style="display:none;"><img src="ajax-loader6.gif"></span>
							<div style="background-color:;padding:em;border-radius:5px;margin-left:3em;display:none;" id="img_smileys<?php echo $rslt['id_actualite'];?>">
								<img src="smileys/heureux.png" class="lol" alt=":Happy:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/lol.png" class="lol" title="lol" alt=":lol:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/triste.png" class="lol" title="triste" alt=":triste:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cool.png" class="lol" title="cool" alt=":frime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/rire.png" class="lol" title="rire" alt=":D"	 id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/peur.png" class="lol" title="peur" alt=":o.O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cry.png" class="lol" title="cry" alt=":cry:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/kiss.png" class="lol" title="kiss" alt=":*" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/unsure.png" class="lol" title="unsure" alt="/:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/angel.png" class="lol" title="angel" alt=":O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/pacman.png" class="lol" title="pacman" alt=":V" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/confused.png" class="lol" title="confus" alt=":confus:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/blague.png" class="lol" title="blague" alt=":B" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/aime.png" class="lol" title="aime" alt=":aime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/choc.gif" class="lol" title="choc" alt=":o" id="<?php echo $rslt['id_actualite'];?>" width="32px" height="32px"/>
								<img src="smileys/punition.gif" class="lol" title="punition" alt=":3" onClick="javascript:contenu('');return(false)" width="35px" height="35px"/>
							</div>
							</p>
							
					</div>	
			
</form>	
<script>
function smilies0(img)
{
window.document.formulaire.contenu.value += '' + img + ' ';
document.getElementById('contenu').focus();
}
</script>	 
<div id="block_comment<?php echo $rslt['id_actualite'];?>">
<?php
$req4=$bdd->prepare('SELECT * FROM commentaire WHERE ref_actualite=:id_actualite ORDER BY id_commentaire DESC LIMIT 0,5');
$req4->execute(array('id_actualite'=>$rslt['id_actualite']));
$_SESSION['id_actualite']=$rslt['id_actualite'];
while($rslt4=$req4->fetch())
{
$message = htmlspecialchars($rslt4['contenu']); 
$message=code($message);
$message = urllink($message);

$req5=$bdd->prepare('SELECT * FROM membre WHERE id_membre=:numero');
$req5->execute(array('numero'=>$rslt4['ref_membre']));
$rslt5=$req5->fetch();	
 
?>
<div align="left" style="width:100%;">	

	<img src="<?php echo $rslt5['avatars'];?>" width="50px" height="50px" class="img-rounded" style="display: inline-block;">
	<p style="padding:0.8em;background-color:white;text-align:left;clear: both;display: inline-block;width:60%;vertical-align:top;">
		<?php
		
		
		
		
		
		
		//on affihe le bouton fermer si e commentaire nous appartient
		if($rslt5['numero']==$_SESSION['contact_Etu'])
		{	 
		?>
			<button type="button" class="close supp" id="supp<?php echo $rslt4['id_commentaire'];?>" name="<?php echo $rslt4['id_commentaire'];?>" style="font-size:1.5em;font-weigjt:bold;" data-dismiss=""><span style="display:none;" class="supp"><?php echo $rslt4['id_commentaire'];?></span>×</button>
		<?php
		}
		?>
		
		
		
		
		
		
	<?php echo $message;?><br><br>
		<b><span style="color:rgba(0,74,148,1);">@<?php echo $rslt4['id_commentaire'];?><?php echo $rslt5['prenom_membre'];?></span></b>&nbsp &nbsp <span style="color:rgba(245,76,16,1);"><?php echo date('d/m/Y H\h:i', $rslt4['date_poste']); ?></span> 
	<div id=""></div>
	<div id="rapport4" class="alert alert-success rslt<?php echo $rslt4['id_commentaire'];?>" style="display:none;width:446px;padding:0.5em;font-size:1.1em;"></div>
	</p>
</div>

<?php	
}
//si le nombre de commentaire est superieur a 5 on affiche le texte afficher plus de commentaires
if($rslt3['nbrs_comment']>=5)
{	 
?>
<div align="left" style="margin-left:50px;margin-top:5px;"><a href="commentaires.php?id=<?php echo $rslt['id_actualite'];?>#ici_comment" id="<?php echo $rslt['id_actualite'];?>" class="afficher_plus"> Afficher plus de commentaires</a></div>
<?php
}
?>
</div>
</div>			
</div><br>
<?php
}			 
		
// On met dans une variable le nombre de messages qu'on veut par page		
				// On récupère le nombre total de messages
				$req06=$bdd->prepare('SELECT count(*) As nb_messages FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC ');
				 $req06->execute(array('id_fil'=>$id_specialite));
				$donnees=$req06->fetch();
				
				
				$totalDesMessages = $donnees['nb_messages'];
				// On calcule le nombre de pages à créer
				$nombreDePages  = ceil($totalDesMessages / $nombreDeMessagesParPage);
				
				$req07=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC');
				$req07->execute(array('id_fil'=>$id_specialite));
				$donnees1=$req07->fetch();
				
				// Puis on fait une boucle pour écrire les liens vers chacune des pages
				echo '<br/><p lass="pagination pull-right" id="pagination" align="center"><b>[ Page : ';
				/* Boucle sur les pages */
				for ($i = 1 ; $i <= $nombreDePages ; $i++) {
				  if ($i < ($page-3) )
					$i = $page - 3;
						if ($i >= $page + 3 AND $i <= $nombreDePages - 3)
								echo "...";
				  if ($i > ($page+2) )
					$i = $nombreDePages ;
				  if ($i == $page )
					echo "<span id='page_active'>$i</span>";
				  else
					echo ' <button  class="page btn"  name= "'.$i.'" id="pages">'.$i.'</button> ';
				}
				echo ' ]<b></p><br/>'; 
		

		   
		 }
		 
		 
		 
		/*_____________________________________________________formation a la carte________________________________________________________________________________
		//affichage des elements de l'actualité par filiere
$fil=$bdd->prepare('SELECT * FROM filiere WHERE nom_filiere=:nom');
$fil->execute(array('nom'=>$_SESSION['filiere_F']));
$filieres=$fil->fetch();
$nom_filiere = $filieres['nom_filiere'];
$id_specialite = $filieres['id_filiere'];*/
		 
		 else if($nom_filiere=='formation a la carte')
		 { 
         ?>		  
           
		  		  <center><h2><strong><u>FORMATION A LA CARTE</u></strong></h2></center>
        
<?php
include 'configuration serveur/config_server.php';
			$nombreDeMessagesParPage = 5; // Essayez de changer ce nombre pour voir :o)
			// Maintenant, on va afficher les messages
			if (isset($_GET['page']))
			{
					$page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
			}
			else // La variable n'existe pas, c'est la première fois qu'on charge la page
			{	 
					$page = 1; // On se met sur la page 1 (par défaut)
			}
				 
			// On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
			$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage; 
$req=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil AND nom_cours IN("Rediger un Cahier de Charge", "Rediger un Business Plan","Rediger un Schema Directeur","Rediger un Plan Capacitif", "Elaborer un plan de management des risques", "Elaborer une DSF", "Redaction d\'un Referentiel Projet a votre Entreprise", "Creation de charte Graphique") ORDER BY id_actualite DESC LIMIT '.$premierMessageAafficher.','.$nombreDeMessagesParPage);
 $req->execute(array('id_fil'=>$id_specialite));



while($rslt=$req->fetch())
{
	$req0=$bdd->prepare('SELECT id_formateur, prenom_f, avatars FROM formateur WHERE id_formateur=:id_formateur');
	$req0->execute(array('id_formateur'=>$rslt['ref_formateur']));
	$rslt0=$req0->fetch(); 
	$id_formateur = $rslt0['id_formateur'];
	
	$reC=$bdd->prepare('SELECT nom_cours FROM actualite WHERE ref_formateur=:id_formateur');
	$reC->execute(array('id_formateur'=>$id_formateur));
	$rsltC=$reC->fetch(); 
?>				
			 
		 
			
			 
<div class="thumbnail" style="background-color:rgba();">
<div style="background-image:url('arriereentete2.jpg');border-top:2px solid white;border-left:2px solid white;border-right:2px solid white;">
<p class="meta" style="margin-top:0.5em;background-image:url('arriereentete2.jpg');"><img align="left" src="<?php echo $rslt0['avatars'];?>" width="64px" height="64px" class="img-rounded" style="margin-top:-0.2em;margin-left:0.2em;"> </p>
<br><p align="left">&nbsp <b style="background-color:rgba(245,76,16,0.5); padding:0.1em;">@<?php echo $rslt0['prenom_f'];?> #<?php echo $rslt['id_actualite'];?> <sup>ème</sup> Vidéo Upload</b>
<h3 align=""  style="margin-top:1em;border-top:5px solid rgba(245,76,16,0.8);height:em;"><a href="#" title="<?php echo $rslt['contenu'];?>"> <?php echo $rslt['titre'];?></a></h3>
</p>
</div>


<p align="center" style="font-weight:bold;"> 
<img src="detail.png"> Cours: 
<a href="#" title="Filiere: <?php echo $_SESSION['filiere_F'];?>"><?php echo $rsltC['nom_cours'];?> </a>, date d'ajout: <?php echo date('d/m/Y H:i', $rslt['date_ajout']); ?>
</p>


<p style="display:block;padding:em;">
<?php 

//ESPACE DE POSTE DES VIDEOS
if(isset($rslt['image']) AND !empty($rslt['image']))
{
?>
<video src="<?php echo $rslt['image'];?>" controls poster="images/Formateurs/sk.jpg" loop></video>
<?php
}
//on recupere le nbrs total de like et de dislike preload="auto"
$req0=$bdd->prepare('SELECT aime, noaime FROM actualite WHERE id_actualite=:id_actualite');
$req0->execute(array('id_actualite'=>$id_formateur));//$rslt['id_actualite']
$rslt0=$req0->fetch();	
$like=$rslt0['aime'];
$dislike=$rslt0['noaime'];
$total=$like+$dislike;
	
$req01=$bdd->prepare('SELECT * FROM membre WHERE numero=:pseudo');
$req01->execute(array('pseudo'=>$_SESSION['contact_Etu']));
$rslt01=$req01->fetch();

?></p>
<p class="contenu" id="ici_comment" style="display:block;padding:1em;background-color:rgba(245,76,16,0.2);" align="left">
	<?php 
	$sText = htmlspecialchars($rslt['contenu']); 
	$sText=code($sText);
	$sText = urllink($sText);
	$sText = nl2br($sText);

	$iMaxLength = 1000;
	$sMessage = '...<br><br><a href="commentaires.php?id='.$rslt['id_actualite'].'#ici_comment" id='.$rslt['id_actualite'].'class="afficher_plus">Lire la suite</a>';
	wordCut("$sText", "$iMaxLength", "$sMessage");
	?>
</p>
	
     <div class="tab-tr" id="t1" style="background-color:rgba();">
			<?php
				$req2=$bdd->prepare('SELECT * FROM mespreferes WHERE ref_actualite=:id_actualite AND ref_membre=:id_membre');
				$req2->execute(array('id_actualite'=>$rslt['id_actualite'],'id_membre'=>$rslt01['id_membre']));
				$rslt2=$req2->fetch();
				
				if($rslt2['aime']==1)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" style="" class="like-btn like-h">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			
			<?php	
				}
				else if($rslt2['aime']==2)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn dislike-h"></div>
			<?php
				}
			else
			{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			<?php
					
			}
			//requetes pour compter le nombre de commentaires
			$req3=$bdd->prepare('SELECT count(*) As nbrs_comment FROM commentaire WHERE ref_actualite=:id_actualite');
			$req3->execute(array('id_actualite'=>$rslt['id_actualite']));
			$rslt3=$req3->fetch();
			?>
			<div class="share-btn share-btn<?php echo $rslt['id_actualite'];?>" id="<?php echo $rslt['id_actualite'];?>" style="font-weight:bold;">Commentaire(<?php echo $rslt3['nbrs_comment'];?>)</div>
			
            <div class="stat-cnt" style="background-color:rgba();padding:em;">
                <div class="rate-count rate-count<?php echo $rslt['id_actualite'];?>" id="<?php echo $total;?>"><?php echo $total;?></div>
                <div class="stat-bar">

                    <div class="bg-green" style="width:;"></div>
                    <div class="bg-red" style="width:100%;"></div>
                </div><!-- stat-bar -->
				
				<div class="dislike-count" id="dislike-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['noaime'];?></div>
				<div class="like-count" id="like-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['aime'];?></div>
  
            </div><!-- /stat-cnt -->
						
        </div><!-- /tab-tr -->
<br><br>
<div style="background-image:url('pattern12.png');padding:0.5em;">
<div id="mycomment"></div>
	<form id="<?php echo $rslt['id_actualite'];?>" class="form_comment form_comment<?php echo $rslt['id_actualite'];?>" name="formulaire">
				
					<div style="width:;" align="left" id="mydiv" class="mydiv<?php echo $rslt['id_actualite'];?>"> 
						<img src="<?php echo $rslt001['avatars'];?>" align="left" width="50px" height="50px" class="img-rounded" style="display: inline-block;width:%;" align="left">
						<p style="clear: both;display: inline-block;width:70%;vertical-align:top;">
							<input type="text" align="" id="contenu" class="form-control contenu contenu<?php echo $rslt['id_actualite'];?>" placeholder="Laissez un commentaire" name="contenu" style="font-size:1.1em;border-radius:5px; height:3.1em;">&nbsp <span class="uploads" style="display:none;"><img src="ajax-loader1.gif"></span><span style="font-weight:bold;color:rgba(245,76,16,1);"><button type="button"class="btn btn-primary0 smileys" id="<?php echo $rslt['id_actualite'];?>"><img src="confus.gif" width="18px" height="18px">Smileys</button></span>
								
							<input type="submit" style="display:none;">&nbsp <span class="load_comment" style="display:none;"><img src="ajax-loader6.gif"></span>
							<div style="background-color:;padding:em;border-radius:5px;margin-left:3em;display:none;" id="img_smileys<?php echo $rslt['id_actualite'];?>">
								<img src="smileys/heureux.png" class="lol" alt=":Happy:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/lol.png" class="lol" title="lol" alt=":lol:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/triste.png" class="lol" title="triste" alt=":triste:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cool.png" class="lol" title="cool" alt=":frime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/rire.png" class="lol" title="rire" alt=":D"	 id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/peur.png" class="lol" title="peur" alt=":o.O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cry.png" class="lol" title="cry" alt=":cry:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/kiss.png" class="lol" title="kiss" alt=":*" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/unsure.png" class="lol" title="unsure" alt="/:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/angel.png" class="lol" title="angel" alt=":O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/pacman.png" class="lol" title="pacman" alt=":V" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/confused.png" class="lol" title="confus" alt=":confus:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/blague.png" class="lol" title="blague" alt=":B" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/aime.png" class="lol" title="aime" alt=":aime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/choc.gif" class="lol" title="choc" alt=":o" id="<?php echo $rslt['id_actualite'];?>" width="32px" height="32px"/>
								<img src="smileys/punition.gif" class="lol" title="punition" alt=":3" onClick="javascript:contenu('');return(false)" width="35px" height="35px"/>
							</div>
							</p>
							
					</div>	
			
</form>	
<script>
function smilies0(img)
{
window.document.formulaire.contenu.value += '' + img + ' ';
document.getElementById('contenu').focus();
}
</script>	 
<div id="block_comment<?php echo $rslt['id_actualite'];?>">
<?php
$req4=$bdd->prepare('SELECT * FROM commentaire WHERE ref_actualite=:id_actualite ORDER BY id_commentaire DESC LIMIT 0,5');
$req4->execute(array('id_actualite'=>$rslt['id_actualite']));
$_SESSION['id_actualite']=$rslt['id_actualite'];
while($rslt4=$req4->fetch())
{
$message = htmlspecialchars($rslt4['contenu']); 
$message=code($message);
$message = urllink($message);

$req5=$bdd->prepare('SELECT * FROM membre WHERE id_membre=:numero');
$req5->execute(array('numero'=>$rslt4['ref_membre']));
$rslt5=$req5->fetch();	
 
?>
<div align="left" style="width:100%;">	

	<img src="<?php echo $rslt5['avatars'];?>" width="50px" height="50px" class="img-rounded" style="display: inline-block;">
	<p style="padding:0.8em;background-color:white;text-align:left;clear: both;display: inline-block;width:60%;vertical-align:top;">
		<?php
		
		
		
		
		
		
		//on affihe le bouton fermer si e commentaire nous appartient
		if($rslt5['numero']==$_SESSION['contact_Etu'])
		{	 
		?>
			<button type="button" class="close supp" id="supp<?php echo $rslt4['id_commentaire'];?>" name="<?php echo $rslt4['id_commentaire'];?>" style="font-size:1.5em;font-weigjt:bold;" data-dismiss=""><span style="display:none;" class="supp"><?php echo $rslt4['id_commentaire'];?></span>×</button>
		<?php
		}
		?>
		
		
		
		
		
		
	<?php echo $message;?><br><br>
		<b><span style="color:rgba(0,74,148,1);">@<?php echo $rslt4['id_commentaire'];?><?php echo $rslt5['prenom_membre'];?></span></b>&nbsp &nbsp <span style="color:rgba(245,76,16,1);"><?php echo date('d/m/Y H\h:i', $rslt4['date_poste']); ?></span> 
	<div id=""></div>
	<div id="rapport4" class="alert alert-success rslt<?php echo $rslt4['id_commentaire'];?>" style="display:none;width:446px;padding:0.5em;font-size:1.1em;"></div>
	</p>
</div>

<?php	
}
//si le nombre de commentaire est superieur a 5 on affiche le texte afficher plus de commentaires
if($rslt3['nbrs_comment']>=5)
{	 
?>
<div align="left" style="margin-left:50px;margin-top:5px;"><a href="commentaires.php?id=<?php echo $rslt['id_actualite'];?>#ici_comment" id="<?php echo $rslt['id_actualite'];?>" class="afficher_plus"> Afficher plus de commentaires</a></div>
<?php
}
?>
</div>
</div>			
</div><br>
<?php
}			 
		
// On met dans une variable le nombre de messages qu'on veut par page		
				// On récupère le nombre total de messages
				$req06=$bdd->prepare('SELECT count(*) As nb_messages FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC ');
				 $req06->execute(['id_fil'=>$id_specialite]);
				$donnees=$req06->fetch();
				
				
				$totalDesMessages = $donnees['nb_messages'];
				// On calcule le nombre de pages à créer
				$nombreDePages  = ceil($totalDesMessages / $nombreDeMessagesParPage);
				
				$req07=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC');
				$req07->execute(['id_fil'=>$id_specialite]);
				$donnees1=$req07->fetch();
				
				// Puis on fait une boucle pour écrire les liens vers chacune des pages
				echo '<br/><p lass="pagination pull-right" id="pagination" align="center"><b>[ Page : ';
				/* Boucle sur les pages */
				for ($i = 1 ; $i <= $nombreDePages ; $i++) {
				  if ($i < ($page-3) )
					$i = $page - 3;
						if ($i >= $page + 3 AND $i <= $nombreDePages - 3)
								echo "...";
				  if ($i > ($page+2) )
					$i = $nombreDePages ;
				  if ($i == $page )
					echo "<span id='page_active'>$i</span>";
				  else
					echo ' <button  class="page btn"  name= "'.$i.'" id="pages">'.$i.'</button> ';
				}
				echo ' ]<b></p><br/>'; 

		   


		  
		 }
		 
		 
		 
		
		/*______________________________________________________TRAINING DE HAUT NIVEAU________________________________________________________________________________*/
		 
		 else if($nom_filiere=='training de haut niveau')
		 {	 
            ?>		  
           <center><h2><strong><u>TRAINING DE HAUT NIVEAU</u></strong></h2></center>
        
<?php
include 'configuration serveur/config_server.php';
			$nombreDeMessagesParPage = 5; // Essayez de changer ce nombre pour voir :o)
			// Maintenant, on va afficher les messages
			if (isset($_GET['page']))
			{
					$page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
			}
			else // La variable n'existe pas, c'est la première fois qu'on charge la page
			{	 
					$page = 1; // On se met sur la page 1 (par défaut)
			}
				 
			// On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
			$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage; 
$req=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil AND nom_cours IN("Communication Leadership et cohesion d\'equipe", "Management et Leadership", "Developper son Propre Leadership", "Developper son Potentiel Humain", "Deleguer Efficacement et prendre des decisions", "Presenter Efficacement vos idees et projets", "Conduite et Gestion des Projets", "coutenance") ORDER BY id_actualite DESC LIMIT '.$premierMessageAafficher.','.$nombreDeMessagesParPage);
 $req->execute(['id_fil'=>$id_specialite]);



while($rslt=$req->fetch())
{
	$req0=$bdd->prepare('SELECT id_formateur, prenom_f, avatars FROM formateur WHERE id_formateur=:id_formateur');
	$req0->execute(array('id_formateur'=>$rslt['ref_formateur']));
	$rslt0=$req0->fetch(); 
	$id_formateur = $rslt0['id_formateur'];
	
	$reC=$bdd->prepare('SELECT nom_cours FROM actualite WHERE ref_formateur=:id_formateur');
	$reC->execute(array('id_formateur'=>$id_formateur));
	$rsltC=$reC->fetch(); 
?>				
			 
		 
			
			 
<div class="thumbnail" style="background-color:rgba();">
<div style="background-image:url('arriereentete2.jpg');border-top:2px solid white;border-left:2px solid white;border-right:2px solid white;">
<p class="meta" style="margin-top:0.5em;background-image:url('arriereentete2.jpg');"><img align="left" src="<?php echo $rslt0['avatars'];?>" width="64px" height="64px" class="img-rounded" style="margin-top:-0.2em;margin-left:0.2em;"> </p>
<br><p align="left">&nbsp <b style="background-color:rgba(245,76,16,0.5); padding:0.1em;">@<?php echo $rslt0['prenom_f'];?> #<?php echo $rslt['id_actualite'];?> <sup>ème</sup> Vidéo Upload</b>
<h3 align=""  style="margin-top:1em;border-top:5px solid rgba(245,76,16,0.8);height:em;"><a href="#" title="<?php echo $rslt['contenu'];?>"> <?php echo $rslt['titre'];?></a></h3>
</p>
</div>


<p align="center" style="font-weight:bold;"> 
<img src="detail.png"> Cours: 
<a href="#" title="Filiere: <?php echo $_SESSION['filiere_F'];?>"><?php echo $rsltC['nom_cours'];?> </a>, date d'ajout: <?php echo date('d/m/Y H:i', $rslt['date_ajout']); ?>
</p>


<p style="display:block;padding:em;">
<?php 

//ESPACE DE POSTE DES VIDEOS
if(isset($rslt['image']) AND !empty($rslt['image']))
{
?>
<video src="<?php echo $rslt['image'];?>" controls poster="images/Formateurs/sk.jpg" loop></video>
<?php
}
//on recupere le nbrs total de like et de dislike preload="auto"
$req0=$bdd->prepare('SELECT aime, noaime FROM actualite WHERE id_actualite=:id_actualite');
$req0->execute(array('id_actualite'=>$id_formateur));//$rslt['id_actualite']
$rslt0=$req0->fetch();	
$like=$rslt0['aime'];
$dislike=$rslt0['noaime'];
$total=$like+$dislike;
	
$req01=$bdd->prepare('SELECT * FROM membre WHERE numero=:pseudo');
$req01->execute(array('pseudo'=>$_SESSION['contact_Etu']));
$rslt01=$req01->fetch();

?></p>
<p class="contenu" id="ici_comment" style="display:block;padding:1em;background-color:rgba(245,76,16,0.2);" align="left">
	<?php 
	$sText = htmlspecialchars($rslt['contenu']); 
	$sText=code($sText);
	$sText = urllink($sText);
	$sText = nl2br($sText);

	$iMaxLength = 1000;
	$sMessage = '...<br><br><a href="commentaires.php?id='.$rslt['id_actualite'].'#ici_comment" id='.$rslt['id_actualite'].'class="afficher_plus">Lire la suite</a>';
	wordCut("$sText", "$iMaxLength", "$sMessage");
	?>
</p>
	
     <div class="tab-tr" id="t1" style="background-color:rgba();">
			<?php
				$req2=$bdd->prepare('SELECT * FROM mespreferes WHERE ref_actualite=:id_actualite AND ref_membre=:id_membre');
				$req2->execute(array('id_actualite'=>$rslt['id_actualite'],'id_membre'=>$rslt01['id_membre']));
				$rslt2=$req2->fetch();
				
				if($rslt2['aime']==1)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" style="" class="like-btn like-h">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			
			<?php	
				}
				else if($rslt2['aime']==2)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn dislike-h"></div>
			<?php
				}
			else
			{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			<?php
					
			}
			//requetes pour compter le nombre de commentaires
			$req3=$bdd->prepare('SELECT count(*) As nbrs_comment FROM commentaire WHERE ref_actualite=:id_actualite');
			$req3->execute(array('id_actualite'=>$rslt['id_actualite']));
			$rslt3=$req3->fetch();
			?>
			<div class="share-btn share-btn<?php echo $rslt['id_actualite'];?>" id="<?php echo $rslt['id_actualite'];?>" style="font-weight:bold;">Commentaire(<?php echo $rslt3['nbrs_comment'];?>)</div>
			
            <div class="stat-cnt" style="background-color:rgba();padding:em;">
                <div class="rate-count rate-count<?php echo $rslt['id_actualite'];?>" id="<?php echo $total;?>"><?php echo $total;?></div>
                <div class="stat-bar">

                    <div class="bg-green" style="width:;"></div>
                    <div class="bg-red" style="width:100%;"></div>
                </div><!-- stat-bar -->
				
				<div class="dislike-count" id="dislike-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['noaime'];?></div>
				<div class="like-count" id="like-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['aime'];?></div>
  
            </div><!-- /stat-cnt -->
						
        </div><!-- /tab-tr -->
<br><br>
<div style="background-image:url('pattern12.png');padding:0.5em;">
<div id="mycomment"></div>
	<form id="<?php echo $rslt['id_actualite'];?>" class="form_comment form_comment<?php echo $rslt['id_actualite'];?>" name="formulaire">
				
					<div style="width:;" align="left" id="mydiv" class="mydiv<?php echo $rslt['id_actualite'];?>"> 
						<img src="<?php echo $rslt001['avatars'];?>" align="left" width="50px" height="50px" class="img-rounded" style="display: inline-block;width:%;" align="left">
						<p style="clear: both;display: inline-block;width:70%;vertical-align:top;">
							<input type="text" align="" id="contenu" class="form-control contenu contenu<?php echo $rslt['id_actualite'];?>" placeholder="Laissez un commentaire" name="contenu" style="font-size:1.1em;border-radius:5px; height:3.1em;">&nbsp <span class="uploads" style="display:none;"><img src="ajax-loader1.gif"></span><span style="font-weight:bold;color:rgba(245,76,16,1);"><button type="button"class="btn btn-primary0 smileys" id="<?php echo $rslt['id_actualite'];?>"><img src="confus.gif" width="18px" height="18px">Smileys</button></span>
								
							<input type="submit" style="display:none;">&nbsp <span class="load_comment" style="display:none;"><img src="ajax-loader6.gif"></span>
							<div style="background-color:;padding:em;border-radius:5px;margin-left:3em;display:none;" id="img_smileys<?php echo $rslt['id_actualite'];?>">
								<img src="smileys/heureux.png" class="lol" alt=":Happy:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/lol.png" class="lol" title="lol" alt=":lol:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/triste.png" class="lol" title="triste" alt=":triste:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cool.png" class="lol" title="cool" alt=":frime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/rire.png" class="lol" title="rire" alt=":D"	 id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/peur.png" class="lol" title="peur" alt=":o.O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cry.png" class="lol" title="cry" alt=":cry:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/kiss.png" class="lol" title="kiss" alt=":*" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/unsure.png" class="lol" title="unsure" alt="/:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/angel.png" class="lol" title="angel" alt=":O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/pacman.png" class="lol" title="pacman" alt=":V" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/confused.png" class="lol" title="confus" alt=":confus:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/blague.png" class="lol" title="blague" alt=":B" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/aime.png" class="lol" title="aime" alt=":aime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/choc.gif" class="lol" title="choc" alt=":o" id="<?php echo $rslt['id_actualite'];?>" width="32px" height="32px"/>
								<img src="smileys/punition.gif" class="lol" title="punition" alt=":3" onClick="javascript:contenu('');return(false)" width="35px" height="35px"/>
							</div>
							</p>
							
					</div>	
			
</form>	
<script>
function smilies0(img)
{
window.document.formulaire.contenu.value += '' + img + ' ';
document.getElementById('contenu').focus();
}
</script>	 
<div id="block_comment<?php echo $rslt['id_actualite'];?>">
<?php
$req4=$bdd->prepare('SELECT * FROM commentaire WHERE ref_actualite=:id_actualite ORDER BY id_commentaire DESC LIMIT 0,5');
$req4->execute(array('id_actualite'=>$rslt['id_actualite']));
$_SESSION['id_actualite']=$rslt['id_actualite'];
while($rslt4=$req4->fetch())
{
$message = htmlspecialchars($rslt4['contenu']); 
$message=code($message);
$message = urllink($message);

$req5=$bdd->prepare('SELECT * FROM membre WHERE id_membre=:numero');
$req5->execute(array('numero'=>$rslt4['ref_membre']));
$rslt5=$req5->fetch();	
 
?>
<div align="left" style="width:100%;">	

	<img src="<?php echo $rslt5['avatars'];?>" width="50px" height="50px" class="img-rounded" style="display: inline-block;">
	<p style="padding:0.8em;background-color:white;text-align:left;clear: both;display: inline-block;width:60%;vertical-align:top;">
		<?php
		
		
		
		
		
		
		//on affihe le bouton fermer si e commentaire nous appartient
		if($rslt5['numero']==$_SESSION['contact_Etu'])
		{	 
		?>
			<button type="button" class="close supp" id="supp<?php echo $rslt4['id_commentaire'];?>" name="<?php echo $rslt4['id_commentaire'];?>" style="font-size:1.5em;font-weigjt:bold;" data-dismiss=""><span style="display:none;" class="supp"><?php echo $rslt4['id_commentaire'];?></span>×</button>
		<?php
		}
		?>
		
		
		
		
		
		
	<?php echo $message;?><br><br>
		<b><span style="color:rgba(0,74,148,1);">@<?php echo $rslt4['id_commentaire'];?><?php echo $rslt5['prenom_membre'];?></span></b>&nbsp &nbsp <span style="color:rgba(245,76,16,1);"><?php echo date('d/m/Y H\h:i', $rslt4['date_poste']); ?></span> 
	<div id=""></div>
	<div id="rapport4" class="alert alert-success rslt<?php echo $rslt4['id_commentaire'];?>" style="display:none;width:446px;padding:0.5em;font-size:1.1em;"></div>
	</p>
</div>

<?php	
}
//si le nombre de commentaire est superieur a 5 on affiche le texte afficher plus de commentaires
if($rslt3['nbrs_comment']>=5)
{	 
?>
<div align="left" style="margin-left:50px;margin-top:5px;"><a href="commentaires.php?id=<?php echo $rslt['id_actualite'];?>#ici_comment" id="<?php echo $rslt['id_actualite'];?>" class="afficher_plus"> Afficher plus de commentaires</a></div>
<?php
}
?>
</div>
</div>			
</div><br>
<?php
}			 
		
// On met dans une variable le nombre de messages qu'on veut par page		
				// On récupère le nombre total de messages
				$req06=$bdd->prepare('SELECT count(*) As nb_messages FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC ');
				 $req06->execute(['id_fil'=>$id_specialite]);
				$donnees=$req06->fetch();
				
				
				$totalDesMessages = $donnees['nb_messages'];
				// On calcule le nombre de pages à créer
				$nombreDePages  = ceil($totalDesMessages / $nombreDeMessagesParPage);
				
				$req07=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC');
				$req07->execute(['id_fil'=>$id_specialite]);
				$donnees1=$req07->fetch();
				
				// Puis on fait une boucle pour écrire les liens vers chacune des pages
				echo '<br/><p lass="pagination pull-right" id="pagination" align="center"><b>[ Page : ';
				/* Boucle sur les pages */
				for ($i = 1 ; $i <= $nombreDePages ; $i++) {
				  if ($i < ($page-3) )
					$i = $page - 3;
						if ($i >= $page + 3 AND $i <= $nombreDePages - 3)
								echo "...";
				  if ($i > ($page+2) )
					$i = $nombreDePages ;
				  if ($i == $page )
					echo "<span id='page_active'>$i</span>";
				  else
					echo ' <button  class="page btn"  name= "'.$i.'" id="pages">'.$i.'</button> ';
				}
				echo ' ]<b></p><br/>'; 

		   


		  			 
		 }
		 
		 
		 
/*---------------------------------------------------------------SECRETARIAT-------------------------------------------------------------------*/		 
		 
		 
		 
		 
		 
		 else if($nom_filiere=='secretariat')
		 {
         ?>		  
           <center><h2><strong><u>FILIERE:</u></strong>SECRETARIAT</h2></center>
        
<?php
include 'configuration serveur/config_server.php';
			$nombreDeMessagesParPage = 5; // Essayez de changer ce nombre pour voir :o)
			// Maintenant, on va afficher les messages
			if (isset($_GET['page']))
			{
					$page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
			}
			else // La variable n'existe pas, c'est la première fois qu'on charge la page
			{	 
					$page = 1; // On se met sur la page 1 (par défaut)
			}
				 
			// On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
			$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage; 
$req=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil AND nom_cours IN("Assistance de Direction ou Manager", "secretaire", "secretaire d\'assistance ou Accueil", "secretaire Bureautique Bilingue", "secretaire Comptable") ORDER BY id_actualite DESC LIMIT '.$premierMessageAafficher.','.$nombreDeMessagesParPage);
 $req->execute(['id_fil'=>$id_specialite]);



while($rslt=$req->fetch())
{
	$req0=$bdd->prepare('SELECT id_formateur, prenom_f, avatars FROM formateur WHERE id_formateur=:id_formateur');
	$req0->execute(array('id_formateur'=>$rslt['ref_formateur']));
	$rslt0=$req0->fetch(); 
	$id_formateur = $rslt0['id_formateur'];
	
	$reC=$bdd->prepare('SELECT nom_cours FROM actualite WHERE ref_formateur=:id_formateur');
	$reC->execute(array('id_formateur'=>$id_formateur));
	$rsltC=$reC->fetch(); 
?>				
			 
		 
			
			 
<div class="thumbnail" style="background-color:rgba();">
<div style="background-image:url('arriereentete2.jpg');border-top:2px solid white;border-left:2px solid white;border-right:2px solid white;">
<p class="meta" style="margin-top:0.5em;background-image:url('arriereentete2.jpg');"><img align="left" src="<?php echo $rslt0['avatars'];?>" width="64px" height="64px" class="img-rounded" style="margin-top:-0.2em;margin-left:0.2em;"> </p>
<br><p align="left">&nbsp <b style="background-color:rgba(245,76,16,0.5); padding:0.1em;">@<?php echo $rslt0['prenom_f'];?> #<?php echo $rslt['id_actualite'];?> <sup>ème</sup> Vidéo Upload</b>
<h3 align=""  style="margin-top:1em;border-top:5px solid rgba(245,76,16,0.8);height:em;"><a href="#" title="<?php echo $rslt['contenu'];?>"> <?php echo $rslt['titre'];?></a></h3>
</p>
</div>


<p align="center" style="font-weight:bold;"> 
<img src="detail.png"> Cours: 
<a href="#" title="Filiere: <?php echo $_SESSION['filiere_F'];?>"><?php echo $rsltC['nom_cours'];?> </a>, date d'ajout: <?php echo date('d/m/Y H:i', $rslt['date_ajout']); ?>
</p>


<p style="display:block;padding:em;">
<?php 

//ESPACE DE POSTE DES VIDEOS
if(isset($rslt['image']) AND !empty($rslt['image']))
{
?>
<video src="<?php echo $rslt['image'];?>" controls poster="images/Formateurs/sk.jpg" loop></video>
<?php
}
//on recupere le nbrs total de like et de dislike preload="auto"
$req0=$bdd->prepare('SELECT aime, noaime FROM actualite WHERE id_actualite=:id_actualite');
$req0->execute(array('id_actualite'=>$id_formateur));//$rslt['id_actualite']
$rslt0=$req0->fetch();	
$like=$rslt0['aime'];
$dislike=$rslt0['noaime'];
$total=$like+$dislike;
	
$req01=$bdd->prepare('SELECT * FROM membre WHERE numero=:pseudo');
$req01->execute(array('pseudo'=>$_SESSION['contact_Etu']));
$rslt01=$req01->fetch();

?></p>
<p class="contenu" id="ici_comment" style="display:block;padding:1em;background-color:rgba(245,76,16,0.2);" align="left">
	<?php 
	$sText = htmlspecialchars($rslt['contenu']); 
	$sText=code($sText);
	$sText = urllink($sText);
	$sText = nl2br($sText);

	$iMaxLength = 1000;
	$sMessage = '...<br><br><a href="commentaires.php?id='.$rslt['id_actualite'].'#ici_comment" id='.$rslt['id_actualite'].'class="afficher_plus">Lire la suite</a>';
	wordCut("$sText", "$iMaxLength", "$sMessage");
	?>
</p>
	
     <div class="tab-tr" id="t1" style="background-color:rgba();">
			<?php
				$req2=$bdd->prepare('SELECT * FROM mespreferes WHERE ref_actualite=:id_actualite AND ref_membre=:id_membre');
				$req2->execute(array('id_actualite'=>$rslt['id_actualite'],'id_membre'=>$rslt01['id_membre']));
				$rslt2=$req2->fetch();
				
				if($rslt2['aime']==1)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" style="" class="like-btn like-h">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			
			<?php	
				}
				else if($rslt2['aime']==2)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn dislike-h"></div>
			<?php
				}
			else
			{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			<?php
					
			}
			//requetes pour compter le nombre de commentaires
			$req3=$bdd->prepare('SELECT count(*) As nbrs_comment FROM commentaire WHERE ref_actualite=:id_actualite');
			$req3->execute(array('id_actualite'=>$rslt['id_actualite']));
			$rslt3=$req3->fetch();
			?>
			<div class="share-btn share-btn<?php echo $rslt['id_actualite'];?>" id="<?php echo $rslt['id_actualite'];?>" style="font-weight:bold;">Commentaire(<?php echo $rslt3['nbrs_comment'];?>)</div>
			
            <div class="stat-cnt" style="background-color:rgba();padding:em;">
                <div class="rate-count rate-count<?php echo $rslt['id_actualite'];?>" id="<?php echo $total;?>"><?php echo $total;?></div>
                <div class="stat-bar">

                    <div class="bg-green" style="width:;"></div>
                    <div class="bg-red" style="width:100%;"></div>
                </div><!-- stat-bar -->
				
				<div class="dislike-count" id="dislike-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['noaime'];?></div>
				<div class="like-count" id="like-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['aime'];?></div>
  
            </div><!-- /stat-cnt -->
						
        </div><!-- /tab-tr -->
<br><br>
<div style="background-image:url('pattern12.png');padding:0.5em;">
<div id="mycomment"></div>
	<form id="<?php echo $rslt['id_actualite'];?>" class="form_comment form_comment<?php echo $rslt['id_actualite'];?>" name="formulaire">
				
					<div style="width:;" align="left" id="mydiv" class="mydiv<?php echo $rslt['id_actualite'];?>"> 
						<img src="<?php echo $rslt001['avatars'];?>" align="left" width="50px" height="50px" class="img-rounded" style="display: inline-block;width:%;" align="left">
						<p style="clear: both;display: inline-block;width:70%;vertical-align:top;">
							<input type="text" align="" id="contenu" class="form-control contenu contenu<?php echo $rslt['id_actualite'];?>" placeholder="Laissez un commentaire" name="contenu" style="font-size:1.1em;border-radius:5px; height:3.1em;">&nbsp <span class="uploads" style="display:none;"><img src="ajax-loader1.gif"></span><span style="font-weight:bold;color:rgba(245,76,16,1);"><button type="button"class="btn btn-primary0 smileys" id="<?php echo $rslt['id_actualite'];?>"><img src="confus.gif" width="18px" height="18px">Smileys</button></span>
								
							<input type="submit" style="display:none;">&nbsp <span class="load_comment" style="display:none;"><img src="ajax-loader6.gif"></span>
							<div style="background-color:;padding:em;border-radius:5px;margin-left:3em;display:none;" id="img_smileys<?php echo $rslt['id_actualite'];?>">
								<img src="smileys/heureux.png" class="lol" alt=":Happy:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/lol.png" class="lol" title="lol" alt=":lol:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/triste.png" class="lol" title="triste" alt=":triste:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cool.png" class="lol" title="cool" alt=":frime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/rire.png" class="lol" title="rire" alt=":D"	 id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/peur.png" class="lol" title="peur" alt=":o.O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cry.png" class="lol" title="cry" alt=":cry:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/kiss.png" class="lol" title="kiss" alt=":*" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/unsure.png" class="lol" title="unsure" alt="/:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/angel.png" class="lol" title="angel" alt=":O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/pacman.png" class="lol" title="pacman" alt=":V" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/confused.png" class="lol" title="confus" alt=":confus:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/blague.png" class="lol" title="blague" alt=":B" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/aime.png" class="lol" title="aime" alt=":aime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/choc.gif" class="lol" title="choc" alt=":o" id="<?php echo $rslt['id_actualite'];?>" width="32px" height="32px"/>
								<img src="smileys/punition.gif" class="lol" title="punition" alt=":3" onClick="javascript:contenu('');return(false)" width="35px" height="35px"/>
							</div>
							</p>
							
					</div>	
			
</form>	
<script>
function smilies0(img)
{
window.document.formulaire.contenu.value += '' + img + ' ';
document.getElementById('contenu').focus();
}
</script>	 
<div id="block_comment<?php echo $rslt['id_actualite'];?>">
<?php
$req4=$bdd->prepare('SELECT * FROM commentaire WHERE ref_actualite=:id_actualite ORDER BY id_commentaire DESC LIMIT 0,5');
$req4->execute(array('id_actualite'=>$rslt['id_actualite']));
$_SESSION['id_actualite']=$rslt['id_actualite'];
while($rslt4=$req4->fetch())
{
$message = htmlspecialchars($rslt4['contenu']); 
$message=code($message);
$message = urllink($message);

$req5=$bdd->prepare('SELECT * FROM membre WHERE id_membre=:numero');
$req5->execute(array('numero'=>$rslt4['ref_membre']));
$rslt5=$req5->fetch();	
 
?>
<div align="left" style="width:100%;">	

	<img src="<?php echo $rslt5['avatars'];?>" width="50px" height="50px" class="img-rounded" style="display: inline-block;">
	<p style="padding:0.8em;background-color:white;text-align:left;clear: both;display: inline-block;width:60%;vertical-align:top;">
		<?php
		
		
		
		
		
		
		//on affihe le bouton fermer si e commentaire nous appartient
		if($rslt5['numero']==$_SESSION['contact_Etu'])
		{	 
		?>
			<button type="button" class="close supp" id="supp<?php echo $rslt4['id_commentaire'];?>" name="<?php echo $rslt4['id_commentaire'];?>" style="font-size:1.5em;font-weigjt:bold;" data-dismiss=""><span style="display:none;" class="supp"><?php echo $rslt4['id_commentaire'];?></span>×</button>
		<?php
		}
		?>
		
		
		
		
		
		
	<?php echo $message;?><br><br>
		<b><span style="color:rgba(0,74,148,1);">@<?php echo $rslt4['id_commentaire'];?><?php echo $rslt5['prenom_membre'];?></span></b>&nbsp &nbsp <span style="color:rgba(245,76,16,1);"><?php echo date('d/m/Y H\h:i', $rslt4['date_poste']); ?></span> 
	<div id=""></div>
	<div id="rapport4" class="alert alert-success rslt<?php echo $rslt4['id_commentaire'];?>" style="display:none;width:446px;padding:0.5em;font-size:1.1em;"></div>
	</p>
</div>

<?php	
}
//si le nombre de commentaire est superieur a 5 on affiche le texte afficher plus de commentaires
if($rslt3['nbrs_comment']>=5)
{	 
?>
<div align="left" style="margin-left:50px;margin-top:5px;"><a href="commentaires.php?id=<?php echo $rslt['id_actualite'];?>#ici_comment" id="<?php echo $rslt['id_actualite'];?>" class="afficher_plus"> Afficher plus de commentaires</a></div>
<?php
}
?>
</div>
</div>			
</div><br>
<?php
}			 
		
// On met dans une variable le nombre de messages qu'on veut par page		
				// On récupère le nombre total de messages
				$req06=$bdd->prepare('SELECT count(*) As nb_messages FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC ');
				 $req06->execute(['id_fil'=>$id_specialite]);
				$donnees=$req06->fetch();
				
				
				$totalDesMessages = $donnees['nb_messages'];
				// On calcule le nombre de pages à créer
				$nombreDePages  = ceil($totalDesMessages / $nombreDeMessagesParPage);
				
				$req07=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC');
				$req07->execute(['id_fil'=>$id_specialite]);
				$donnees1=$req07->fetch();
				
				// Puis on fait une boucle pour écrire les liens vers chacune des pages
				echo '<br/><p lass="pagination pull-right" id="pagination" align="center"><b>[ Page : ';
				/* Boucle sur les pages */
				for ($i = 1 ; $i <= $nombreDePages ; $i++) {
				  if ($i < ($page-3) )
					$i = $page - 3;
						if ($i >= $page + 3 AND $i <= $nombreDePages - 3)
								echo "...";
				  if ($i > ($page+2) )
					$i = $nombreDePages ;
				  if ($i == $page )
					echo "<span id='page_active'>$i</span>";
				  else
					echo ' <button  class="page btn"  name= "'.$i.'" id="pages">'.$i.'</button> ';
				}
				echo ' ]<b></p><br/>'; 
		  
		 }
		 
		 
		 
		 
		 /* ---------------------------------------------------------------INFORMATIQUE------------------------------------------------------------ */
		 
		 
		 
		 else if($nom_filiere=='informatique')
		 {
         ?>		  
           <center><h2><strong><u>FILIERE:</u></strong>INFORMATIQUE</h2></center>
        
<?php
include 'configuration serveur/config_server.php';
			$nombreDeMessagesParPage = 5; // Essayez de changer ce nombre pour voir :o)
			// Maintenant, on va afficher les messages
			if (isset($_GET['page']))
			{
					$page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
			}
			else // La variable n'existe pas, c'est la première fois qu'on charge la page
			{	 
					$page = 1; // On se met sur la page 1 (par défaut)
			}
				 
			// On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
			$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage; 
$req=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil AND nom_cours IN("Maintenance Informatique", "Maintenance des Reseaux Informatique", "Culture Digitale", "Marketing Digital", "Les Fintech", "Community Management", "Applications Web", "Applications Mobile") ORDER BY id_actualite DESC LIMIT '.$premierMessageAafficher.','.$nombreDeMessagesParPage);
 $req->execute(['id_fil'=>$id_specialite]);



while($rslt=$req->fetch())
{
	$req0=$bdd->prepare('SELECT id_formateur, prenom_f, avatars FROM formateur WHERE id_formateur=:id_formateur');
	$req0->execute(array('id_formateur'=>$rslt['ref_formateur']));
	$rslt0=$req0->fetch(); 
	$id_formateur = $rslt0['id_formateur'];
	
	$reC=$bdd->prepare('SELECT nom_cours FROM actualite WHERE ref_formateur=:id_formateur');
	$reC->execute(array('id_formateur'=>$id_formateur));
	$rsltC=$reC->fetch(); 
?>				
			 
		 
			
			 
<div class="thumbnail" style="background-color:rgba();">
<div style="background-image:url('arriereentete2.jpg');border-top:2px solid white;border-left:2px solid white;border-right:2px solid white;">
<p class="meta" style="margin-top:0.5em;background-image:url('arriereentete2.jpg');"><img align="left" src="<?php echo $rslt0['avatars'];?>" width="64px" height="64px" class="img-rounded" style="margin-top:-0.2em;margin-left:0.2em;"> </p>
<br><p align="left">&nbsp <b style="background-color:rgba(245,76,16,0.5); padding:0.1em;">@<?php echo $rslt0['prenom_f'];?> #<?php echo $rslt['id_actualite'];?> <sup>ème</sup> Vidéo Upload</b>
<h3 align=""  style="margin-top:1em;border-top:5px solid rgba(245,76,16,0.8);height:em;"><a href="#" title="<?php echo $rslt['contenu'];?>"> <?php echo $rslt['titre'];?></a></h3>
</p>
</div>


<p align="center" style="font-weight:bold;"> 
<img src="detail.png"> Cours: 
<a href="#" title="Filiere: <?php echo $_SESSION['filiere_F'];?>"><?php echo $rsltC['nom_cours'];?> </a>, date d'ajout: <?php echo date('d/m/Y H:i', $rslt['date_ajout']); ?>
</p>


<p style="display:block;padding:em;">
<?php 

//ESPACE DE POSTE DES VIDEOS
if(isset($rslt['image']) AND !empty($rslt['image']))
{
?>
<video src="<?php echo $rslt['image'];?>" controls poster="images/Formateurs/sk.jpg" loop></video>
<?php
}
//on recupere le nbrs total de like et de dislike preload="auto"
$req0=$bdd->prepare('SELECT aime, noaime FROM actualite WHERE id_actualite=:id_actualite');
$req0->execute(array('id_actualite'=>$id_formateur));//$rslt['id_actualite']
$rslt0=$req0->fetch();	
$like=$rslt0['aime'];
$dislike=$rslt0['noaime'];
$total=$like+$dislike;
	
$req01=$bdd->prepare('SELECT * FROM membre WHERE numero=:pseudo');
$req01->execute(array('pseudo'=>$_SESSION['contact_Etu']));
$rslt01=$req01->fetch();

?></p>
<p class="contenu" id="ici_comment" style="display:block;padding:1em;background-color:rgba(245,76,16,0.2);" align="left">
	<?php 
	$sText = htmlspecialchars($rslt['contenu']); 
	$sText=code($sText);
	$sText = urllink($sText);
	$sText = nl2br($sText);

	$iMaxLength = 1000;
	$sMessage = '...<br><br><a href="commentaires.php?id='.$rslt['id_actualite'].'#ici_comment" id='.$rslt['id_actualite'].'class="afficher_plus">Lire la suite</a>';
	wordCut("$sText", "$iMaxLength", "$sMessage");
	?>
</p>
	
     <div class="tab-tr" id="t1" style="background-color:rgba();">
			<?php
				$req2=$bdd->prepare('SELECT * FROM mespreferes WHERE ref_actualite=:id_actualite AND ref_membre=:id_membre');
				$req2->execute(array('id_actualite'=>$rslt['id_actualite'],'id_membre'=>$rslt01['id_membre']));
				$rslt2=$req2->fetch();
				
				if($rslt2['aime']==1)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" style="" class="like-btn like-h">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			
			<?php	
				}
				else if($rslt2['aime']==2)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn dislike-h"></div>
			<?php
				}
			else
			{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			<?php
					
			}
			//requetes pour compter le nombre de commentaires
			$req3=$bdd->prepare('SELECT count(*) As nbrs_comment FROM commentaire WHERE ref_actualite=:id_actualite');
			$req3->execute(array('id_actualite'=>$rslt['id_actualite']));
			$rslt3=$req3->fetch();
			?>
			<div class="share-btn share-btn<?php echo $rslt['id_actualite'];?>" id="<?php echo $rslt['id_actualite'];?>" style="font-weight:bold;">Commentaire(<?php echo $rslt3['nbrs_comment'];?>)</div>
			
            <div class="stat-cnt" style="background-color:rgba();padding:em;">
                <div class="rate-count rate-count<?php echo $rslt['id_actualite'];?>" id="<?php echo $total;?>"><?php echo $total;?></div>
                <div class="stat-bar">

                    <div class="bg-green" style="width:;"></div>
                    <div class="bg-red" style="width:100%;"></div>
                </div><!-- stat-bar -->
				
				<div class="dislike-count" id="dislike-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['noaime'];?></div>
				<div class="like-count" id="like-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['aime'];?></div>
  
            </div><!-- /stat-cnt -->
						
        </div><!-- /tab-tr -->
<br><br>
<div style="background-image:url('pattern12.png');padding:0.5em;">
<div id="mycomment"></div>
	<form id="<?php echo $rslt['id_actualite'];?>" class="form_comment form_comment<?php echo $rslt['id_actualite'];?>" name="formulaire">
				
					<div style="width:;" align="left" id="mydiv" class="mydiv<?php echo $rslt['id_actualite'];?>"> 
						<img src="<?php echo $rslt001['avatars'];?>" align="left" width="50px" height="50px" class="img-rounded" style="display: inline-block;width:%;" align="left">
						<p style="clear: both;display: inline-block;width:70%;vertical-align:top;">
							<input type="text" align="" id="contenu" class="form-control contenu contenu<?php echo $rslt['id_actualite'];?>" placeholder="Laissez un commentaire" name="contenu" style="font-size:1.1em;border-radius:5px; height:3.1em;">&nbsp <span class="uploads" style="display:none;"><img src="ajax-loader1.gif"></span><span style="font-weight:bold;color:rgba(245,76,16,1);"><button type="button"class="btn btn-primary0 smileys" id="<?php echo $rslt['id_actualite'];?>"><img src="confus.gif" width="18px" height="18px">Smileys</button></span>
								
							<input type="submit" style="display:none;">&nbsp <span class="load_comment" style="display:none;"><img src="ajax-loader6.gif"></span>
							<div style="background-color:;padding:em;border-radius:5px;margin-left:3em;display:none;" id="img_smileys<?php echo $rslt['id_actualite'];?>">
								<img src="smileys/heureux.png" class="lol" alt=":Happy:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/lol.png" class="lol" title="lol" alt=":lol:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/triste.png" class="lol" title="triste" alt=":triste:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cool.png" class="lol" title="cool" alt=":frime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/rire.png" class="lol" title="rire" alt=":D"	 id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/peur.png" class="lol" title="peur" alt=":o.O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cry.png" class="lol" title="cry" alt=":cry:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/kiss.png" class="lol" title="kiss" alt=":*" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/unsure.png" class="lol" title="unsure" alt="/:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/angel.png" class="lol" title="angel" alt=":O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/pacman.png" class="lol" title="pacman" alt=":V" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/confused.png" class="lol" title="confus" alt=":confus:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/blague.png" class="lol" title="blague" alt=":B" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/aime.png" class="lol" title="aime" alt=":aime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/choc.gif" class="lol" title="choc" alt=":o" id="<?php echo $rslt['id_actualite'];?>" width="32px" height="32px"/>
								<img src="smileys/punition.gif" class="lol" title="punition" alt=":3" onClick="javascript:contenu('');return(false)" width="35px" height="35px"/>
							</div>
							</p>
							
					</div>	
			
</form>	
<script>
function smilies0(img)
{
window.document.formulaire.contenu.value += '' + img + ' ';
document.getElementById('contenu').focus();
}
</script>	 
<div id="block_comment<?php echo $rslt['id_actualite'];?>">
<?php
$req4=$bdd->prepare('SELECT * FROM commentaire WHERE ref_actualite=:id_actualite ORDER BY id_commentaire DESC LIMIT 0,5');
$req4->execute(array('id_actualite'=>$rslt['id_actualite']));
$_SESSION['id_actualite']=$rslt['id_actualite'];
while($rslt4=$req4->fetch())
{
$message = htmlspecialchars($rslt4['contenu']); 
$message=code($message);
$message = urllink($message);

$req5=$bdd->prepare('SELECT * FROM membre WHERE id_membre=:numero');
$req5->execute(array('numero'=>$rslt4['ref_membre']));
$rslt5=$req5->fetch();	
 
?>
<div align="left" style="width:100%;">	

	<img src="<?php echo $rslt5['avatars'];?>" width="50px" height="50px" class="img-rounded" style="display: inline-block;">
	<p style="padding:0.8em;background-color:white;text-align:left;clear: both;display: inline-block;width:60%;vertical-align:top;">
		<?php
		
		
		
		
		
		
		//on affihe le bouton fermer si e commentaire nous appartient
		if($rslt5['numero']==$_SESSION['contact_Etu'])
		{	 
		?>
			<button type="button" class="close supp" id="supp<?php echo $rslt4['id_commentaire'];?>" name="<?php echo $rslt4['id_commentaire'];?>" style="font-size:1.5em;font-weigjt:bold;" data-dismiss=""><span style="display:none;" class="supp"><?php echo $rslt4['id_commentaire'];?></span>×</button>
		<?php
		}
		?>
		
		
		
		
		
		
	<?php echo $message;?><br><br>
		<b><span style="color:rgba(0,74,148,1);">@<?php echo $rslt4['id_commentaire'];?><?php echo $rslt5['prenom_membre'];?></span></b>&nbsp &nbsp <span style="color:rgba(245,76,16,1);"><?php echo date('d/m/Y H\h:i', $rslt4['date_poste']); ?></span> 
	<div id=""></div>
	<div id="rapport4" class="alert alert-success rslt<?php echo $rslt4['id_commentaire'];?>" style="display:none;width:446px;padding:0.5em;font-size:1.1em;"></div>
	</p>
</div>

<?php	
}
//si le nombre de commentaire est superieur a 5 on affiche le texte afficher plus de commentaires
if($rslt3['nbrs_comment']>=5)
{	 
?>
<div align="left" style="margin-left:50px;margin-top:5px;"><a href="commentaires.php?id=<?php echo $rslt['id_actualite'];?>#ici_comment" id="<?php echo $rslt['id_actualite'];?>" class="afficher_plus"> Afficher plus de commentaires</a></div>
<?php
}
?>
</div>
</div>			
</div><br>
<?php
}			 
		
// On met dans une variable le nombre de messages qu'on veut par page		
				// On récupère le nombre total de messages
				$req06=$bdd->prepare('SELECT count(*) As nb_messages FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC ');
				 $req06->execute(['id_fil'=>$id_specialite]);
				$donnees=$req06->fetch();
				
				
				$totalDesMessages = $donnees['nb_messages'];
				// On calcule le nombre de pages à créer
				$nombreDePages  = ceil($totalDesMessages / $nombreDeMessagesParPage);
				
				$req07=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC');
				$req07->execute(['id_fil'=>$id_specialite]);
				$donnees1=$req07->fetch();
				
				// Puis on fait une boucle pour écrire les liens vers chacune des pages
				echo '<br/><p lass="pagination pull-right" id="pagination" align="center"><b>[ Page : ';
				/* Boucle sur les pages */
				for ($i = 1 ; $i <= $nombreDePages ; $i++) {
				  if ($i < ($page-3) )
					$i = $page - 3;
						if ($i >= $page + 3 AND $i <= $nombreDePages - 3)
								echo "...";
				  if ($i > ($page+2) )
					$i = $nombreDePages ;
				  if ($i == $page )
					echo "<span id='page_active'>$i</span>";
				  else
					echo ' <button  class="page btn"  name= "'.$i.'" id="pages">'.$i.'</button> ';
				}
				echo ' ]<b></p><br/>'; 		  
		 }
		 
		 
		 
		 
		 
		/*------------------------------------------------------------------------COMPTABILITE-------------------------------------------------- */ 
		 
		 else if($nom_filiere=='comptabilite')
		 {
         ?>		  
           <center><h2><strong><u>FILIERE:</u></strong>COMPTABILITE</h2></center>
        
<?php
include 'configuration serveur/config_server.php';
			$nombreDeMessagesParPage = 5; // Essayez de changer ce nombre pour voir :o)
			// Maintenant, on va afficher les messages
			if (isset($_GET['page']))
			{
					$page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
			}
			else // La variable n'existe pas, c'est la première fois qu'on charge la page
			{	 
					$page = 1; // On se met sur la page 1 (par défaut)
			}
				 
			// On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
			$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage; 
$req=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil AND nom_cours IN("Sage Comptabilite", "Sage gestion Commerciale", "Sage Paie") ORDER BY id_actualite DESC LIMIT '.$premierMessageAafficher.','.$nombreDeMessagesParPage);
 $req->execute(['id_fil'=>$id_specialite]);



while($rslt=$req->fetch())
{
	$req0=$bdd->prepare('SELECT id_formateur, prenom_f, avatars FROM formateur WHERE id_formateur=:id_formateur');
	$req0->execute(array('id_formateur'=>$rslt['ref_formateur']));
	$rslt0=$req0->fetch(); 
	$id_formateur = $rslt0['id_formateur'];
	
	$reC=$bdd->prepare('SELECT nom_cours FROM actualite WHERE ref_formateur=:id_formateur');
	$reC->execute(array('id_formateur'=>$id_formateur));
	$rsltC=$reC->fetch(); 
?>				
			 
		 
			
			 
<div class="thumbnail" style="background-color:rgba();">
<div style="background-image:url('arriereentete2.jpg');border-top:2px solid white;border-left:2px solid white;border-right:2px solid white;">
<p class="meta" style="margin-top:0.5em;background-image:url('arriereentete2.jpg');"><img align="left" src="<?php echo $rslt0['avatars'];?>" width="64px" height="64px" class="img-rounded" style="margin-top:-0.2em;margin-left:0.2em;"> </p>
<br><p align="left">&nbsp <b style="background-color:rgba(245,76,16,0.5); padding:0.1em;">@<?php echo $rslt0['prenom_f'];?> #<?php echo $rslt['id_actualite'];?> <sup>ème</sup> Vidéo Upload</b>
<h3 align=""  style="margin-top:1em;border-top:5px solid rgba(245,76,16,0.8);height:em;"><a href="#" title="<?php echo $rslt['contenu'];?>"> <?php echo $rslt['titre'];?></a></h3>
</p>
</div>


<p align="center" style="font-weight:bold;"> 
<img src="detail.png"> Cours: 
<a href="#" title="Filiere: <?php echo $_SESSION['filiere_F'];?>"><?php echo $rsltC['nom_cours'];?> </a>, date d'ajout: <?php echo date('d/m/Y H:i', $rslt['date_ajout']); ?>
</p>


<p style="display:block;padding:em;">
<?php 

//ESPACE DE POSTE DES VIDEOS
if(isset($rslt['image']) AND !empty($rslt['image']))
{
?>
<video src="<?php echo $rslt['image'];?>" controls poster="images/Formateurs/sk.jpg" loop></video>
<?php
}
//on recupere le nbrs total de like et de dislike preload="auto"
$req0=$bdd->prepare('SELECT aime, noaime FROM actualite WHERE id_actualite=:id_actualite');
$req0->execute(array('id_actualite'=>$id_formateur));//$rslt['id_actualite']
$rslt0=$req0->fetch();	
$like=$rslt0['aime'];
$dislike=$rslt0['noaime'];
$total=$like+$dislike;
	
$req01=$bdd->prepare('SELECT * FROM membre WHERE numero=:pseudo');
$req01->execute(array('pseudo'=>$_SESSION['contact_Etu']));
$rslt01=$req01->fetch();

?></p>
<p class="contenu" id="ici_comment" style="display:block;padding:1em;background-color:rgba(245,76,16,0.2);" align="left">
	<?php 
	$sText = htmlspecialchars($rslt['contenu']); 
	$sText=code($sText);
	$sText = urllink($sText);
	$sText = nl2br($sText);

	$iMaxLength = 1000;
	$sMessage = '...<br><br><a href="commentaires.php?id='.$rslt['id_actualite'].'#ici_comment" id='.$rslt['id_actualite'].'class="afficher_plus">Lire la suite</a>';
	wordCut("$sText", "$iMaxLength", "$sMessage");
	?>
</p>
	
     <div class="tab-tr" id="t1" style="background-color:rgba();">
			<?php
				$req2=$bdd->prepare('SELECT * FROM mespreferes WHERE ref_actualite=:id_actualite AND ref_membre=:id_membre');
				$req2->execute(array('id_actualite'=>$rslt['id_actualite'],'id_membre'=>$rslt01['id_membre']));
				$rslt2=$req2->fetch();
				
				if($rslt2['aime']==1)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" style="" class="like-btn like-h">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			
			<?php	
				}
				else if($rslt2['aime']==2)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn dislike-h"></div>
			<?php
				}
			else
			{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			<?php
					
			}
			//requetes pour compter le nombre de commentaires
			$req3=$bdd->prepare('SELECT count(*) As nbrs_comment FROM commentaire WHERE ref_actualite=:id_actualite');
			$req3->execute(array('id_actualite'=>$rslt['id_actualite']));
			$rslt3=$req3->fetch();
			?>
			<div class="share-btn share-btn<?php echo $rslt['id_actualite'];?>" id="<?php echo $rslt['id_actualite'];?>" style="font-weight:bold;">Commentaire(<?php echo $rslt3['nbrs_comment'];?>)</div>
			
            <div class="stat-cnt" style="background-color:rgba();padding:em;">
                <div class="rate-count rate-count<?php echo $rslt['id_actualite'];?>" id="<?php echo $total;?>"><?php echo $total;?></div>
                <div class="stat-bar">

                    <div class="bg-green" style="width:;"></div>
                    <div class="bg-red" style="width:100%;"></div>
                </div><!-- stat-bar -->
				
				<div class="dislike-count" id="dislike-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['noaime'];?></div>
				<div class="like-count" id="like-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['aime'];?></div>
  
            </div><!-- /stat-cnt -->
						
        </div><!-- /tab-tr -->
<br><br>
<div style="background-image:url('pattern12.png');padding:0.5em;">
<div id="mycomment"></div>
	<form id="<?php echo $rslt['id_actualite'];?>" class="form_comment form_comment<?php echo $rslt['id_actualite'];?>" name="formulaire">
				
					<div style="width:;" align="left" id="mydiv" class="mydiv<?php echo $rslt['id_actualite'];?>"> 
						<img src="<?php echo $rslt001['avatars'];?>" align="left" width="50px" height="50px" class="img-rounded" style="display: inline-block;width:%;" align="left">
						<p style="clear: both;display: inline-block;width:70%;vertical-align:top;">
							<input type="text" align="" id="contenu" class="form-control contenu contenu<?php echo $rslt['id_actualite'];?>" placeholder="Laissez un commentaire" name="contenu" style="font-size:1.1em;border-radius:5px; height:3.1em;">&nbsp <span class="uploads" style="display:none;"><img src="ajax-loader1.gif"></span><span style="font-weight:bold;color:rgba(245,76,16,1);"><button type="button"class="btn btn-primary0 smileys" id="<?php echo $rslt['id_actualite'];?>"><img src="confus.gif" width="18px" height="18px">Smileys</button></span>
								
							<input type="submit" style="display:none;">&nbsp <span class="load_comment" style="display:none;"><img src="ajax-loader6.gif"></span>
							<div style="background-color:;padding:em;border-radius:5px;margin-left:3em;display:none;" id="img_smileys<?php echo $rslt['id_actualite'];?>">
								<img src="smileys/heureux.png" class="lol" alt=":Happy:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/lol.png" class="lol" title="lol" alt=":lol:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/triste.png" class="lol" title="triste" alt=":triste:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cool.png" class="lol" title="cool" alt=":frime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/rire.png" class="lol" title="rire" alt=":D"	 id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/peur.png" class="lol" title="peur" alt=":o.O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cry.png" class="lol" title="cry" alt=":cry:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/kiss.png" class="lol" title="kiss" alt=":*" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/unsure.png" class="lol" title="unsure" alt="/:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/angel.png" class="lol" title="angel" alt=":O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/pacman.png" class="lol" title="pacman" alt=":V" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/confused.png" class="lol" title="confus" alt=":confus:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/blague.png" class="lol" title="blague" alt=":B" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/aime.png" class="lol" title="aime" alt=":aime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/choc.gif" class="lol" title="choc" alt=":o" id="<?php echo $rslt['id_actualite'];?>" width="32px" height="32px"/>
								<img src="smileys/punition.gif" class="lol" title="punition" alt=":3" onClick="javascript:contenu('');return(false)" width="35px" height="35px"/>
							</div>
							</p>
							
					</div>	
			
</form>	
<script>
function smilies0(img)
{
window.document.formulaire.contenu.value += '' + img + ' ';
document.getElementById('contenu').focus();
}
</script>	 
<div id="block_comment<?php echo $rslt['id_actualite'];?>">
<?php
$req4=$bdd->prepare('SELECT * FROM commentaire WHERE ref_actualite=:id_actualite ORDER BY id_commentaire DESC LIMIT 0,5');
$req4->execute(array('id_actualite'=>$rslt['id_actualite']));
$_SESSION['id_actualite']=$rslt['id_actualite'];
while($rslt4=$req4->fetch())
{
$message = htmlspecialchars($rslt4['contenu']); 
$message=code($message);
$message = urllink($message);

$req5=$bdd->prepare('SELECT * FROM membre WHERE id_membre=:numero');
$req5->execute(array('numero'=>$rslt4['ref_membre']));
$rslt5=$req5->fetch();	
 
?>
<div align="left" style="width:100%;">	

	<img src="<?php echo $rslt5['avatars'];?>" width="50px" height="50px" class="img-rounded" style="display: inline-block;">
	<p style="padding:0.8em;background-color:white;text-align:left;clear: both;display: inline-block;width:60%;vertical-align:top;">
		<?php
		
		
		
		
		
		
		//on affihe le bouton fermer si e commentaire nous appartient
		if($rslt5['numero']==$_SESSION['contact_Etu'])
		{	 
		?>
			<button type="button" class="close supp" id="supp<?php echo $rslt4['id_commentaire'];?>" name="<?php echo $rslt4['id_commentaire'];?>" style="font-size:1.5em;font-weigjt:bold;" data-dismiss=""><span style="display:none;" class="supp"><?php echo $rslt4['id_commentaire'];?></span>×</button>
		<?php
		}
		?>
		
		
		
		
		
		
	<?php echo $message;?><br><br>
		<b><span style="color:rgba(0,74,148,1);">@<?php echo $rslt4['id_commentaire'];?><?php echo $rslt5['prenom_membre'];?></span></b>&nbsp &nbsp <span style="color:rgba(245,76,16,1);"><?php echo date('d/m/Y H\h:i', $rslt4['date_poste']); ?></span> 
	<div id=""></div>
	<div id="rapport4" class="alert alert-success rslt<?php echo $rslt4['id_commentaire'];?>" style="display:none;width:446px;padding:0.5em;font-size:1.1em;"></div>
	</p>
</div>

<?php	
}
//si le nombre de commentaire est superieur a 5 on affiche le texte afficher plus de commentaires
if($rslt3['nbrs_comment']>=5)
{	 
?>
<div align="left" style="margin-left:50px;margin-top:5px;"><a href="commentaires.php?id=<?php echo $rslt['id_actualite'];?>#ici_comment" id="<?php echo $rslt['id_actualite'];?>" class="afficher_plus"> Afficher plus de commentaires</a></div>
<?php
}
?>
</div>
</div>			
</div><br>
<?php
}			 
		
// On met dans une variable le nombre de messages qu'on veut par page		
				// On récupère le nombre total de messages
				$req06=$bdd->prepare('SELECT count(*) As nb_messages FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC ');
				 $req06->execute(['id_fil'=>$id_specialite]);
				$donnees=$req06->fetch();
				
				
				$totalDesMessages = $donnees['nb_messages'];
				// On calcule le nombre de pages à créer
				$nombreDePages  = ceil($totalDesMessages / $nombreDeMessagesParPage);
				
				$req07=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC');
				$req07->execute(['id_fil'=>$id_specialite]);
				$donnees1=$req07->fetch();
				
				// Puis on fait une boucle pour écrire les liens vers chacune des pages
				echo '<br/><p lass="pagination pull-right" id="pagination" align="center"><b>[ Page : ';
				/* Boucle sur les pages */
				for ($i = 1 ; $i <= $nombreDePages ; $i++) {
				  if ($i < ($page-3) )
					$i = $page - 3;
						if ($i >= $page + 3 AND $i <= $nombreDePages - 3)
								echo "...";
				  if ($i > ($page+2) )
					$i = $nombreDePages ;
				  if ($i == $page )
					echo "<span id='page_active'>$i</span>";
				  else
					echo ' <button  class="page btn"  name= "'.$i.'" id="pages">'.$i.'</button> ';
				}
				echo ' ]<b></p><br/>';		  
		 }
		 
		 
		 
		/*------------------------------------------------------------------------COMMERCIALE-------------------------------------------------- */ 
		 
		 else if($nom_filiere=='vente')
		 {
         ?>		  
           <center><h2><strong><u>FILIERE:</u></strong>COMMERCIALE</h2></center>
        
<?php
include 'configuration serveur/config_server.php';
			$nombreDeMessagesParPage = 5; // Essayez de changer ce nombre pour voir :o)
			// Maintenant, on va afficher les messages
			if (isset($_GET['page']))
			{
					$page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
			}
			else // La variable n'existe pas, c'est la première fois qu'on charge la page
			{	 
					$page = 1; // On se met sur la page 1 (par défaut)
			}
				 
			// On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
			$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage; 
$req=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil AND nom_cours IN("Methode et Outils de Fidelisation de la Clientele", "Mener Efficacement les Negociations Commerciales") ORDER BY id_actualite DESC LIMIT '.$premierMessageAafficher.','.$nombreDeMessagesParPage);
 $req->execute(['id_fil'=>$id_specialite]);



while($rslt=$req->fetch())
{
	$req0=$bdd->prepare('SELECT id_formateur, prenom_f, avatars FROM formateur WHERE id_formateur=:id_formateur');
	$req0->execute(array('id_formateur'=>$rslt['ref_formateur']));
	$rslt0=$req0->fetch(); 
	$id_formateur = $rslt0['id_formateur'];
	
	$reC=$bdd->prepare('SELECT nom_cours FROM actualite WHERE ref_formateur=:id_formateur');
	$reC->execute(array('id_formateur'=>$id_formateur));
	$rsltC=$reC->fetch(); 
?>				
			 
		 
			
			 
<div class="thumbnail" style="background-color:rgba();">
<div style="background-image:url('arriereentete2.jpg');border-top:2px solid white;border-left:2px solid white;border-right:2px solid white;">
<p class="meta" style="margin-top:0.5em;background-image:url('arriereentete2.jpg');"><img align="left" src="<?php echo $rslt0['avatars'];?>" width="64px" height="64px" class="img-rounded" style="margin-top:-0.2em;margin-left:0.2em;"> </p>
<br><p align="left">&nbsp <b style="background-color:rgba(245,76,16,0.5); padding:0.1em;">@<?php echo $rslt0['prenom_f'];?> #<?php echo $rslt['id_actualite'];?> <sup>ème</sup> Vidéo Upload</b>
<h3 align=""  style="margin-top:1em;border-top:5px solid rgba(245,76,16,0.8);height:em;"><a href="#" title="<?php echo $rslt['contenu'];?>"> <?php echo $rslt['titre'];?></a></h3>
</p>
</div>


<p align="center" style="font-weight:bold;"> 
<img src="detail.png"> Cours: 
<a href="#" title="Filiere: <?php echo $_SESSION['filiere_F'];?>"><?php echo $rsltC['nom_cours'];?> </a>, date d'ajout: <?php echo date('d/m/Y H:i', $rslt['date_ajout']); ?>
</p>


<p style="display:block;padding:em;">
<?php 

//ESPACE DE POSTE DES VIDEOS
if(isset($rslt['image']) AND !empty($rslt['image']))
{
?>
<video src="<?php echo $rslt['image'];?>" controls poster="images/Formateurs/sk.jpg" loop></video>
<?php
}
//on recupere le nbrs total de like et de dislike preload="auto"
$req0=$bdd->prepare('SELECT aime, noaime FROM actualite WHERE id_actualite=:id_actualite');
$req0->execute(array('id_actualite'=>$id_formateur));//$rslt['id_actualite']
$rslt0=$req0->fetch();	
$like=$rslt0['aime'];
$dislike=$rslt0['noaime'];
$total=$like+$dislike;
	
$req01=$bdd->prepare('SELECT * FROM membre WHERE numero=:pseudo');
$req01->execute(array('pseudo'=>$_SESSION['contact_Etu']));
$rslt01=$req01->fetch();

?></p>
<p class="contenu" id="ici_comment" style="display:block;padding:1em;background-color:rgba(245,76,16,0.2);" align="left">
	<?php 
	$sText = htmlspecialchars($rslt['contenu']); 
	$sText=code($sText);
	$sText = urllink($sText);
	$sText = nl2br($sText);

	$iMaxLength = 1000;
	$sMessage = '...<br><br><a href="commentaires.php?id='.$rslt['id_actualite'].'#ici_comment" id='.$rslt['id_actualite'].'class="afficher_plus">Lire la suite</a>';
	wordCut("$sText", "$iMaxLength", "$sMessage");
	?>
</p>
	
     <div class="tab-tr" id="t1" style="background-color:rgba();">
			<?php
				$req2=$bdd->prepare('SELECT * FROM mespreferes WHERE ref_actualite=:id_actualite AND ref_membre=:id_membre');
				$req2->execute(array('id_actualite'=>$rslt['id_actualite'],'id_membre'=>$rslt01['id_membre']));
				$rslt2=$req2->fetch();
				
				if($rslt2['aime']==1)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" style="" class="like-btn like-h">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			
			<?php	
				}
				else if($rslt2['aime']==2)
				{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn dislike-h"></div>
			<?php
				}
			else
			{
			?>
			<div id="<?php echo $rslt['id_actualite'];?>" class="like-btn">Like</div>
			<div id="<?php echo $rslt['id_actualite'];?>" class="dislike-btn"></div>
			<?php
					
			}
			//requetes pour compter le nombre de commentaires
			$req3=$bdd->prepare('SELECT count(*) As nbrs_comment FROM commentaire WHERE ref_actualite=:id_actualite');
			$req3->execute(array('id_actualite'=>$rslt['id_actualite']));
			$rslt3=$req3->fetch();
			?>
			<div class="share-btn share-btn<?php echo $rslt['id_actualite'];?>" id="<?php echo $rslt['id_actualite'];?>" style="font-weight:bold;">Commentaire(<?php echo $rslt3['nbrs_comment'];?>)</div>
			
            <div class="stat-cnt" style="background-color:rgba();padding:em;">
                <div class="rate-count rate-count<?php echo $rslt['id_actualite'];?>" id="<?php echo $total;?>"><?php echo $total;?></div>
                <div class="stat-bar">

                    <div class="bg-green" style="width:;"></div>
                    <div class="bg-red" style="width:100%;"></div>
                </div><!-- stat-bar -->
				
				<div class="dislike-count" id="dislike-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['noaime'];?></div>
				<div class="like-count" id="like-count<?php echo $rslt['id_actualite'];?>"><?php echo $rslt['aime'];?></div>
  
            </div><!-- /stat-cnt -->
						
        </div><!-- /tab-tr -->
<br><br>
<div style="background-image:url('pattern12.png');padding:0.5em;">
<div id="mycomment"></div>
	<form id="<?php echo $rslt['id_actualite'];?>" class="form_comment form_comment<?php echo $rslt['id_actualite'];?>" name="formulaire">
				
					<div style="width:;" align="left" id="mydiv" class="mydiv<?php echo $rslt['id_actualite'];?>"> 
						<img src="<?php echo $rslt001['avatars'];?>" align="left" width="50px" height="50px" class="img-rounded" style="display: inline-block;width:%;" align="left">
						<p style="clear: both;display: inline-block;width:70%;vertical-align:top;">
							<input type="text" align="" id="contenu" class="form-control contenu contenu<?php echo $rslt['id_actualite'];?>" placeholder="Laissez un commentaire" name="contenu" style="font-size:1.1em;border-radius:5px; height:3.1em;">&nbsp <span class="uploads" style="display:none;"><img src="ajax-loader1.gif"></span><span style="font-weight:bold;color:rgba(245,76,16,1);"><button type="button"class="btn btn-primary0 smileys" id="<?php echo $rslt['id_actualite'];?>"><img src="confus.gif" width="18px" height="18px">Smileys</button></span>
								
							<input type="submit" style="display:none;">&nbsp <span class="load_comment" style="display:none;"><img src="ajax-loader6.gif"></span>
							<div style="background-color:;padding:em;border-radius:5px;margin-left:3em;display:none;" id="img_smileys<?php echo $rslt['id_actualite'];?>">
								<img src="smileys/heureux.png" class="lol" alt=":Happy:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/lol.png" class="lol" title="lol" alt=":lol:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/triste.png" class="lol" title="triste" alt=":triste:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cool.png" class="lol" title="cool" alt=":frime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/rire.png" class="lol" title="rire" alt=":D"	 id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/peur.png" class="lol" title="peur" alt=":o.O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/cry.png" class="lol" title="cry" alt=":cry:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/kiss.png" class="lol" title="kiss" alt=":*" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								
								<img src="smileys/unsure.png" class="lol" title="unsure" alt="/:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/angel.png" class="lol" title="angel" alt=":O" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/pacman.png" class="lol" title="pacman" alt=":V" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/confused.png" class="lol" title="confus" alt=":confus:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/blague.png" class="lol" title="blague" alt=":B" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/aime.png" class="lol" title="aime" alt=":aime:" id="<?php echo $rslt['id_actualite'];?>" width="25px" height="25px"/>
								<img src="smileys/choc.gif" class="lol" title="choc" alt=":o" id="<?php echo $rslt['id_actualite'];?>" width="32px" height="32px"/>
								<img src="smileys/punition.gif" class="lol" title="punition" alt=":3" onClick="javascript:contenu('');return(false)" width="35px" height="35px"/>
							</div>
							</p>
							
					</div>	
			
</form>	
<script>
function smilies0(img)
{
window.document.formulaire.contenu.value += '' + img + ' ';
document.getElementById('contenu').focus();
}
</script>	 
<div id="block_comment<?php echo $rslt['id_actualite'];?>">
<?php
$req4=$bdd->prepare('SELECT * FROM commentaire WHERE ref_actualite=:id_actualite ORDER BY id_commentaire DESC LIMIT 0,5');
$req4->execute(array('id_actualite'=>$rslt['id_actualite']));
$_SESSION['id_actualite']=$rslt['id_actualite'];
while($rslt4=$req4->fetch())
{
$message = htmlspecialchars($rslt4['contenu']); 
$message=code($message);
$message = urllink($message);

$req5=$bdd->prepare('SELECT * FROM membre WHERE id_membre=:numero');
$req5->execute(array('numero'=>$rslt4['ref_membre']));
$rslt5=$req5->fetch();	
 
?>
<div align="left" style="width:100%;">	

	<img src="<?php echo $rslt5['avatars'];?>" width="50px" height="50px" class="img-rounded" style="display: inline-block;">
	<p style="padding:0.8em;background-color:white;text-align:left;clear: both;display: inline-block;width:60%;vertical-align:top;">
		<?php
		
		
		
		
		
		
		//on affihe le bouton fermer si e commentaire nous appartient
		if($rslt5['numero']==$_SESSION['contact_Etu'])
		{	 
		?>
			<button type="button" class="close supp" id="supp<?php echo $rslt4['id_commentaire'];?>" name="<?php echo $rslt4['id_commentaire'];?>" style="font-size:1.5em;font-weigjt:bold;" data-dismiss=""><span style="display:none;" class="supp"><?php echo $rslt4['id_commentaire'];?></span>×</button>
		<?php
		}
		?>
		
		
		
		
		
		
	<?php echo $message;?><br><br>
		<b><span style="color:rgba(0,74,148,1);">@<?php echo $rslt4['id_commentaire'];?><?php echo $rslt5['prenom_membre'];?></span></b>&nbsp &nbsp <span style="color:rgba(245,76,16,1);"><?php echo date('d/m/Y H\h:i', $rslt4['date_poste']); ?></span> 
	<div id=""></div>
	<div id="rapport4" class="alert alert-success rslt<?php echo $rslt4['id_commentaire'];?>" style="display:none;width:446px;padding:0.5em;font-size:1.1em;"></div>
	</p>
</div>

<?php	
}
//si le nombre de commentaire est superieur a 5 on affiche le texte afficher plus de commentaires
if($rslt3['nbrs_comment']>=5)
{	 
?>
<div align="left" style="margin-left:50px;margin-top:5px;"><a href="commentaires.php?id=<?php echo $rslt['id_actualite'];?>#ici_comment" id="<?php echo $rslt['id_actualite'];?>" class="afficher_plus"> Afficher plus de commentaires</a></div>
<?php
}
?>
</div>
</div>			
</div><br>
<?php
}			 
		
// On met dans une variable le nombre de messages qu'on veut par page		
				// On récupère le nombre total de messages
				$req06=$bdd->prepare('SELECT count(*) As nb_messages FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC ');
				 $req06->execute(['id_fil'=>$id_specialite]);
				$donnees=$req06->fetch();
				
				
				$totalDesMessages = $donnees['nb_messages'];
				// On calcule le nombre de pages à créer
				$nombreDePages  = ceil($totalDesMessages / $nombreDeMessagesParPage);
				
				$req07=$bdd->prepare('SELECT * FROM actualite WHERE ref_filiere=:id_fil ORDER BY id_actualite DESC');
				$req07->execute(['id_fil'=>$id_specialite]);
				$donnees1=$req07->fetch();
				
				// Puis on fait une boucle pour écrire les liens vers chacune des pages
				echo '<br/><p lass="pagination pull-right" id="pagination" align="center"><b>[ Page : ';
				/* Boucle sur les pages */
				for ($i = 1 ; $i <= $nombreDePages ; $i++) {
				  if ($i < ($page-3) )
					$i = $page - 3;
						if ($i >= $page + 3 AND $i <= $nombreDePages - 3)
								echo "...";
				  if ($i > ($page+2) )
					$i = $nombreDePages ;
				  if ($i == $page )
					echo "<span id='page_active'>$i</span>";
				  else
					echo ' <button  class="page btn"  name= "'.$i.'" id="pages">'.$i.'</button> ';
				}
				echo ' ]<b></p><br/>';		  
		 }
        ?>	

         
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		
			 
  </article><hr>
</div>


<!-- Sidebar comumn -->

</div>
</div>
</div>
</section>
 <!-- Footer
  ================================================== -->
<?php include('footer.html'); ?>
<span id="themesBtn"></span>
 <script src="jquery.js"></script>
    <script>
     $(function () {
  
		$('#publier').click(function(){

		$('#block_publier').toggle();	
		});

       $('#my_form').on('submit', function (e) {
        // On empêche le navigateur de soumettre le formulaire
        e.preventDefault();
		$('.gifpub').show();
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
				$('.gifpub').hide();
				$('#rapport').html(data).show().fadeIn('slow').delay(6000).fadeOut('slow');
				$('body').load('mise_a_jour_actualite.php', function() {
				
      });
	}
           
       });
        });
	/*******************************************/
	  
	$('.like-btn').click(function(){
               
            $(this).addClass('like-h');
			var element = $(this);
			var I = element.attr("id");
			
            $.ajax({
                type:"POST",
                url:"ajax.php",
                data:'act=like&id='+I,
                success: function(data){
					var like='#like-count'+I;
					$(like).text(data);
					$('.bg-red').css('width','0px');
					$('.bg-green').css('width','100%');
					$('.bg-defaut').css('width','0px');
					$('.like-btn').css('background-image','');	
					
					var nvx= parseInt(data)+1;
					$('.rate-count').text(nvx);
                }
            });
        });
        $('.dislike-btn').click(function(){
          
            $(this).addClass('dislike-h');
			var element = $(this);
			var I = element.attr("id");
            $.ajax({
                type:"POST",
                url:"ajax.php",
                data:'act=dislike&id='+I,
                success: function(data){
				var nvx= parseInt(data);
				$('.rate-count').text(nvx);
				
				var dislike='#dislike-count'+I;
				$(dislike).text(data);
				$('.bg-red').css('width','100%');
				$('.bg-defaut').css('width','0px');
				$('.bg-green').css('width','0px');
				
                }
            });
        });
		
        $('.share-btn').click(function(){
			var element = $(this);
			var I = element.attr("id");
			 $('#block_comment'+I).toggle();
        });
/*********************************************************/

		$('.form_comment').on('submit', function (e) {
        // On empêche le navigateur de soumettre le formulaire
        e.preventDefault();
		$('.uploads').show();
		var element = $(this);	
		var I = element.attr("id");
		
			var contenu=$(this).find('input.contenu').val();
	
		$.ajax({
            url:"ajax.php",
            type:"POST",
            data:"contenu="+contenu+"&id="+I,
            success:function(data){
				$('.uploads').hide();
				$('.share-btn'+I).text('Commentaire('+data+')');	
				$('#block_comment'+I).load('commentaire.php?id='+I, function() {
				$('#contenu').val('');
      });
	}
           
       });
		
        });	 
/************************************************************/
$('.afficher_plus').click(function(){
var element = $(this);	
var I = element.attr("id");	
$('.span9').load('pluscommentaire.php?id='+I, function() {
				
      });
});


	$('.smileys').click(function(){
	var element = $(this);	
	var I = element.attr("id");
	$('#img_smileys'+I).toggle();

	});
	$('.lol').click(function(){
	var element = $(this);	
	var I = element.attr("id");
	var smilies=$(this).attr('alt');
	var valeur=$('.contenu'+I).val();
	$('.contenu'+I).val(valeur+smilies);
	$('.contenu'+I).focus();

	});
	<?php
	 include 'configuration serveur/config_server.php';
	$req55=$bdd->prepare('SELECT id_membre FROM membre WHERE numero=:pseudo');
	$req55->execute(array('pseudo'=>$_SESSION['contact_Etu']));
	$rslt55=$req55->fetch();
	$id_membre2=$rslt55['id_membre'];
	
	$req5=$bdd->prepare('SELECT * FROM commentaire WHERE ref_membre=:pseudo ORDER BY id_commentaire DESC ');
	$req5->execute(array('pseudo'=>$id_membre2));
	$rslt5=$req5->fetch();
	
	$req6=$bdd->prepare('SELECT count(*) As nbrs FROM commentaire WHERE ref_membre=:pseudo ORDER BY id_commentaire DESC ');
	$req6->execute(array('pseudo'=>$id_membre2));
	$rslt6=$req6->fetch();
	$debut=$rslt5['id_commentaire'];
	$total=$rslt5['id_commentaire']+$rslt6['nbrs'];
	if($debut<=$total)
	{
	?>
	
			$('.supp').click(function(){
			var element = $(this);	
			var I = element.attr("name");
			var contenu=$(this).find('span.supp').text();
			
			if (confirm('Supprimer ce commentaire?')) 
			{
			$.ajax({
            url:'modifications.php?modif=modif&id_comment='+I,
            type:'post',
            data:'terminer=ok',
            success:function(data){
			
				$('#rapport4').html(data).show().fadeIn('slow').delay(6000).fadeOut('slow');
						
			}		
				   
			   });
					
			}
	<?php
	}
	?>
	});	
	
	$('.page').click(function(){
			var element = $(this);	
			var I = element.attr("name");
			$.ajax({
            url:"ajax.php",
            type:"POST",
            data:"page=ok&id_page="+I,
            success:function(data){
			$('body').load('mise_a_jour_actualite.php?page='+data, function() {
				
      });
			
	}
           
       });
			
	});	
	
	 });
/***********************************************************/

   </script>