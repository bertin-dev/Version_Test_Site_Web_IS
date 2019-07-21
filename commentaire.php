<?php
session_start();
require 'Database Configuration/config.php';
include 'configuration serveur/config_server.php';
include('phpscripts/functions.php');
//requetes pour ompter le nombre de commentaires
$req3=$bdd->prepare('SELECT count(*) As nbrs_comment FROM commentaire WHERE ref_actualite=:id_actualite');
$req3->execute(array('id_actualite'=>$_GET['id']));
$rslt3=$req3->fetch();

$req0=$bdd->prepare('SELECT * FROM commentaire WHERE ref_actualite=:id_actualite ORDER BY id_commentaire DESC LIMIT 0,5');
$req0->execute(array('id_actualite'=>$_GET['id']));
while($rslt0=$req0->fetch())
{
$message = htmlspecialchars($rslt0['contenu']); 
$message=code($message);
$message = urllink($message);  

$req5=$bdd->prepare('SELECT * FROM membre WHERE id_membre=:pseudo');
$req5->execute(array('pseudo'=>$rslt0['ref_membre']));
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
		<button type="button" class="close supp" id="supp<?php echo $rslt0['id_commentaire'];?>" name="<?php echo $rslt0['id_commentaire'];?>" style="font-size:1.5em;font-weigjt:bold;" data-dismiss="">×</button>
		<?php
		}
		?>
	<?php echo $message;?><br><br>
		<b><span style="color:rgba(0,74,148,1);">@<?php echo $rslt5['nom_membre'];?></span></b>&nbsp &nbsp <span style="color:rgba(245,76,16,1);"><?php echo date('d-m-Y H:i'); ?></span>
	<div id="rapport4" class="alert alert-success rslt<?php echo $rslt0['id_commentaire'];?>" style="display:none;width:446px;padding:0.5em;font-size:1.1em;"></div>
	</p>
</div>
<?php	
}
//si le nombre de commentaire est superieur a 5 on affiche le texte afficher plus de commentaires
if($rslt3['nbrs_comment']>=5)
{
?>
<div align="left" style="margin-left:50px;margin-top:5px;"><a href="commentaires.php?id=<?php echo $_GET['id'];?>" id="<?php echo $rslt['id_actualite'];?>" class="afficher_plus"> Afficher plus de commentaires</a></div>
<?php
}
?>
 <script src="jquery.js"></script>
 <script>
    $(function () {
  
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
			
				$('.rslt'+I).html(data).show().fadeIn('slow').delay(6000).fadeOut('slow');
				$('body').load('mise_a_jour_actualite.php', function() {
				
      });
						
			}		
				   
			   });
					
			}
	
	});	
	});
</script>	