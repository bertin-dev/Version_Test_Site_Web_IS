<?php
session_start();

if(isset($_GET['formateur']) AND $_GET['formateur']==2)
{
//on doit deconnecter le visiteur sil clic sur le lien deconnexion
	                    unset($_SESSION['filiere_F']);
						unset($_SESSION['nom_F']);
						unset($_SESSION['prenom_F']);
						unset($_SESSION['sexe_F']);
						unset($_SESSION['email_F']);
						unset($_SESSION['contact_F']);
						unset($_SESSION['experience_F']);
						unset($_SESSION['cours_F']);
						unset($_SESSION['quartier_F']);
						unset($_SESSION['mtp_F']);
						unset($_SESSION['matricule_F']);
						unset($_SESSION['biographie_F']);
						unset($_SESSION['time']);
						unset($_SESSION['chemin']);
						if($_SESSION['ID']==2)
						unset($_SESSION['ID']);
	
header('location: index.php');	
}

  else if( isset($_GET['etudiant']) AND $_GET['etudiant']==2 )
 {	

      		            unset($_SESSION['nom_Etu']);
						unset($_SESSION['prenom_Etu']);
						unset($_SESSION['sexe_Etu']);
						unset($_SESSION['mtp_Etu']);
						unset($_SESSION['email_Etu']);
						unset($_SESSION['contact_Etu']);
						unset($_SESSION['cours_Etu']);
						unset($_SESSION['quartier_Etu']);
						unset($_SESSION['age_Etu']);
						unset($_SESSION['time']);
						unset($_SESSION['filiere_Etu']);
						unset($_SESSION['plateforme_Etu']);
						unset($_SESSION['chemin']);
						if($_SESSION['ID']==1)
						unset($_SESSION['ID']);
						header('location: index.php');
 }
 
 else
 {
?>
	 <script>alert("Vous ne pouvez vous déconnecter car vous n'êtes pas identifié");</script>
<?php	 
header('location: inscription.php');
 }

?>