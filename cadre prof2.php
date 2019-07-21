<div class="row clearfix">

<!--**********************************************************management*********************************************************************************** -->
<?php

if($nom_filiere=='management')
{
$formateur = $bdd->prepare('SELECT id_formateur FROM formateur WHERE numero=:numero');
						$formateur->execute(array('numero'=>$_SESSION['contact_F']));
						$rFormateur = $formateur->fetch();
						$id_formateur = $rFormateur['id_formateur'];

						
$req001=$bdd->prepare('SELECT * FROM formateur WHERE numero=:numero');
$req001->execute(array('numero'=>$_SESSION['contact_F']));
$rslt001=$req001->fetch();

//date dernier poste effectue par le prof 
$dAjout=$bdd->prepare('SELECT date_ajout FROM actualite WHERE ref_formateur=:id_formateur ORDER BY id_actualite DESC');
$dAjout->execute(array('id_formateur'=>$id_formateur));
$date = $dAjout->fetch();

//decompte du nombre de video poste par le prof   SELECT COUNT(*) AS nbr FROM actualite WHERE ref_formateur=2 AND pdf!=""
$video=$bdd->prepare('SELECT COUNT(*) AS nombreVideo FROM actualite WHERE ref_formateur=:id_formateur AND image!=""');
$video->execute(array('id_formateur'=>$id_formateur));
$nVideo = $video->fetch();


//decompte du nombre de PDF poste par le prof
$pdf=$bdd->prepare('SELECT COUNT(*) AS nombreFichier FROM actualite WHERE ref_formateur=:id_formateur AND fichier!=""');
$pdf->execute(array('id_formateur'=>$id_formateur));
$nbPdf = $pdf->fetch();



?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="" >
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?>" alt=""></a>
								</div>
								<div class="media-body" style="text-align: center;">
								<?php
								if ($rslt001['experience']=='Dr' || $rslt001['experience']=='Prof')
								{
								?>
									<h4><?php echo $rslt001['experience'].'. '.$rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<?php	
								}
								else
								{
								?>
								<h4><?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<h5><strong><u>Profession:</u></strong> <?php echo $rslt001['experience'];?></h5>
								<?php
								}
								?>
								   <p><strong><u>Mini-Biographie:</u></strong><br> <?php echo $rslt001['biographie'];?></p>
									<ul class="tag clearfix">
											<li>Cours en Vidéos (<?php echo $nVideo['nombreVideo'];?>) </li><br>
                                           	<li>Cours en Fichier (<?php echo $nbPdf['nombreFichier'];?>)</li><br>
											<li>Dernier Poste:<?php echo date('d/m/Y H\h:i', $date['date_ajout']); ?></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div>
							</div><!--/.media -->
							
						</div>
					</div><!--/.col-lg-4 -->
					
					
				
<?php
}
?>
<!--**********************************************************formation cle en main*********************************************************************************** -->

<?php
if($nom_filiere=='formation cle en main')
{
$formateur = $bdd->prepare('SELECT id_formateur FROM formateur WHERE numero=:numero');
						$formateur->execute(array('numero'=>$_SESSION['contact_F']));
						$rFormateur = $formateur->fetch();
						$id_formateur = $rFormateur['id_formateur'];

$req001=$bdd->prepare('SELECT * FROM formateur WHERE numero=:numero');
$req001->execute(array('numero'=>$_SESSION['contact_F']));
$rslt001=$req001->fetch();

//date dernier poste effectue par le prof 
$dAjout=$bdd->prepare('SELECT date_ajout FROM actualite WHERE ref_formateur=:id_formateur');
$dAjout->execute(array('id_formateur'=>$id_formateur));
$date = $dAjout->fetch();

//decompte du nombre de video poste par le prof   SELECT COUNT(*) AS nbr FROM actualite WHERE ref_formateur=2 AND pdf!=""
$video=$bdd->prepare('SELECT COUNT(*) AS nombreVideo FROM actualite WHERE ref_formateur=:id_formateur AND image!=""');
$video->execute(array('id_formateur'=>$id_formateur));
$nVideo = $video->fetch();


//decompte du nombre de PDF poste par le prof
$pdf=$bdd->prepare('SELECT COUNT(*) AS nombreFichier FROM actualite WHERE ref_formateur=:id_formateur AND fichier!=""');
$pdf->execute(array('id_formateur'=>$id_formateur));
$nbPdf = $pdf->fetch();


?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="" >
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?>" alt=""></a>
								</div>
								<div class="media-body" style="text-align: center;">
								<?php
								if ($rslt001['experience']=='Dr' || $rslt001['experience']=='Prof')
								{
								?>
									<h4><?php echo $rslt001['experience'].'. '.$rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<?php	
								}
								else
								{
								?>
								<h4><?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<h5><strong><u>Profession:</u></strong> <?php echo $rslt001['experience'];?></h5>
								<?php
								}
								?>
								   <p><strong><u>Mini-Biographie:</u></strong><br> <?php echo $rslt001['biographie'];?></p>
									<ul class="tag clearfix">
											<li>Cours en Vidéos (<?php echo $nVideo['nombreVideo'];?>) </li><br>
                                           	<li>Cours en Fichier (<?php echo $nbPdf['nombreFichier'];?>)</li><br>
											<li>Dernier Poste:<?php echo date('d/m/Y H\h:i', $date['date_ajout']); ?></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div>
							</div><!--/.media -->
							
						</div>
					</div><!--/.col-lg-4 -->
					
					
				
<?php
}
?>
<!--*************************************************************formation a la carte********************************************************************************* -->
<?php
if($nom_filiere=='formation a la carte')
{
$formateur = $bdd->prepare('SELECT id_formateur FROM formateur WHERE numero=:numero');
						$formateur->execute(array('numero'=>$_SESSION['contact_F']));
						$rFormateur = $formateur->fetch();
						$id_formateur = $rFormateur['id_formateur'];

$req001=$bdd->prepare('SELECT * FROM formateur WHERE numero=:numero');
$req001->execute(array('numero'=>$_SESSION['contact_F']));
$rslt001=$req001->fetch();

//date dernier poste effectue par le prof 
$dAjout=$bdd->prepare('SELECT date_ajout FROM actualite WHERE ref_formateur=:id_formateur');
$dAjout->execute(array('id_formateur'=>$id_formateur));
$date = $dAjout->fetch();

//decompte du nombre de video poste par le prof   SELECT COUNT(*) AS nbr FROM actualite WHERE ref_formateur=2 AND pdf!=""
$video=$bdd->prepare('SELECT COUNT(*) AS nombreVideo FROM actualite WHERE ref_formateur=:id_formateur AND image!=""');
$video->execute(array('id_formateur'=>$id_formateur));
$nVideo = $video->fetch();


//decompte du nombre de PDF poste par le prof
$pdf=$bdd->prepare('SELECT COUNT(*) AS nombreFichier FROM actualite WHERE ref_formateur=:id_formateur AND fichier!=""');
$pdf->execute(array('id_formateur'=>$id_formateur));
$nbPdf = $pdf->fetch();


?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="" >
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?>" alt=""></a>
								</div>
								<div class="media-body" style="text-align: center;">
								<?php
								if ($rslt001['experience']=='Dr' || $rslt001['experience']=='Prof')
								{
								?>
									<h4><?php echo $rslt001['experience'].'. '.$rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<?php	
								}
								else
								{
								?>
								<h4><?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<h5><strong><u>Profession:</u></strong> <?php echo $rslt001['experience'];?></h5>
								<?php
								}
								?>
								   <p><strong><u>Mini-Biographie:</u></strong><br> <?php echo $rslt001['biographie'];?></p>
									<ul class="tag clearfix">
											<li>Cours en Vidéos (<?php echo $nVideo['nombreVideo'];?>) </li><br>
                                           	<li>Cours en Fichier(<?php echo $nbPdf['nombreFichier'];?>)</li><br>
											<li>Dernier Poste:<?php echo date('d/m/Y H\h:i', $date['date_ajout']); ?></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div>
							</div><!--/.media -->
							
						</div>
					</div><!--/.col-lg-4 -->
					
					
				
<?php
}
?>








<!--************************************************training de haut niveau*********************************************************************************** -->
<?php
if($nom_filiere=='training de haut niveau')
{
$formateur = $bdd->prepare('SELECT id_formateur FROM formateur WHERE numero=:numero');
						$formateur->execute(array('numero'=>$_SESSION['contact_F']));
						$rFormateur = $formateur->fetch();
						$id_formateur = $rFormateur['id_formateur'];

$req001=$bdd->prepare('SELECT * FROM formateur WHERE numero=:numero');
$req001->execute(array('numero'=>$_SESSION['contact_F']));
$rslt001=$req001->fetch();

//date dernier poste effectue par le prof 
$dAjout=$bdd->prepare('SELECT date_ajout FROM actualite WHERE ref_formateur=:id_formateur');
$dAjout->execute(array('id_formateur'=>$id_formateur));
$date = $dAjout->fetch();

//decompte du nombre de video poste par le prof   SELECT COUNT(*) AS nbr FROM actualite WHERE ref_formateur=2 AND pdf!=""
$video=$bdd->prepare('SELECT COUNT(*) AS nombreVideo FROM actualite WHERE ref_formateur=:id_formateur AND image!=""');
$video->execute(array('id_formateur'=>$id_formateur));
$nVideo = $video->fetch();


//decompte du nombre de PDF poste par le prof
$pdf=$bdd->prepare('SELECT COUNT(*) AS nombreFichier FROM actualite WHERE ref_formateur=:id_formateur AND fichier!=""');
$pdf->execute(array('id_formateur'=>$id_formateur));
$nbPdf = $pdf->fetch();


?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="" >
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?>" alt=""></a>
								</div>
								<div class="media-body" style="text-align: center;">
								<?php
								if ($rslt001['experience']=='Dr' || $rslt001['experience']=='Prof')
								{
								?>
									<h4><?php echo $rslt001['experience'].'. '.$rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<?php	
								}
								else
								{
								?>
								<h4><?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<h5><strong><u>Profession:</u></strong> <?php echo $rslt001['experience'];?></h5>
								<?php
								}
								?>
								   <p><strong><u>Mini-Biographie:</u></strong><br> <?php echo $rslt001['biographie'];?></p>
									<ul class="tag clearfix">
											<li>Cours en Vidéo (<?php echo $nVideo['nombreVideo'];?>) </li><br>
                                           	<li>Cours en Fichier (<?php echo $nbPdf['nombreFichier'];?>)</li><br>
											<li>Dernier Poste:<?php echo date('d/m/Y H\h:i', $date['date_ajout']); ?></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div>
							</div><!--/.media -->
							
						</div>
					</div><!--/.col-lg-4 -->
					
					
				
<?php
}
?>






<!--***************************************************************************secretariat*************************************************************************** -->
<?php
if($nom_filiere=='secretariat')
{
$formateur = $bdd->prepare('SELECT id_formateur FROM formateur WHERE numero=:numero');
						$formateur->execute(array('numero'=>$_SESSION['contact_F']));
						$rFormateur = $formateur->fetch();
						$id_formateur = $rFormateur['id_formateur'];

$req001=$bdd->prepare('SELECT * FROM formateur WHERE numero=:numero');
$req001->execute(array('numero'=>$_SESSION['contact_F']));
$rslt001=$req001->fetch();

//date dernier poste effectue par le prof 
$dAjout=$bdd->prepare('SELECT date_ajout FROM actualite WHERE ref_formateur=:id_formateur');
$dAjout->execute(array('id_formateur'=>$id_formateur));
$date = $dAjout->fetch();

//decompte du nombre de video poste par le prof   SELECT COUNT(*) AS nbr FROM actualite WHERE ref_formateur=2 AND pdf!=""
$video=$bdd->prepare('SELECT COUNT(*) AS nombreVideo FROM actualite WHERE ref_formateur=:id_formateur AND image!=""');
$video->execute(array('id_formateur'=>$id_formateur));
$nVideo = $video->fetch();


//decompte du nombre de PDF poste par le prof
$pdf=$bdd->prepare('SELECT COUNT(*) AS nombreFichier FROM actualite WHERE ref_formateur=:id_formateur AND fichier!=""');
$pdf->execute(array('id_formateur'=>$id_formateur));
$nbPdf = $pdf->fetch();


?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="" >
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?>" alt=""></a>
								</div>
								<div class="media-body" style="text-align: center;">
								<?php
								if ($rslt001['experience']=='Dr' || $rslt001['experience']=='Prof')
								{
								?>
									<h4><?php echo $rslt001['experience'].'. '.$rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<?php	
								}
								else
								{
								?>
								<h4><?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<h5><strong><u>Profession:</u></strong> <?php echo $rslt001['experience'];?></h5>
								<?php
								}
								?>
								   <p><strong><u>Mini-Biographie:</u></strong><br> <?php echo $rslt001['biographie'];?></p>
									<ul class="tag clearfix">
											<li>Cours en Video (<?php echo $nVideo['nombreVideo'];?>) </li><br>
                                           	<li>Cours en Fichier (<?php echo $nbPdf['nombreFichier'];?>)</li><br>
											<li>Dernier Poste:<?php echo date('d/m/Y H\h:i', $date['date_ajout']); ?></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div>
							</div><!--/.media -->
							
						</div>
					</div><!--/.col-lg-4 -->
					
					
				
<?php
}
?>







<!--************************************************************************informatique****************************************************************************** -->
<?php
if($nom_filiere=='informatique')
{
$formateur = $bdd->prepare('SELECT id_formateur FROM formateur WHERE numero=:numero');
						$formateur->execute(array('numero'=>$_SESSION['contact_F']));
						$rFormateur = $formateur->fetch();
						$id_formateur = $rFormateur['id_formateur'];

$req001=$bdd->prepare('SELECT * FROM formateur WHERE numero=:numero');
$req001->execute(array('numero'=>$_SESSION['contact_F']));
$rslt001=$req001->fetch();

//date dernier poste effectue par le prof 
$dAjout=$bdd->prepare('SELECT date_ajout FROM actualite WHERE ref_formateur=:id_formateur');
$dAjout->execute(array('id_formateur'=>$id_formateur));
$date = $dAjout->fetch();

//decompte du nombre de video poste par le prof   SELECT COUNT(*) AS nbr FROM actualite WHERE ref_formateur=2 AND pdf!=""
$video=$bdd->prepare('SELECT COUNT(*) AS nombreVideo FROM actualite WHERE ref_formateur=:id_formateur AND image!=""');
$video->execute(array('id_formateur'=>$id_formateur));
$nVideo = $video->fetch();


//decompte du nombre de PDF poste par le prof
$pdf=$bdd->prepare('SELECT COUNT(*) AS nombreFichier FROM actualite WHERE ref_formateur=:id_formateur AND fichier!=""');
$pdf->execute(array('id_formateur'=>$id_formateur));
$nbPdf = $pdf->fetch();


?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="" >
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?>" alt=""></a>
								</div>
								<div class="media-body" style="text-align: center;">
								<?php
								if ($rslt001['experience']=='Dr' || $rslt001['experience']=='Prof')
								{
								?>
									<h4><?php echo $rslt001['experience'].'. '.$rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<?php	
								}
								else
								{
								?>
								<h4><?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<h5><strong><u>Profession:</u></strong> <?php echo $rslt001['experience'];?></h5>
								<?php
								}
								?>
								   <p><strong><u>Mini-Biographie:</u></strong><br> <?php echo $rslt001['biographie'];?></p>
									<ul class="tag clearfix">
											<li>Cours en Vidéo (<?php echo $nVideo['nombreVideo'];?>) </li><br>
                                           	<li>Cours en Fichier (<?php echo $nbPdf['nombreFichier'];?>)</li><br>
											<li>Dernier Poste:<?php echo date('d/m/Y H\h:i', $date['date_ajout']); ?></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div>
							</div><!--/.media -->
							
						</div>
					</div><!--/.col-lg-4 -->
					
					
				
<?php
}
?>



<!--****************************************************************comptabilite************************************************************************************* -->
<?php
if($nom_filiere=='comptabilite')
{
$formateur = $bdd->prepare('SELECT id_formateur FROM formateur WHERE numero=:numero');
						$formateur->execute(array('numero'=>$_SESSION['contact_F']));
						$rFormateur = $formateur->fetch();
						$id_formateur = $rFormateur['id_formateur'];

$req001=$bdd->prepare('SELECT * FROM formateur WHERE numero=:numero');
$req001->execute(array('numero'=>$_SESSION['contact_F']));
$rslt001=$req001->fetch();

//date dernier poste effectue par le prof 
$dAjout=$bdd->prepare('SELECT date_ajout FROM actualite WHERE ref_formateur=:id_formateur');
$dAjout->execute(array('id_formateur'=>$id_formateur));
$date = $dAjout->fetch();

//decompte du nombre de video poste par le prof   SELECT COUNT(*) AS nbr FROM actualite WHERE ref_formateur=2 AND pdf!=""
$video=$bdd->prepare('SELECT COUNT(*) AS nombreVideo FROM actualite WHERE ref_formateur=:id_formateur AND image!=""');
$video->execute(array('id_formateur'=>$id_formateur));
$nVideo = $video->fetch();


//decompte du nombre de PDF poste par le prof
$pdf=$bdd->prepare('SELECT COUNT(*) AS nombreFichier FROM actualite WHERE ref_formateur=:id_formateur AND fichier!=""');
$pdf->execute(array('id_formateur'=>$id_formateur));
$nbPdf = $pdf->fetch();


?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="" >
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?>" alt=""></a>
								</div>
								<div class="media-body" style="text-align: center;">
								<?php
								if ($rslt001['experience']=='Dr' || $rslt001['experience']=='Prof')
								{
								?>
									<h4><?php echo $rslt001['experience'].'. '.$rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<?php	
								}
								else
								{
								?>
								<h4><?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<h5><strong><u>Profession:</u></strong> <?php echo $rslt001['experience'];?></h5>
								<?php
								}
								?>
								   <p><strong><u>Mini-Biographie:</u></strong><br> <?php echo $rslt001['biographie'];?></p>
									<ul class="tag clearfix">
											<li>Cours en Vidéo (<?php echo $nVideo['nombreVideo'];?>) </li><br>
                                           	<li>Cours en Fichier (<?php echo $nbPdf['nombreFichier'];?>)</li><br>
											<li>Dernier Poste:<?php echo date('d/m/Y H\h:i', $date['date_ajout']); ?></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div>
							</div><!--/.media -->
							
						</div>
					</div><!--/.col-lg-4 -->
					
					
				
<?php
}
?>


<!--***********************************************************************vente********************************************************************************* -->
<?php
if($nom_filiere=='vente')
{
$formateur = $bdd->prepare('SELECT id_formateur FROM formateur WHERE numero=:numero');
						$formateur->execute(array('numero'=>$_SESSION['contact_F']));
						$rFormateur = $formateur->fetch();
						$id_formateur = $rFormateur['id_formateur'];

$req001=$bdd->prepare('SELECT * FROM formateur WHERE numero=:numero');
$req001->execute(array('numero'=>$_SESSION['contact_F']));
$rslt001=$req001->fetch();

//date dernier poste effectue par le prof 
$dAjout=$bdd->prepare('SELECT date_ajout FROM actualite WHERE ref_formateur=:id_formateur');
$dAjout->execute(array('id_formateur'=>$id_formateur));
$date = $dAjout->fetch();

//decompte du nombre de video poste par le prof   SELECT COUNT(*) AS nbr FROM actualite WHERE ref_formateur=2 AND pdf!=""
$video=$bdd->prepare('SELECT COUNT(*) AS nombreVideo FROM actualite WHERE ref_formateur=:id_formateur AND image!=""');
$video->execute(array('id_formateur'=>$id_formateur));
$nVideo = $video->fetch();


//decompte du nombre de PDF poste par le prof
$pdf=$bdd->prepare('SELECT COUNT(*) AS nombreFichier FROM actualite WHERE ref_formateur=:id_formateur AND fichier!=""');
$pdf->execute(array('id_formateur'=>$id_formateur));
$nbPdf = $pdf->fetch();



?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="" >
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?>" alt=""></a>
								</div>
								<div class="media-body" style="text-align: center;">
								<?php
								if ($rslt001['experience']=='Dr' || $rslt001['experience']=='Prof')
								{
								?>
									<h4><?php echo $rslt001['experience'].'. '.$rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<?php	
								}
								else
								{
								?>
								<h4><?php echo $rslt001['prenom_f'].' '.$rslt001['nom_f'];?></h4>
								<h5><strong><u>Profession:</u></strong> <?php echo $rslt001['experience'];?></h5>
								<?php
								}
								?>
								   <p><strong><u>Mini-Biographie:</u></strong><br> <?php echo $rslt001['biographie'];?></p>
									<ul class="tag clearfix">
											<li>Cours en Vidéo (<?php echo $nVideo['nombreVideo'];?>) </li><br>
                                           	<li>Cours en Fichier (<?php echo $nbPdf['nombreFichier'];?>)</li><br>
											<li>Dernier Poste:<?php echo date('d/m/Y H\h:i', $date['date_ajout']); ?></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div>
							</div><!--/.media -->
							
						</div>
					</div><!--/.col-lg-4 -->
					
					
				
<?php
}
if($nom_filiere!='management' AND $nom_filiere!='formation cle en main' AND $nom_filiere!='formation a la carte' AND $nom_filiere!='training de haut niveau' AND $nom_filiere!='secretariat' AND $nom_filiere!='informatique' AND $nom_filiere!='comptabilite' AND $nom_filiere!='vente')
{
?>
<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="media-body" style="text-align: center;">
								
								<p><strong><u>FORMATEUR INDISPONIBLE </u></strong></p>
									<ul class="tag clearfix">
								        <li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
								    </ul>
							</div>
					</div><!--/.col-lg-4 -->
				</div> <!--/.row -->
</div>
								
<?php	
}
?>


</div> <!-------------------------------------------------------------------------row clearfix ------------------------------------------- -->





