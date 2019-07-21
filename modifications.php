<?php
session_start();
require 'Database Configuration/config.php';

//UPDATE ETUDIANTS
if(isset($_GET['infos']))
{
	if(isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['cours'], $_POST['quartier'], $_POST['age']) AND !empty($_POST['nom'])AND !empty($_POST['prenom'])AND !empty($_POST['email'])AND !empty($_POST['telephone'])AND !empty($_POST['cours']) AND !empty($_POST['quartier']) AND !empty($_POST['age'])) 
	{
			//on enleve l'echappement si get_magic_quotes_gpc() est activé
		if(get_magic_quotes_gpc())
		{
		$_POST['nom']=strtolower(stripslashes(htmlspecialchars($_POST['nom'])));
		$_POST['prenom']=strtolower(stripslashes(htmlspecialchars($_POST['prenom'])));
		$_POST['email']=strtolower(stripslashes(htmlspecialchars($_POST['email'])));
		$_POST['telephone']=strtolower(stripslashes(htmlspecialchars($_POST['telephone'])));
		$_POST['cours']=strtolower(stripslashes(htmlspecialchars($_POST['cours'])));
		//$_POST['quartier']=strtolower(stripslashes(htmlspecialchars($_POST['quartier'])));pas encore geré
		$_POST['age']=strtolower(stripslashes(htmlspecialchars($_POST['age'])));
		}
										include 'configuration serveur/config_server.php';	

										$req=$bdd->prepare('UPDATE membre SET nom_membre=:nom, prenom_membre=:prenom, email=:email, numero=:contact, cours_choisi=:cours, age=:age WHERE id_membre=:id_membre');
										
										$req->execute(array(
															'nom'=>$_POST['nom'],
															'prenom'=>$_POST['prenom'],
															'email'=>$_POST['email'],
															'contact'=>$_POST['telephone'],
															'cours'=>$_POST['cours'],
															'age'=>$_POST['age'],
															'id_membre'=>$_GET['id_membre']
															));
															
										
										
										if($req)
										{
											echo "Modification effectuée avec Succès...";
										}else{echo "Echec de Modification";}
										$req->closeCursor();
								
	}else{echo "Veuillez remplir tous les champs svp.";}

}

if(isset($_GET['pass']))
{
	if(isset($_POST['pass0'],$_POST['pass1'],$_POST['pass2']) AND !empty($_POST['pass0'])AND !empty($_POST['pass1'])AND !empty($_POST['pass2'])) 
	{
			//on enleve l'echappement si get_magic_quotes_gpc() est activé
		if(get_magic_quotes_gpc())
		{
		$_POST['pass0']=strtolower(stripslashes(htmlspecialchars($_POST['pass0'])));
		$_POST['pass1']=strtolower(stripslashes(htmlspecialchars($_POST['pass1'])));
		$_POST['pass2']=strtolower(stripslashes(htmlspecialchars($_POST['pass2'])));
		}
	
			if($_POST['pass1']==$_POST['pass2'])
			{	
				if(strlen($_POST['pass1'])>=6 AND strlen($_POST['pass1'])<=15)
				{	
						$_POST['pass0']=sha1($_POST['pass0']);
						$_POST['pass1']=sha1($_POST['pass1']);
						$_POST['pass2']=sha1($_POST['pass2']);
						
						include 'configuration serveur/config_server.php';	
						$req=$bdd->prepare('SELECT count(*) As nbrs FROM membre WHERE password=:password');
						$req->execute(array('password'=>$_POST['pass0']));
						$resultat=$req->fetch();
						if($resultat['nbrs']>0)
						{
						
						$req0=$bdd->prepare('UPDATE membre SET password=:password WHERE id_membre=:id_membre');
						$req0->execute(array(
						'password'=>$_POST['pass1'],
						'id_membre'=>$_GET['id_membre']
						));
							
							if($req0)
								{
								echo "Modification effectuée avec Succès...";
								}
				}else{echo "Ce mot de passe n'hesite pas";}
			}else{echo "Le mot de passe doit contenir au moins 6 caractères.";}
		}else{echo "Les nouveaux mot de passe ne sont pas identiques";}
							
	}else{echo "Veuillez remplir tous les champs svp.";}

}
/**************************************************************************************/
	if(isset($_GET['photo']))
	{
		//on verifi si l'adresse de l'image a ete bien definit
			
			if(isset($_FILES['avatars']['name']) AND !empty($_FILES['avatars']['name']))
				{
				//on verifi la taille de l'image
					if($_FILES['avatars']['size']>=1000)
						{
						$extensions_valides=Array('jpg','jpeg','png');
						//la fonctions strrchr( $chaine,'.') renvoit l'extension avec le point
						//la fonction substtr($chaine,1) ingore la premiere caractere de la chaine
						//la fonction strtolower($chaine) renvoit la chaine en minuscule
						$extension_upload=strtolower(substr(strrchr($_FILES['avatars']['name'],'.'),1));
						//on verifi si l'extension_uplod est valide
							
							if(in_array($extension_upload,$extensions_valides))
								{
								$id_membre=md5(uniqid(rand(),true));	
								$chemin="avatars/{$id_membre}.{$extension_upload}";
								//on deplace du serveur au disque dur
								
									if(move_uploaded_file($_FILES['avatars']['tmp_name'],$chemin))
										{
											// La photo est la source
											if($extension_upload=='jpg' OR $extension_upload=='jpeg'){$source = imagecreatefromjpeg($chemin);}
											else{$source = imagecreatefrompng($chemin);}
										$destination = imagecreatetruecolor(150, 150); // On crée la miniature vide

										// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
										$largeur_source = imagesx($source);
										$hauteur_source = imagesy($source);
										$largeur_destination = imagesx($destination);
										$hauteur_destination = imagesy($destination);
										$chemin0="avatars/miniature/{$id_membre}.{$extension_upload}";
										// On crée la miniature
										imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

										// On enregistre la miniature sous le nom "mini_couchersoleil.jpg"
										
										imagejpeg($destination,$chemin0);
										echo $chemin0;
										$_SESSION['chemin']=$chemin0;
										}else{echo "no deplace";}
								}else{echo "no extensions";}
						}else{echo "no size";}
				}else{echo "no defined";}
		
	}	

/********************************************************/

/*******************************************************************/
if(isset($_GET['ok']))
{
									 include 'configuration serveur/config_server.php';
										$req=$bdd->prepare('UPDATE membre SET avatars=:avatars WHERE id_membre=:id_membre');
										$req->execute(array(
														'avatars'=>$_SESSION['chemin'],
														'id_membre'=>$_GET['id_membre']
															));
										if($req)
										{
										echo 'Votre photo de profil a étè mise à jour...';
									
										}
										
										$req->closeCursor();
}
/**************************************************************/
//suppression d'un cours
if(isset($_GET['supp']))
{
	 include 'configuration serveur/config_server.php';	
	$req=$bdd->prepare('DELETE FROM cours WHERE id_cours=:id_cours');
	$req->execute(array('id_cours'=>$_GET['id']));
	$resultat=$req->fetch();
	if($req)
	{
		echo "Ce fihier a étè supprimé...";
	}else{echo "volle";}
}



/**************************************************************/
//suppression d'un commeentaire
if(isset($_GET['modif']))
{
	 include 'configuration serveur/config_server.php';	
	$req=$bdd->prepare('DELETE FROM commentaire WHERE id_commentaire=:id_commentaire');
	$req->execute(array('id_commentaire'=>$_GET['id_comment']));
	$resultat=$req->fetch();
	if($req)
	{
		echo "Commentaire supprimé avec suppression !!!";
	}else{echo "Aucune modification Effectuée";}
}





/*------------------------------------------------------------------------------------------------------UPDATE FORMATEUR----------------------------------------*/
if(isset($_GET['prof']))
{
	if(isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['quartier'], $_POST['experience'], $_POST['matricule'], $_POST['biographie']) AND !empty($_POST['nom'])AND !empty($_POST['prenom'])AND !empty($_POST['email'])AND !empty($_POST['telephone']) AND !empty($_POST['quartier']) AND !empty($_POST['experience']) AND !empty($_POST['matricule']) AND !empty($_POST['biographie'])) 
	{
			//on enleve l'echappement si get_magic_quotes_gpc() est activé
		if(get_magic_quotes_gpc())
		{
		$_POST['nom']=strtolower(stripslashes(htmlspecialchars($_POST['nom'])));
		$_POST['prenom']=strtolower(stripslashes(htmlspecialchars($_POST['prenom'])));
		$_POST['email']=strtolower(stripslashes(htmlspecialchars($_POST['email'])));
		$_POST['telephone']=strtolower(stripslashes(htmlspecialchars($_POST['telephone'])));
		//$_POST['cours']=strtolower(stripslashes(htmlspecialchars($_POST['cours'])));pas encore geré
		//$_POST['quartier']=strtolower(stripslashes(htmlspecialchars($_POST['quartier']))); pas encore geré
		$_POST['experience']=strtolower(stripslashes(htmlspecialchars($_POST['experience'])));
		$_POST['matricule']=strtolower(stripslashes(htmlspecialchars($_POST['matricule'])));
		$_POST['biographie']=strtolower(stripslashes(htmlspecialchars($_POST['biographie'])));
		}
										include 'configuration serveur/config_server.php';	

										$req=$bdd->prepare('UPDATE formateur SET nom_f=:nom, prenom_f=:prenom, email=:email, numero=:contact, experience=:experience, matricule=:matricule, biographie=:biographie WHERE id_formateur=:id_formateur');
										
										$req->execute(array(
															'nom'=>$_POST['nom'],
															'prenom'=>$_POST['prenom'],
															'email'=>$_POST['email'],
															'contact'=>$_POST['telephone'],
															'experience'=>$_POST['experience'],
															'matricule'=>$_POST['matricule'],
															'biographie'=>$_POST['biographie'],
															'id_formateur'=>$_GET['id_formateur']
															));
															
										
										
										if($req)
										{
											echo "Modification effectuée avec Succès...";
										}else{echo "Echec de Modification";}
										$req->closeCursor();
								
	}else{echo "Veuillez remplir tous les champs svp.";}

}






//PASSWORD

if(isset($_GET['passf']))
{
	if(isset($_POST['pass0'],$_POST['pass1'],$_POST['pass2']) AND !empty($_POST['pass0'])AND !empty($_POST['pass1'])AND !empty($_POST['pass2'])) 
	{
			//on enleve l'echappement si get_magic_quotes_gpc() est activé
		if(get_magic_quotes_gpc())
		{
		$_POST['pass0']=strtolower(stripslashes(htmlspecialchars($_POST['pass0'])));
		$_POST['pass1']=strtolower(stripslashes(htmlspecialchars($_POST['pass1'])));
		$_POST['pass2']=strtolower(stripslashes(htmlspecialchars($_POST['pass2'])));
		}
	
			if($_POST['pass1']==$_POST['pass2'])
			{	
				if(strlen($_POST['pass1'])>=6 AND strlen($_POST['pass1'])<=15)
				{	
						$_POST['pass0']=sha1($_POST['pass0']);
						$_POST['pass1']=sha1($_POST['pass1']);
						$_POST['pass2']=sha1($_POST['pass2']);
						
						include 'configuration serveur/config_server.php';	
						$req=$bdd->prepare('SELECT count(*) As nbrs FROM formateur WHERE mdp=:password');
						$req->execute(array('password'=>$_POST['pass0']));
						$resultat=$req->fetch();
						if($resultat['nbrs']>0)
						{
						
						$req0=$bdd->prepare('UPDATE formateur SET mdp=:password WHERE id_formateur=:id_formateur');
						$req0->execute(array(
						'password'=>$_POST['pass1'],
						'id_formateur'=>$_GET['id_formateur']
						));
							
							if($req0)
								{
								echo "Modification effectuée avec Succès...";
								}
				}else{echo "Ce mot de passe n'hesite pas";}
			}else{echo "Le mot de passe doit contenir au moins 6 caractères.";}
		}else{echo "Les nouveaux mot de passe ne sont pas identiques";}
							
	}else{echo "Veuillez remplir tous les champs svp.";}

}

/*******************************************************************/
if(isset($_GET['okay']))
{
									 include 'configuration serveur/config_server.php';
										$req=$bdd->prepare('UPDATE formateur SET avatars=:avatars WHERE id_formateur=:id_formateur');
										$req->execute(array(
														'avatars'=>$_SESSION['chemin'],
														'id_formateur'=>$_GET['id_formateur']
															));
										if($req)
										{
										echo 'Votre photo de profil a étè mise à jour...';
									
										}
										
										$req->closeCursor();
}

