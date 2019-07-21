<div class="row clearfix">

<!--**********************************************************management*********************************************************************************** -->
<?php
$req001=$bdd->prepare('SELECT * FROM membre WHERE numero=:numero');
$req001->execute(array('numero'=>$_SESSION['contact_Etu']));
$rslt001=$req001->fetch();
?> 
					<div class="col-md-12">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                      <center><h5>*** <u>Connectés sur la Plate-forme</u>  ***</h5></center>
							<div id="pipo" class="media">
								
								
							</div><!--/.media -->
						</div>
					</div><!--/.col-lg-4 -->
					
					

</div> <!-------------------------------------------------------------------------row clearfix ------------------------------------------- -->



<script src="jquery.js"></script>
<script>
$(function(){
function getonline(){
				$('#pipo').load('phpscripts/get-online1.php', function() {
				
      });
}
setInterval(getonline, 5000);

});
</script>