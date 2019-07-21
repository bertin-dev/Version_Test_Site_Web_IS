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
    <title>ESPACE ADMINISTRATEUR | INSTITUT SALOMON</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/animate.min.css" rel="stylesheet">
     <link href="css/responsive.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
    <script src="progressbar.js"></script>
	
</head>
<body>
<?php
	if(isset($_SESSION['contact_F']))
	{
	include('bbcode0.php');
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
?>			
				
				
				
				
				
				
				
				
				       <br><br><br>
	   				<div class="team col-xs-12 col-lg-3">
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
<?php include('list_cours.php');?>

<div class="row team-bar col-md-offset-1" id="users">
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
			

	       </div><!--/.col-xs-12 col-lg-3 -->
				
				
				
				
				<div class="team col-xs-12 col-lg-9">
       
	   
	   
	   
	   <div class="thumbnail" style="margin-top:em;padding:1em;display:;">
<h4 align="left" id="test"><a href="#" title="<?php echo $rslt001['nom_f'];?>"><img src="<?php echo $rslt001['avatars'];?>" class="img-rounded" width="100px" height="100px" align=""></a><br>
Salut <?php echo $rslt001['nom_f'];?>,  Quoi de neuf ?
<div align="left" style="margin-top:em;">
		<button class="btn-primary btn-large" type="submit" id="publier">Uploader une Vidéo</button>
	</div>
</h4>			
	<div style="margin-top:0.2em;display:none;border:0px solid;background-color:rgba(0,0,0,0.12);padding:1em;" id="block_publier" align="left">
		<h4>Format Recommandé: (.avi), (.mp4), (.flv), (.webm)</h4>		
				<form class="form-horizontal" id="my_form" action="execution.php?ok=ok" name="myform" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="row-fluid" align="center">    
						<br><div id="rapport" class="alert alert-success" style="font-weight:bold;display:none;width:446px;padding:0.5em;font-size:1.1em;">
							
						</div>
					</div>
					<div class="row-fluid">    
						<div class="col-lg-12">
							<input type="text" id="titre" class="input-xxlarge" placeholder="Titre de la vidéo" name="titre" style="font-size:1.3em; height:1.7em;" required>
						</div>
					</div>
					
					<div class="row-fluid"> 
						<div class="col-lg-12" style="border:0px solid;width: auto;background-color:rgba(0,0,0,0.1);">
							<input type="file" id="image" class="input-xxlarge"  name="image" style="font-size:1.2em; height:1.5em;margin-top:0.2em;border-radius:5px;background-color:rgba();">
						</div>
					</div>	
					
					
					<div class="control-group col-lg-12" align="center" style="margin-top:0.5em;">
					<input type="button" id="gras" name="gras" value="Gras" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />
					<input type="button" id="italic" name="italic" value="Italic" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
					<input type="button" id="souligné" name="souligné" value="Souligné" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
					<input type="button" id="size" name="size" value="Size" onClick="javascript:bbcode('[font size=5px]', '[/font]');return(false)"  />
					<input type="button" id="color" name="color" value="Color" onClick="javascript:bbcode('[color=]', '[/color]');return(false)" />
					
					</div>
					
					<div class="control-group" align="center">
					  <textarea rows="10" name="contenu" cols="" id="contenu" class="col-lg-12" placeholder="Résumé écrit du cours vidéo" style="font-size:1.2em;"></textarea>
					</div>
					<progress id="progressBar" value="0" max="100" class="col-lg-12"></progress>
					
					<div align="right" class="col-lg-12">
						<button class="btn-primary btn-large" type="submit" onclick="uploadFichier()">Partagez</button>&nbsp <span style="display:none;" class="gifpub"><img src="ajax-loader18.gif"></span>
					</div>
					
				
				</fieldset>
			  </form>
			  <h2 id="status"></h2>
              <p id="status_bytes"></p>

	</div>
			
</div>
	   
	   

	   
	   
	   
	   
	   
	   
	      <div class="thumbnail" style="margin-top:em;padding:1em;display:;">
<h4 align="left" id="test"><a href="#" title="<?php echo $rslt001['nom_f'];?>"><img src="<?php echo $rslt001['avatars'];?>" class="img-rounded" width="100px" height="100px" align="left"></a><br>
<div align="left" style="margin-top:em;">
		<button class="btn-primary btn-large" type="submit" id="publier1">Uploader une vidéo via Notre Chaine YouTube</button>
	</div>
</h4>			
	<div style="margin-top:0.2em;display:none;border:0px solid;background-color:rgba(0,0,0,0.12);padding:1em;" id="block_publier1" align="left">		
				<form class="form-horizontal" id="my_form1" action="execution.php?ytube=ytube" name="myform1" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="row-fluid" align="center">    
						<br><div id="rapport1" class="alert alert-success" style="font-weight:bold;display:none;width:446px;padding:0.5em;font-size:1.1em;">
							
						</div>
					</div>

					<div class="row-fluid">    
						<div class="col-lg-12"><label for="titre"><h4>Https://</h4></label>
							<input type="text" id="titre" class="form-control" placeholder="Lien Direct" name="titre" style="font-size:1.3em; height:1.7em;" required>
						</div>
					</div>
					
					
					
					<div class="control-group col-lg-12" align="center" style="margin-top:0.5em;">
					<input type="button" id="gras" name="gras" value="Gras" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />
					<input type="button" id="italic" name="italic" value="Italic" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
					<input type="button" id="souligné" name="souligné" value="Souligné" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
					<input type="button" id="size" name="size" value="Size" onClick="javascript:bbcode('[font size=5px]', '[/font]');return(false)"  />
					<input type="button" id="color" name="color" value="Color" onClick="javascript:bbcode('[color=]', '[/color]');return(false)" />
					
					</div>
					
					<div class="control-group" align="center">
					  <textarea rows="3" name="contenu" cols="" id="contenu" class="col-lg-12" placeholder="Résumé écrit du cours vidéo" style="font-size:1.2em;"></textarea>
					</div>
					
					<div align="right" class="col-lg-12">
						<button class="btn-primary btn-large" type="submit">Partagez</button>&nbsp <span style="display:none;" class="gifpub"><img src="ajax-loader18.gif"></span>
					</div>
					
				
				</fieldset>
			  </form>
			  <h2 id="status"></h2>
              <p id="status_bytes"></p>

	</div>
			
</div>


                    
					
					
					
					
					
					
					
<div class="thumbnail" style="margin-top:em;padding:1em;display:;">
<h4 align="left" id="test"><a href="#" title="<?php echo $rslt001['nom_f'];?>"><img src="images/pdf.gif" class="img-rounded" width="100px" height="100px" align="left"><img src="images/excel.gif" class="img-rounded" width="100px" height="100px" align="left"> <img src="images/word.gif" class="img-rounded" width="100px" height="100px" align="left"></a><br>
<em><strong><?php echo $rslt001['prenom_f'];?></strong></em>  vous pouvez envoyer votre fichier 
<div align="left" style="margin-top:em;">
		<button class="btn-primary btn-large" type="submit" id="publier2">Uploadez Vos Fichiers</button>
	</div>
</h4>			
	<div style="margin-top:0.2em;display:none;border:0px solid;background-color:rgba(0,0,0,0.12);padding:1em;" id="block_publier2" align="left">
		<h4>Format recommandé: WORD(.docX), EXCEL(.xlsx), PDF(.pdf)</h4>		
				<form class="form-horizontal" id="my_form2" action="execution.php?cours=cours" name="myform2" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="row-fluid" align="center">    
						<br><div id="rapport2" class="alert alert-success" style="font-weight:bold;display:none;width:446px;padding:0.5em;font-size:1.1em;">
							
						</div>
					</div>
					<div class="row-fluid">    
						<div class="col-lg-12">
							<input type="text" id="titre" class="input-xxlarge" placeholder="Titre du fichier" name="titre" style="font-size:1.3em; height:1.7em;" required>
						</div>
					</div>
					
					<div class="row-fluid"> 
						<div class="col-lg-12" style="border:0px solid;width: auto;background-color:rgba(0,0,0,0.1);">
							<input type="file" id="image" class="input-xxlarge"  name="image" style="font-size:1.2em; height:1.5em;margin-top:0.2em;border-radius:5px;background-color:rgba();">
						</div>
					</div>	
					
					
					<div class="control-group col-lg-12" align="center" style="margin-top:0.5em;">
					<input type="button" id="gras" name="gras" value="Gras" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />
					<input type="button" id="italic" name="italic" value="Italic" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
					<input type="button" id="souligné" name="souligné" value="Souligné" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
					<input type="button" id="size" name="size" value="Size" onClick="javascript:bbcode('[font size=5px]', '[/font]');return(false)"  />
					<input type="button" id="color" name="color" value="Color" onClick="javascript:bbcode('[color=]', '[/color]');return(false)" />
					
					</div>
					
					<div class="control-group" align="center">
					  <textarea rows="5" name="contenu" cols="" id="contenu" class="col-lg-12" placeholder="Résumé écrit du cours vidéo" style="font-size:1.2em;"></textarea>
					</div>
					
					<div align="right" class="col-lg-12">
						<button class="btn-primary btn-large" type="submit">Partagez</button>&nbsp <span style="display:none;" class="gifpub"><img src="ajax-loader18.gif"></span>
					</div>
					
				
				</fieldset>
			  </form>
			  <h2 id="status"></h2>
              <p id="status_bytes"></p>

	</div>
			
</div>
					
       </div> <!--/.col-xs-12 col-lg-9 -->	
	   
	   
	   
	   
	   
	     
	   

				
				
				
									
					
			
</div>
</div>
</section>



		
     
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
						$('body').load('prof.php', function() {
				
      });
	}
           
       });
        });
	
	
	
	
	
	
	
	
	 });
/***********************************************************/

   </script>
   

    <script>
     $(function () {
  
		$('#publier1').click(function(){

		$('#block_publier1').toggle();	
		});

       $('#my_form1').on('submit', function (e) {
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
				$('#rapport1').html(data).show().fadeIn('slow').delay(6000).fadeOut('slow');
						$('body').load('prof.php', function() {
				
      });
	}
           
       });
        });
	
	
	
	
	
	
	
	
	 });
/***********************************************************/

   </script>
   
   
   <script>
     $(function () {
  
		$('#publier2').click(function(){

		$('#block_publier2').toggle();	
		});

       $('#my_form2').on('submit', function (e) {
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
				$('#rapport2').html(data).show().fadeIn('slow').delay(6000).fadeOut('slow');
						$('body').load('prof.php', function() {
				
      });
	}
           
       });
        });
	
	
	
	
	
	
	
	
	 });
/***********************************************************/

   </script>
 



<script src="jquery.js"></script>
<script>
$(function(){
function getonline(){
				$('#users').load('phpscripts/get-online0.php', function() {
				
      });
}
setInterval(getonline, 3000);

});
</script>
<?php
	}else{header('location: login.php');}
?>	 
</body>
</html>