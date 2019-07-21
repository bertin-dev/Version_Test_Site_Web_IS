<div class="row clearfix">

<!--**********************************************************management*********************************************************************************** -->
<?php
$req001=$bdd->prepare('SELECT * FROM membre WHERE numero=:numero');
$req001->execute(array('numero'=>$_SESSION['contact_Etu']));
$rslt001=$req001->fetch();
$inscription = $rslt001['date_inscription'];

if($nom_filiere=='management')
{  



?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="">
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?>" alt=""></a>
								</div>
								<center><div class="media-body" style="text-align: center;">
									<h4><?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?></h4>
									<h5><strong><u>Cours Suivi:</u></strong> <?php echo $rslt001['cours_choisi'];?></h5>
									<ul class="tag clearfix">
									        <li id="users"></li><br>
											<li>Inscription: <?php echo date('d/m/Y H\h:i', $inscription);?></li><br>
                                           	<li><a href="modifier_profil.php?etudiant=1">Modifier profil</a></li><br>
                                        	<li><a href="deconnexion.php?etudiant=2">Déconnexion</a></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div></center>
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
?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="">
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?>" alt=""></a>
								</div>
								<center><div class="media-body" style="text-align: center;">
									<h4><?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?></h4>
									<h5><strong><u>Cours Suivi:</u></strong> <?php echo $rslt001['cours_choisi'];?></h5>
									<ul class="tag clearfix">
									        <li id="users"></li><br>
                                           	<li>Inscription: <?php echo date('d/m/Y H\h:i', $inscription);?></li><br>
                                           	<li><a href="modifier_profil.php?etudiant=1">Modifier profil</a></li><br>
                                        	<li><a href="deconnexion.php?etudiant=2">Déconnexion</a></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div></center>
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
?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="">
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?>" alt=""></a>
								</div>
								<center><div class="media-body" style="text-align: center;">
									<h4><?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?></h4>
									<h5><strong><u>Cours Suivi:</u></strong> <?php echo $rslt001['cours_choisi'];?></h5>
									<ul class="tag clearfix">
									        <li id="users"></li><br>
											<li>Inscription: <?php echo date('d/m/Y H\h:i', $inscription);?></li><br>
                                           	<li><a href="modifier_profil.php?etudiant=1">Modifier profil</a></li><br>
                                        	<li><a href="deconnexion.php?etudiant=2">Déconnexion</a></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div></center>
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
?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="">
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?>" alt=""></a>
								</div>
								<center><div class="media-body" style="text-align: center;">
									<h4><?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?></h4>
									<h5><strong><u>Cours Suivi:</u></strong> <?php echo $rslt001['cours_choisi'];?></h5>
									<ul class="tag clearfix">
									        <li id="users"></li><br>
											<li>Inscription: <?php echo date('d/m/Y H\h:i', $inscription);?></li><br>
                                           	<li><a href="modifier_profil.php?etudiant=1">Modifier profil</a></li><br>
                                        	<li><a href="deconnexion.php?etudiant=2">Déconnexion</a></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div></center>
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
?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="">
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?>" alt=""></a>
								</div>
								<center><div class="media-body" style="text-align: center;">
									<h4><?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?></h4>
									<h5><strong><u>Cours Suivi:</u></strong> <?php echo $rslt001['cours_choisi'];?></h5>
									<ul class="tag clearfix">
									        <li id="users"></li><br>
											<li>Inscription: <?php echo date('d/m/Y H\h:i', $inscription);?></li><br>
                                           	<li><a href="modifier_profil.php?etudiant=1">Modifier profil</a></li><br>
                                        	<li><a href="deconnexion.php?etudiant=2">Déconnexion</a></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div></center>
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
?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="">
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?>" alt=""></a>
								</div>
								<center><div class="media-body" style="text-align: center;">
									<h4><?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?></h4>
									<h5><strong><u>Cours Suivi:</u></strong> <?php echo $rslt001['cours_choisi'];?></h5>
									<ul class="tag clearfix">
									        <li id="users"></li><br>
											<li>Inscription: <?php echo date('d/m/Y H\h:i', $inscription);?></li><br>
                                           	<li><a href="modifier_profil.php?etudiant=1">Modifier profil</a></li><br>
                                        	<li><a href="deconnexion.php?etudiant=2">Déconnexion</a></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div></center>
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
?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="">
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?>" alt=""></a>
								</div>
								<center><div class="media-body" style="text-align: center;">
									<h4><?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?></h4>
									<h5><strong><u>Cours Suivi:</u></strong> <?php echo $rslt001['cours_choisi'];?></h5>
									<ul class="tag clearfix">
									        <li id="users"></li><br>
											<li>Inscription: <?php echo date('d/m/Y H\h:i', $inscription);?></li><br>
                                           	<li><a href="modifier_profil.php?etudiant=1">Modifier profil</a></li><br>
                                        	<li><a href="deconnexion.php?etudiant=2">Déconnexion</a></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div></center>
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
?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="">
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="<?php echo $rslt001['avatars'];?>" title="<?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?>" alt=""></a>
								</div>
								<center><div class="media-body" style="text-align: center;">
									<h4><?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?></h4>
									<h5><strong><u>Cours Suivi:</u></strong> <?php echo $rslt001['cours_choisi'];?></h5>
									<ul class="tag clearfix">
									        <li id="users"></li><br>
											<li>Inscription: <?php echo date('d/m/Y H\h:i', $inscription);?></li><br>
                                           	<li><a href="modifier_profil.php?etudiant=1">Modifier profil</a></li><br>
                                        	<li><a href="deconnexion.php?etudiant=2">Déconnexion</a></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div></center>
							</div><!--/.media -->
						</div>
					</div><!--/.col-lg-4 -->
<?php
}
?>





</div> <!-------------------------------------------------------------------------row clearfix ------------------------------------------- -->



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