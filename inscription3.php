<?php session_start(); ?>

<style type="text/css">
	.fichier:hover
	{
		background-color:rgba(0,0,0,0.3);
	}
	#block_image img
	{
		width:100%;
		
	}
	
</style>
<div style="background-image: url('pattern17.png');">
<h4><?php
								if ($_SESSION['experience_F']=='Dr.' || $_SESSION['experience_F']=='Prof.')
								{
								 echo $_SESSION['experience_F'].'. '.$_SESSION['prenom_F'].' '.$_SESSION['nom_F'];	
								}
								else
								{
								 echo $_SESSION['prenom_F'].' '.$_SESSION['nom_F'];
								}
	 ?>
								>> Photo Profil
</h4>

<div id="rapport" class="alert alert-danger" style="display:none;"></div>

<form align="center" action="execution.php?profil=profil" method="post" id="my_form" enctype="multipart/form-data">
	<div class="row-fluid">
		<div class="col-sm-6" >
			<?php 
			if($_GET['sexe']=='M')
			{
			?>
		
			<img src="avatars/homme.png" class="photo" width="" height="">
			&nbsp <span class="load_comment" style="display:none;"><img src="ajax-loader1.gif"></span>
	
			
			<?php	
			}
			else if($_GET['sexe']=='Mme')
			{
			?>
			<img src="avatars/femme.png" class="photo" width="" height="">
			&nbsp <span class="load_comment" style="display:none;"><img src="ajax-loader1.gif"></span>
			<?php	
			}
			?>
			
		</div>
	</div>
	<div class="row-fluid">    
		<div class="col-sm-6">
			<input type="file" id="avatars" class="input-xxlarge"  name="avatars" style="font-size:1.2em; height:1.5em;margin-top:0.2em;border-radius:5px;background-color:rgba(0,0,0,0.2);" required>
			<input type="submit" id="charger" class="btn btn-primary btn-lg" title="Nous rejoindre" style="font-size:1.2em;padding:0.4em;" value="Aperçu">
		</div>
	</div>
	<div class="row-fluid">
		<div class="col-sm-6">
			<button type="button" name="" id="terminer"  class="btn" title="Nous rejoindre" style="font-size:1.3em;padding:0.8em;margin-top:0.5em;">Terminer l'inscription</button>
		</div>
	</div>
	<div>
			&nbsp &nbsp <img src="ajax-loader31.gif" class="uploads" style="display:none;">
	</div><br>
</form>
</div>

<!--code JQUERY***********************************-->
    <script src="jquery.js"></script>
    <script>
     $(function () {
    $('#my_form').on('submit', function (e) {
        // On empêche le navigateur de soumettre le formulaire
        e.preventDefault();
		$('.load_comment').show();
        var $form = $(this);
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();
 
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            contentType: false, // obligatoire pour de l'upload
            processData: false, // obligatoire pour de l'upload
            dataType: 'html', // selon le retour attendu
            data: data,
            success:function(data){
				
				$('.photo').attr('src',data);
				$('.photo').attr('width','');
				$('.photo').attr('height','');
				$('#charger').replaceWith('<input type="submit" id="annuler" class="btn-success" title="Nous rejoindre" style="font-size:1.2em;padding:0.4em;" value="Annuler">')
				$('.load_comment').hide();
				$('#annuler').click(function(){
		$('#annuler').replaceWith('<input type="submit" id="charger" class="btn-primary" title="Nous rejoindre" style="font-size:1.2em;padding:0.4em;" value="Aperçu">')
		var sexe='<?php if(isset($_SESSION['sexe_F'])) echo $_SESSION['sexe_F']; ?>';
		if(sexe=='M')
		{
			$('.photo').attr('src','avatars/homme.png');
			$('.photo').attr('width','150px');
			$('.photo').attr('height','150px');
			$('#avatars').replaceWith('<input type="file" id="avatars" class="input-xxlarge"  name="avatars" style="font-size:1.2em; height:1.5em;margin-top:0.2em;border-radius:5px;background-color:rgba(0,0,0,0.2);" required>');
			
		}
		elseif(sexe=='Mme')
			{
				$('.photo').attr('src','avatars/femme.png');
				$('.photo').attr('width','150px');
				$('.photo').attr('height','150px');
				
			}
		
		
		});
	}
           
       })
        });
		
		$('#terminer').click(function(){
			$('.uploads').show();
			$.post('execution.php',{'terminer':'terminer'}, function(data){
				$('.uploads').hide();
			$(location).attr('href',"activer-compte-formateur.php"); 
			});
		})
    });

      </script>