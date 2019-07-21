<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Nzoupe - Cours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<link id="callCss" rel="stylesheet" href="themes/current/bootstrap.min.css" type="text/css" media="screen"/>
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="themes/css/base.css" rel="stylesheet" type="text/css">
	<style type="text/css" id="enject"></style>
</head>
<body>
<?php 
include('header.php');
if(isset($_SESSION['pseudo']))
{
?>
<!--Header Ends================================================ -->
<!-- Page banner -->
<section id="bannerSection" style="background:url('logo.png');">
	<div class="container" >

		<h1 id="pageTitle">
		<div style="padding:1em;">
		
		</div>
		<span class="pull-right toolTipgroup">
			<a href="#" data-placement="top" data-original-title="Find us on via facebook"><img style="width:45px" src="themes/images/facebook.png" alt="facebook" title="facebook"></a>
			<a href="#" data-placement="top" data-original-title="Find us on via twitter"><img style="width:45px" src="themes/images/twitter.png" alt="twitter" title="twitter"></a>
			<a href="#" data-placement="top" data-original-title="Find us on via youtube"><img style="width:45px" src="themes/images/youtube.png" alt="youtube" title="youtube"></a>
		</span>
		</h1>
	</div>
</section> 
<!-- Page banner end -->
<section id="bodySection">	
	<div class="container">	
	<div class="row">
	<?php include('cadre.php');?>
		<div class="span9">
		<div class="well well-small" style="text-align:left">
			<h3>Télécharger gratuitement vos cours et PDF.</h3>
			<div align="left" style="margin-top:em;">
				<button class="btn-warning btn-large" type="submit" id="publier">Partagez un cours</button>
			</div>
			<br><div id="rapport" class="alert alert-success" style="display:none;width:446px;padding:0.5em;font-size:1.1em;"></div>
			<div style="margin-top:0.2em;display:none;border:0px solid;background-color:rgba(0,0,0,0.12);padding:1em;" id="block_publier" align="left">
				<h4>Publiez un cours ou un PDF...</h4>
				<form class="form-horizontal" id="my_cours" action="traitement.php?cours=cours" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="row-fluid">    
						<div class="span6">
							<select id="filiere" name="filiere" class="input-xxlarge" style="font-size:1.2em; height:2.5em;width:em;">
													<optgroup label="Cycle Licence">
													<option value=" Algèbre, analyse et géométrie"> Algèbre, analyse et géométrie</option>
													<option value=" Physique et mécanique"> Physique et mécanique</option>
													<option value=" Physique fondamentale"> Physique fondamentale</option>
													<option value="Physique – Chimie">Physique – Chimie</option>
													<option value="Physique et applications">Physique et applications</option>
													<option value=" Mathématiques et applications"> Mathématiques et applications</option>
													<option value="Mathématiques et informatique">Mathématiques et informatique</option>
													<option value=" Informatique"> Informatique</option>
													<option value="Géosciences">Géosciences</option>
													<option value=" Economie et mathématiques"> Economie et mathématiques</option>
													<option value="Chimie – Physique">Chimie – Physique</option>
													<option value="Chimie - Biologie">Chimie - Biologie</option>
													<option value="Biologie humaine et santé">Biologie humaine et santé</option>
													<option value="Biologie moléculaire et cellulaire">Biologie moléculaire et cellulaire</option>
													<option value="Biologies des organismes et des ecosystèmes">Biologies des organismes et des ecosystèmes</option>
													<option value="Biologie des organismes et des ecosystème">Biologie des organismes et des ecosystème</option>
													<option value="Bioinformatique et biostatistiques">Bioinformatique et biostatistiques</option>
													<option value="Biochimie">Biochimie</option>
													</optgroup>
													<optgroup label="Cycle Master">
													<option value="Analyse, algèbre et géométrie">Analyse, algèbre et géométrie</option>
													<option value=" Bioinformatique et biostatistique"> Bioinformatique et biostatistique</option>
													<option value=" Chimie de l’environnement"> Chimie de l’environnement</option>
													<option value="Chimie inorganique">Chimie inorganique</option>
													<option value=" Chimie organique"> Chimie organique</option>
													<option value=" Ecologie et environnement"> Ecologie et environnement</option>
													<option value="Formation de surface et de subsurface">Formation de surface et de subsurface</option>
													<option value=" Informatique"> Informatique</option>
													<option value="Mathématiques et applications">Mathématiques et applications</option>
													<option value="Méthodes informatiques appliquées à la gestion des entreprises">Méthodes informatiques appliquées à la gestion des entreprises</option>
													<option value=" Pétrologie et structurale"> Pétrologie et structurale</option>
													<option value="Pétromines (spécialité Géosciences pétrolières)">Pétromines (spécialité Géosciences pétrolières)</option>
													<option value="Pétromines spécialité mines et carrières">Pétromines spécialité mines et carrières</option>
													<option value="Pétromines (spécialité Pétrochimie)">Pétromines (spécialité Pétrochimie)</option>
													<option value=" Physiologie animale générale"> Physiologie animale générale</option>
													<option value="Physique et applications">Physique et applications</option>
													<option value="Qualité - Sécurité - Environnement">Qualité - Sécurité - Environnement</option>
													<option value="Sciences alimentaires et nutrition">Sciences alimentaires et nutrition</option>
													<option value="Zoologie approfondie">Zoologie approfondie</option>
													</optgroup>
													<optgroup label="Cycle Doctorat">
													<option value="Ufd de bio-géosciences et environnement ">Ufd de bio-géosciences et environnement </option>
													<option value="Ufd de chimie et biochimie">Ufd de chimie et biochimie</option>
													<option value="Ufd de mathématiques appliquées et physique fondamentale">Ufd de mathématiques appliquées et physique fondamentale</option>
													</optgroup>
							</select>		
						</div>
					</div>
					<div class="row-fluid">    
						<div class="span6">
							<select name="niveau" id="niveau" class="input-xxlarge" style="font-size:1.2em; height:2.5em;">
													<option value="Niveau1">Niveau1</option>
													<option value="Niveau2">Niveau2</option>
													<option value="Niveau3">Niveau3</option>
													<option value="Niveau4">Niveau4</option>
													<option value="Niveau5">Niveau5</option>
													<option value="Niveau6">Niveau6</option>
													<option value="Niveau7">Niveau7</option>
													<option value="Niveau8">Niveau8</option>
							</select>
						</div>
					</div>
					
					<div class="row-fluid">    
						<div id="rapport" class="alert alert-success" style="display:none;width:446px;padding:0.5em;font-size:1.1em;">
							
						</div>
					</div>
					<div class="row-fluid">    
						<div class="span6">
							<input type="text" id="titre" class="input-xxlarge" placeholder="Titre" name="titre" style="font-size:1.3em; height:1.7em;" required>
						</div>
					</div>
				
					<div class="row-fluid" > 
						<div class="span6" style="border:0px solid;width: 545px;background-color:rgba(0,0,0,0.1);">
							<input type="file" id="image" class="input-xxlarge"  name="image" style="font-size:1.2em; height:1.5em;margin-top:0.2em;border-radius:5px;background-color:rgba();" required>
						</div>
					</div>	
					
					
					<div class="control-group" align="left">
					  <textarea rows="10" name="contenu" cols="" id="textarea" class="input-xxlarge" placeholder="Description(facultatif)" style="font-size:1.2em;" class="input-xxxlarge"></textarea>
					</div>
					
					<div align="left" style="margin-top:-1em;">
					<button class="btn-warning btn-large" type="submit" >Partagez</button>&nbsp <span style="display:none;" class="gifpub"><img src="ajax-loader18.gif"></span>
					</div>
					
				</fieldset>
			  </form>
		</div>
			<br><p><img src="themes/images/carousel/business_website_templates_3.jpg" alt="business templates" /></p>

		<br/>			
		<ul class="media-list">
		<?php
			include('connexion_base_donnee.php');
			$nombreDeMessagesParPage = 25; // Essayez de changer ce nombre pour voir :o)
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
			
			$req=$bdd->prepare('SELECT * FROM cours ORDER BY id_cours DESC LIMIT :offset , :limit');
			 $req->bindParam(':offset', $premierMessageAafficher , PDO::PARAM_INT);
			 $req->bindParam(':limit', $nombreDeMessagesParPage, PDO::PARAM_INT);
			 $req->execute();
		while($rslt=$req->fetch())
		{
			$req0=$bdd->prepare('SELECT id_membre,filiere,avatars,pseudo FROM membres WHERE id_membre=:id_membre');
			$req0->execute(array('id_membre'=>$rslt['id_membre']));
			$rslt0=$req0->fetch();
			
			if($rslt0['pseudo']==$_SESSION['pseudo'])
			{
		?>
		  <li class="media well well-small" style="background-image:url('pattern17.png');">
				<a class="pull-left" href="#">
				<?php
				$extensions_valides=Array('pdf','doc','docx','xls');
				//la fonctions strrchr( $chaine,'.') renvoit l'extension avec le point
				//la fonction substtr($chaine,1) ingore la premiere caractere de la chaine
				//la fonction strtolower($chaine) renvoit la chaine en minuscule
				$extension_upload=strtolower(substr(strrchr($rslt['image'],'.'),1));
				if($extension_upload=='docx' OR $extension_upload=='doc')
				{
				?>
				<img class="media-object" src="word.gif" alt="bootstrap business template"/>
				<?php	
				}
				else if($extension_upload=='pdf')
				{
				?>
				<img class="media-object" src="pdf.gif" alt="bootstrap business template"/>
				<?php	
				}else if($extension_upload=='xls')
				{
				?>
				<img class="media-object" src="excel.gif" alt="bootstrap business template"/>
				<?php	
				}
				?> 
				
				</a>
				<div class="media-body" style="background-color:rgba();border-radius:5px; padding:0.5em;">
				    <h3 class="media-heading" style=";"># <?php echo $rslt['titre'];?></h3>
				<div>
				<?php echo $rslt['contenu'];?>
				</div>
				<?php 
				$req1=$bdd->prepare('SELECT * FROM membres WHERE id_membre=:id_membre');
				$req1->execute(array('id_membre'=>$rslt['id_membre']));
				$rslt1=$req1->fetch();
				
				?>
				<div style="background-color:rgba(0,0,0,0.1);margin-top:0.3em;border-left:5px solid rgba(245,76,16,1);padding:0.5em;border-radius:5px;">
					<div style="margin-top:em;"><b> Envoyé le :</b><span style="color:;font-weight:bold;"><i> <?php echo $rslt['date_poste']; ?></i></span></div>
					<div style="margin-top:0.2em;"><b style=""> Auteur :</b> <span style="color:rgba(0,74,148,1);font-weight:bold;">@<?php echo $rslt1['pseudo']; ?></span></div>
					<div style="margin-top:0.2em;"><b> Taille :</b> <span style="color:grey;font-weight:bold;">[<?php echo $rslt['taille'];?> Ko]</span></div>
					<div style="margin-top:0.2em;"><b> Téléchargement :</b> <span style="color:green;font-weight:bold;"><?php echo $rslt['compteur'];?></span></div>
					<div id="rslt<?php echo $rslt['id_cours'];?>"></div>
				</div>		
					<br/>
				<div id="rapport<?php echo $rslt['id_cours'];?>" class="" style="display:none;width:px;padding:0.5em;font-size:1.1em;"></div>
					<div align="right"> 	
							<a href="download.php?file=<?php echo $rslt['id_cours'];?>" class="telecharger" id="<?php echo $rslt['id_cours'];?>"><button class="btn btn-success" style="font-size:1.1em;" >Télécharger</button></a>
							<button class="btn btn-warning supprimer" style="font-size:1.1em;" name="<?php echo $rslt['id_cours'];?>">Supprimer</button>
					</div>
				
				</div>
		  </li>
		<?php
			}else
			{
		?>
		  <li class="media well well-small" style="background-image:url('pattern17.png');">
				<a class="pull-left" href="#">
				<?php
				$extensions_valides=Array('pdf','doc','docx','xls');
				//la fonctions strrchr( $chaine,'.') renvoit l'extension avec le point
				//la fonction substtr($chaine,1) ingore la premiere caractere de la chaine
				//la fonction strtolower($chaine) renvoit la chaine en minuscule
				$extension_upload=strtolower(substr(strrchr($rslt['image'],'.'),1));
				if($extension_upload=='docx' OR $extension_upload=='doc')
				{
				?>
				<img class="media-object" src="word.gif" alt="bootstrap business template"/>
				<?php	
				}
				else if($extension_upload=='pdf')
				{
				?>
				<img class="media-object" src="pdf.gif" alt="bootstrap business template"/>
				<?php	
				}else if($extension_upload=='xls')
				{
				?>
				<img class="media-object" src="excel.gif" alt="bootstrap business template"/>
				<?php	
				}
				?> 
				
				</a>
				<div class="media-body" style="background-color:rgba();border-radius:5px; padding:0.5em;">
				    <h3 class="media-heading" style=";"># <?php echo $rslt['titre'];?></h3>
				<div>
				<?php echo $rslt['contenu'];?>
				</div>
				<?php 
				$req1=$bdd->prepare('SELECT * FROM membres WHERE id_membre=:id_membre');
				$req1->execute(array('id_membre'=>$rslt['id_membre']));
				$rslt1=$req1->fetch();
				
				?>
				<div style="background-color:rgba(0,0,0,0.1);margin-top:0.3em;border-left:5px solid rgba(245,76,16,1);padding:0.5em;border-radius:5px;">
					<div style="margin-top:em;"><b> Envoyé le :</b><span style="color:;font-weight:bold;"><i> <?php echo $rslt['date_poste']; ?></i></span></div>
					<div style="margin-top:0.2em;"><b style=""> Auteur :</b> <span style="color:rgba(0,74,148,1);font-weight:bold;">@<?php echo $rslt1['pseudo']; ?></span></div>
					<div style="margin-top:0.2em;"><b> Taille :</b> <span style="color:grey;font-weight:bold;">[<?php echo $rslt['taille'];?> Ko]</span></div>
					<div style="margin-top:0.2em;"><b> Téléchargement :</b> <span style="color:green;font-weight:bold;"><?php echo $rslt['id_cours'];?></span></div>
					<div id="rslt<?php echo $rslt['id_cours'];?>"></div>
				</div>		
					<br/>
					<div align="right"> 	
							<a href="download.php?file=<?php echo $rslt['id_cours'];?>" class="telecharger" id="<?php echo $rslt['id_cours'];?>"><button class="btn btn-success" style="font-size:1.1em;" >Télécharger</button></a>
					</div>
				
				</div>
		  </li>
		<?php	
			}
		}
		// On met dans une variable le nombre de messages qu'on veut par page		
							// On récupère le nombre total de messages
							$req06=$bdd->query('SELECT count(*) As nb_messages FROM cours  ORDER BY id_cours DESC ');
							$donnees=$req06->fetch();
							
							
							$totalDesMessages = $donnees['nb_messages'];
							// On calcule le nombre de pages à créer
							$nombreDePages  = ceil($totalDesMessages / $nombreDeMessagesParPage);
							
							$req07=$bdd->query('SELECT * FROM cours ORDER BY id_cours DESC');
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
		?>
		
		 
		
		</ul>			
		</div>

		</div>
		</div>
	</div>
</section>
 <!-- Footer
  ================================================== -->
<?php include('footer.php');?>
<script src="jquery.js"></script>
    <script>
     $(function () {
  
		$('#publier').click(function(){

		$('#block_publier').toggle();	
		});

		$('#my_cours').on('submit', function (e) {
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
						$('body').load('mise_a_jour_cours.php', function() {
				
      });
	}
           
       });
        });
		
	$('.telecharger').click(function(){
	var element = $(this);	
	var I = element.attr("id");
			$('#rslt'+I).load('commentaire.php?id='+I, function() {
				
      });
	});
	  $('.supprimer').click(function(){
			var element = $(this);	
			var I = element.attr("name");
			$.ajax({
                type:"POST",
                url:"modifications.php?supp&id="+I,
                data:'act=dislike&id='+I,
                success: function(data){
				$('#rapport'+I).html('<br><div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><p><b><i>'+data+'</i></b></p></div>').show();
				
                }
		
		});
	
	});
	
		$('.page').click(function(){
			var element = $(this);	
			var I = element.attr("name");
			$.ajax({
            url:"ajax.php",
            type:"POST",
            data:"cours=ok&id_page="+I,
            success:function(data){
			$('body').load('mise_a_jour_cours.php?page='+data, function() {
				
      });
			
	}
           
       });
			
	});
			
		});	
		

	</script>
	<?php
	}else{header('location:connexion.php');}
?>	
</body>
</html>