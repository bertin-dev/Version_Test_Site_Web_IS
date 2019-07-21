




<div class="row clearfix">
            <?php
include 'configuration serveur/config_server.php';

$req001=$bdd->prepare('SELECT * FROM membre WHERE numero=:numero');
$req001->execute(array('numero'=>$_SESSION['contact_Etu']));
$rslt001=$req001->fetch();
?>

					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="" >
									<a href="#"><img class="media-object" style="width:auto; padding:0 0 0 20%;" src="../<?php echo $rslt001['avatars'];?>" title="Bertin Mounok" alt=""></a>
								</div>
								<div class="media-body" style="text-align: center;">
									<h4><?php echo $rslt001['prenom_membre'].' '.$rslt001['nom_membre'];?></h4>
									<h5>Profession</h5>
									<ul class="tag clearfix">
									        <li id="users"></li>
											<li><a href="noscours.php">Mes cours</a></li><br>
                                           	<li><a href="modifier_profil.php">Modifier profil</a></li><br>
                                        	<li><a href="deconnexion">Déconnexion</a></li><br>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
										<li class="btn"><a href="#"> </a></li>
									</ul>
									
								</div>
							</div><!--/.media -->
							<p>
									     Biographie du Formmateur
							</p>
						</div>
					</div><!--/.col-lg-4 -->
					
					
				</div> <!--/.row -->









<script src="../jquery.js"></script>
<script>
$(function(){
function getonline(){
				$('#users').load('phpscripts/get-online0.php', function() {
				
      });
}
setInterval(getonline, 3000);

});
</script>