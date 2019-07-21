<?php session_start();?>

  <?php 

require 'Database Configuration/config.php';
 include("connectes.php");
 include("Vues.php");
 
 
 function nettoieProtect(){

foreach($_POST as $k => $v){
  $v=strip_tags(trim($v));
  $_POST[$k]=$v;
  }
  
  foreach($_GET as $k => $v){
  $v=strip_tags(trim($v));
  $_GET[$k]=$v;
  }
  
  foreach($_REQUEST as $k => $v){
  $v=strip_tags(trim($v));
  $_REQUEST[$k]=$v;
  }

}

     $message='';
	 $success='';
	 $i=0;
     // Une fois le formulaire envoyé
     if(isset($_GET['inscription']))
     {
          
          // Vérification de la validité des champs
          if(!preg_match('/^[A-Za-z0-9_ ]{4,20}$/', $_POST['nomE'])) 
          { 
	           $i++;
               $message .= "Nom Invalide<br />\n";
          }
		  elseif(!preg_match('/^[A-Za-z0-9_ ]{4,20}$/', $_POST['prenomE']))
          {
			   $i++;
               $message .= "Prenom Invalide<br />\n";
          }
		  
		  elseif(!preg_match('/^[A-Z\d\._-]+@[A-Z\d\.-]{2,}\.[A-Z]{2,4}$/i', $_POST['emailE']))
          {
			   $i++; 
               $message .= "Votre Adresse E-mail n'est pas valide <br/>";
          }
		  
		   elseif(!preg_match('/^[0-9]{9,15}$/', $_POST['telephoneE']))
          {
			   $i++;
               $message .= "Numero Invalide<br />\n";
          }
		  
          elseif(!preg_match('/^[A-Za-z0-9]{6,}$/', $_POST['passE']))
          {
			   $i++;
               $message .= "Mot de passe Invalide et doit comporter au moins 6 caractères <br/>";
          }
          elseif($_POST['passE'] != $_POST['pass_confirmE'])
          {
			   $i++;
               $message .= "Votre mot de passe n'a pas été correctement confirmé<br/>";
          }
          
          else
          {
               // Connexion à la base de données
               // Valeurs à modifier selon vos paramètres configuration
                include 'configuration serveur/config_server.php';
			   
			   nettoieProtect();
               extract($_POST);
			   /*
			   $result = $bdd->query('SELECT COUNT(*) FROM institut_salomon.membre 
			   WHERE membre.email=\''.$_POST['emailE']. '\' OR membre.numero =\''.$_POST['telephoneE'].'\'');
			   */
			   
			   $result = $bdd->prepare('SELECT COUNT(*) FROM institut_salomon.membre 
			   WHERE membre.email=:mail OR membre.numero=:num');
			   $result->execute(array('mail'=>$_POST['emailE'], 'num'=>$_POST['emailE']));
			   
               // Si une erreur survient
               if(!$result)
               {
				    $i++;
                    $message .= "Erreur d'accès à la base de données lors de la vérification d'unicité<br/>";
               }
               else
               {
             
                    // Si un enregistrement est trouvé
                    if($result->fetchColumn() > 0)
                    {
                         $result = $bdd->query('SELECT * FROM institut_salomon.membre
						 WHERE membre.email=\''.$_POST['emailE']. '\' OR membre.numero =\''.$_POST['telephoneE'].'\'');
						 
                         //while($row = mysql_fetch_array($result))
							 while($row = $result->fetch())
                         {
                              
                              if($_POST['telephoneE'] == $row['numero'])
                              {
								 
                                   $message .= "Le Numero: " . $_POST['telephoneE'];
                                   $message .= " déjà utilisé<br/>";
                              }
                              elseif($_POST['emailE'] == $row['email'])
                              {
								 
                                   $message .= "Adresse E-mail (" . $_POST['emailE'].')';
                                   $message .= " déjà utilisée<br/>";
                              }
							
                              $result->closeCursor();
                         }
                         
                    }
                    else
                    {
						include ('fonctions/filiere_etudiants.php');
						
					    $_SESSION['filiere_Etu'] = filiere_etudiant($_POST['coursE']);
					    $_SESSION['plateforme_Etu'] = plateforme($_SESSION['filiere_Etu']);
			
						$_POST['passE']=sha1($_POST['passE']);
						$_POST['pass_confirmE']=sha1($_POST['pass_confirmE']);
						
						$_SESSION['nom_Etu']=$_POST['nomE'];
						$_SESSION['prenom_Etu']=$_POST['prenomE'];
						$_SESSION['sexe_Etu']=$_POST['sexe'];
						$_SESSION['mtp_Etu']=$_POST['passE'];
						$_SESSION['email_Etu']=$_POST['emailE'];
						$_SESSION['contact_Etu']=$_POST['telephoneE'];
						$_SESSION['cours_Etu']=$_POST['coursE'];
						$_SESSION['quartier_Etu']=$_POST['quartierE'];
						$_SESSION['age_Etu']=$_POST['ageE'];
						$_SESSION['time']=time();
						
				
				
				
				         

						//INSERTION QUARTIER
						$resulta = $bdd->prepare('INSERT INTO quartier (nom_quartier) VALUES (?)');
						$resulta->execute(array($_SESSION['quartier_Etu']));
						//INSERTION FILIERE
						$resultat = $bdd->prepare('INSERT INTO filiere (nom_filiere) VALUES (?)');
						$resultat->execute(array($_SESSION['filiere_Etu']));
						
						
						//Selection de l'id_formateur avec creation au préalable d'une SESSION pour le formateur
                        $formateur = $bdd->prepare('SELECT * FROM formateur WHERE filiere=:filiere');
						$formateur->execute(array('filiere'=>$_SESSION['filiere_Etu']));
						$rFormateur = $formateur->fetch();
						$id_formateur = $rFormateur['id_formateur'];
						
						                       if(!isset($id_formateur))
												{
													$id_formateur = 0;
													$_SESSION['filiere_F']='';
												}
												else
												{
													$_SESSION['filiere_F']=$rFormateur['filiere'];
													$_SESSION['contact_F']=$rFormateur['numero'];
												}
						
						
						$donnee = $bdd->prepare('SELECT * FROM filiere WHERE nom_filiere=:nomf');
						$donnee->execute(array('nomf'=>$_SESSION['filiere_Etu']));
						$reponse = $donnee->fetch();
						$id_filiere = $reponse['id_filiere'];
						
						
						  $result1 = $bdd->prepare('SELECT * FROM quartier
						 WHERE nom_quartier=:quartier');
										$result1->execute(array('quartier'=>$_SESSION['quartier_Etu']));
										$ligne1 = $result1->fetch();
						$id_quartier = $ligne1['id_quartier'];
						           
						 
						  		 
							 // Génération de la clef d'activation
                         $caracteres = array("a", "b", "c", "d", "e", "f", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
                         $caracteres_aleatoires = array_rand($caracteres, 8);
                         $clef_activation = "";
                         
                         foreach($caracteres_aleatoires as $j)
                         {
                              $clef_activation .= $caracteres[$j];
                         }																

										
										
						 //INSERTION des données (Enregistrement des clés etrangères et clés primaires)
						$req = $bdd->prepare('INSERT INTO membre(ref_formateur, ref_filiere, ref_quartier, nom_membre, prenom_membre, password, civilite, email, age, numero, cours_choisi, avatars, date_inscription, clef_activation, ip_membre)  
						 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
						 $req->execute(array($id_formateur, $id_filiere, $id_quartier, $_SESSION['nom_Etu'], $_SESSION['prenom_Etu'], $_SESSION['mtp_Etu'], $_SESSION['sexe_Etu'], $_SESSION['email_Etu'], $_SESSION['age_Etu'], $_SESSION['contact_Etu'], $_SESSION['cours_Etu'], '', time(), $clef_activation, $ip=$_SERVER['REMOTE_ADDR']));
									
							
							
							
                         if(!$req)
                         {
							  $i++;
                              $message = "Erreur d'accès à la base de données lors de la création du compte utilisateur<br/>";
                         }
                         else
                         {
						
							unset($_SESSION['chemin']);
						/*
				          setcookie('ID_UTILISATEUR', $bdd->lastInsertId(), (time() - 172800));
						 $_SESSION['clef_activation']=$clef_activation;
				       */
				  
				  // Envoi du mail d'activation
                              $sujet = "Activation de votre compte utilisateur";
                              
                         $msg = " Ce mail vous a été envoyé car il a été enregistré lors de l'inscription sur le \n";
                         $msg .= "site web the-Builders Pour valider votre inscription, merci de cliquer sur le lien suivant :\n";
                         //$message .= "http://" . $_SERVER["SERVER_NAME"];
                          $msg .= 'http://'.$_SERVER['HTTP_HOST'];
                         //$end=end(explode('/',$_SERVER['PHP_SELF']));
						 
						 /*$a=explode('/',$_SERVER['PHP_SELF']);
						 $end=end($a);*/
						 
					     $end=current(array_reverse(explode('/', $_SERVER['PHP_SELF'])));
                         
						 $rep=str_replace($end,'',$_SERVER['PHP_SELF']);
                         $msg .= $msg.$rep.'activer-compte-utilisateur.php?id='.$bdd->lastInsertId(); //"mysql_insert_id();
                         $msg .= '&clef='.$clef_activation;
                              
							  
							  
							  /* Pour envoyer le courrier HTML, vous pouvez mettre l'en-tête du Contenu-type */
                          $headers  = 'MIME-Version: 1.0' . "\r\n";
                          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                             /* additional headers */
                          $headers .= "To: ".$_POST['prenomE'].' '.$_POST['nomE']." <".$_POST['emailE'].">\r\n";
                          $headers .= "From: Site <info@the-Builders.org>\r\n";



                              // Si une erreur survient
                              if(!@mail($_POST['emailE'], $sujet, $msg, $headers))
                              {
                                   $message = "Une erreur est survenue lors de l'envoi du mail d'activation<br />\n";
                                   $message .= "Veuillez contacter l'administrateur afin d'activer votre compte<br/>";
								   
			       
                              }
                              else
                              {
                                   // Message de confirmation
                                   $message = "Votre compte utilisateur a partiellement été créée<br />\n";
                                   $message .= "Un email vient de vous être envoyé afin de l'activer";
                                   // On masque le formulaire
								   
								   								   
								 //L'utilisateur à 48h (172800 secondes) pour valider son inscription par mail: 
								 //(le rafraichissement de la base se fait lors de l'inscription d'une personne).
								   /*$heure=time();
                                 mysql_query("DELETE FROM comptes_utilisateurs WHERE Date_Inscription < ($heure - 172800) AND Compte_Active='0'");*/
                                    $suppression = $bdd->prepare('DELETE FROM membre WHERE date_inscription<:expire AND etat_compte=:etat');
								 $suppression->execute(array('expire'=>(time() - 172800), 'etat'=>0));
								 
								 		
						?>
						<script>
							$('#plan').load('inscription2.php?sexe=<?php echo $_POST['sexe'];?>');
						</script>
						<?php
                         }
                         }	
						 $req->closeCursor();
                         
                    }
                    
               }
               
          }
          
            if(isset($message)&& $message!='') 
       {
	   
		   if($i==1)
		   { 
      	    echo 'il y a '. $i .' erreur<br/>';
			echo $message;
		   }
           else if($i>1)
		   { 
     	   echo 'il y a '. $i .' erreurs<br/>';
           echo $message;		   
		   }
           else echo $message;		   
     }
    }
	 

	 /*
	              echo     $_SESSION['nom_Etu'].'<br>';
					echo	$_SESSION['prenom_Etu'].'<br>';
					echo	$_SESSION['password_Etu'].'<br>';
					echo	$_SESSION['sexe_Etu'].'<br>';
					echo	$_SESSION['mtp_Etu'].'<br>';
					echo	$_SESSION['email_Etu'].'<br>';
					echo	$_SESSION['contact_Etu'].'<br>';
					echo	$_SESSION['cours_Etu'].'<br>';
					echo	$_SESSION['quartier_Etu'].'<br>';
					echo	$_SESSION['age_Etu'].'<br>';
						echo $_SESSION['time'].'<br>';
     
*/
	 
	 
	 
	 
/********************************************************/		
	if(isset($_GET['profil']))
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

if(isset($_POST['terminer']))
{
	 include 'configuration serveur/config_server.php';
	 
									if(empty($_SESSION['chemin']))
									{
										unset($_SESSION['chemin']);						
										if($_SESSION['sexe_Etu']=='M')
										{
						
										$chemin0="avatars/homme.png";	
										$_SESSION['chemin']=$chemin0;
										}else{
										$chemin0="avatars/femme.png";
										$_SESSION['chemin']=$chemin0;
										}
									}
									 							
						 
						 
}	



/**************************************************************************************************************************************************/
   if(isset($_GET['go']))
     {
        
		   	
		 //on enleve l'echappement si get_magic_quotes_gpc() est active
		if(get_magic_quotes_gpc())
		{
		$_POST['email']=strtolower(stripslashes(htmlspecialchars($_POST['email'])));
		$_POST['password']=strtolower(stripslashes(htmlspecialchars($_POST['password'])));
		}
		  
		  if(!preg_match('/^[A-Z\d\._-]+@[A-Z\d\.-]{2,}\.[A-Z]{2,4}$/i', $_POST['email']))
          {
			   $i++; 
               $message .= "Votre Adresse E-mail n'est pas valide";
          }
		  
          elseif(!preg_match('/^[A-Za-z0-9]{6,}$/', $_POST['password']))
          {
			   $i++;
               $message .= "Mot de passe Invalide";
          }
		  
          
          else
          {
               // Connexion à la base de données
               // Valeurs à modifier selon vos paramètres configuration
                include 'configuration serveur/config_server.php';
			   
			   nettoieProtect();
               extract($_POST);
			   
                      $membre = $bdd->prepare('SELECT * FROM formateur WHERE email=:mail AND mdp=:pass');
						$membre->execute(array('mail'=>$_POST['email'], 'pass'=>sha1($_POST['password'])));
						$membre1 = $membre->fetch();
							
						if($membre->rowCount() > 0)
						{ 			 
						 
						  if($membre1['etat_compte'] == '0')
                         {
                              $message = "Votre compte utilisateur n'a pas été activé";
                         }
						 else
						 {	 
					         
						$_SESSION['nom_F']=$membre1['nom_f'];
						$_SESSION['prenom_F']=$membre1['prenom_f'];
						$_SESSION['email_F']=$membre1['email'];
						$_SESSION['contact_F']=$membre1['numero'];
						$_SESSION['mdp_F']=$membre1['mdp'];
						$_SESSION['filiere_F']=$membre1['filiere'];
						$_SESSION['cours_F']=$membre1['cours_dispense'];
						$_SESSION['sexe_F']=$membre1['civilite'];
						$_SESSION['experience_F']=$membre1['experience'];
						$_SESSION['ID']=2;
						 $miseAjour = $bdd->prepare('UPDATE formateur SET date_connexion=:nvTimestamp WHERE email=:mail AND mdp=:pass');
	                     $miseAjour->execute(array('nvTimestamp' => time(), 'mail'=>$membre1['email'], 'pass'=>$membre1['mdp']));
						  
						  // Définition du temps d'expiration des cookies (90jours)
                                   $expiration =
                                        empty($_POST['t_and_c']) ? 0 : time() + 90 * 24 * 60 * 60;
                                   
                                   // Création des cookies
                                   setcookie("id_formateur", $membre1["id_formateur"], $expiration, "/");
                                   setcookie("nom_formateur", $membre1["nom_f"], $expiration, "/");
								   setcookie("prenom_formateur", $membre1["prenom_f"], $expiration, "/");
						
						
                                
								/*mysql_query("DELETE FROM Comptes_Utilisateurs WHERE Date_Inscription < ($heure - 172800) AND Compte_Active='0'");*/
								 $suppression = $bdd->prepare('DELETE FROM formateur WHERE date_inscription<:expire AND etat_compte=:etat');
								 $suppression->execute(array('expire'=>(time() - 172800), 'etat'=>0));
                                 $message=1;
								  

						 }
					    } // END $membre->rowCount() > 0
						
						else
						{
						 $message = "Adresse Email ou mot de passe est Erroné";
						}
           
		   
		   
		   
		   
		   
		   
		   
		   
	
 
    }
	
	 if(isset($message)&& $message!='') 
       {
           echo $message;		   
       }
	 
}
/**************************************************************************************************************************************************/
 
 
 
 

/*************************************************ESPACE ETUDIANT*************************************************************************************/
   if(isset($_GET['goE']))
     {
        
		   	
		 //on enleve l'echappement si get_magic_quotes_gpc() est active
		if(get_magic_quotes_gpc())
		{
		$_POST['emailE']=strtolower(stripslashes(htmlspecialchars($_POST['emailE'])));
		$_POST['passwordE']=strtolower(stripslashes(htmlspecialchars($_POST['passwordE'])));
		}
		  
		  if(!preg_match('/^[A-Z\d\._-]+@[A-Z\d\.-]{2,}\.[A-Z]{2,4}$/i', $_POST['emailE']))
          {
			   $i++; 
               $message .= "Votre Adresse E-mail n'est pas valide";
          }
		  
          elseif(!preg_match('/^[A-Za-z0-9]{6,}$/', $_POST['passwordE']))
          {
			   $i++;
               $message .= "Mot de passe Invalide et doit comporter au moins 6 caractères";
          }
		  
          
          else
          {
               // Connexion à la base de données
               // Valeurs à modifier selon vos paramètres configuration
                include 'configuration serveur/config_server.php';
			   
			   nettoieProtect();
               extract($_POST);
			   
                      $membre = $bdd->prepare('SELECT * FROM membre WHERE email=:mail AND password=:pass');
						$membre->execute(array('mail'=>$_POST['emailE'], 'pass'=>sha1($_POST['passwordE'])));
						$membre1 = $membre->fetch();
							
						if($membre->rowCount() > 0)
						{						 
						  if($membre1['etat_compte'] == '0')
                         {
                              $message = "Votre compte utilisateur n'a pas été activé";
                         }
						 else
						 {	 
					         
						$_SESSION['nom_Etu']=$membre1['nom_membre'];
						$_SESSION['prenom_Etu']=$membre1['prenom_membre'];
						$_SESSION['email_Etu']=$membre1['email'];
						$_SESSION['contact_Etu']=$membre1['numero'];
						$_SESSION['cours_Etu']=$membre1['cours_choisi'];
						$_SESSION['sexe_Etu']=$membre1['civilite'];
						$_SESSION['age_Etu']=$membre1['age'];
						$_SESSION['ID']=1;
						
						 $miseAjour = $bdd->prepare('UPDATE membre SET date_connexion=:nvTimestamp WHERE email=:mail AND password=:pass');
	                     $miseAjour->execute(array('nvTimestamp' => time(), 'mail'=>$membre1['email'], 'pass'=>$membre1['password']));
						  
						  // Définition du temps d'expiration des cookies (90jours)
                                   $expiration =
                                        empty($_POST['t_and_c']) ? 0 : time() + 90 * 24 * 60 * 60;
                                   
                                   // Création des cookies
                                   setcookie("id_membre", $membre1["id_membre"], $expiration, "/");
                                   setcookie("nom_membre", $membre1["nom_membre"], $expiration, "/");
								   setcookie("prenom_membre", $membre1["prenom_membre"], $expiration, "/");
								   setcookie("cours_Etu", $membre1['numero'], $expiration, "/");
								   
								 $format1 = $bdd->prepare('SELECT filiere, numero FROM formateur WHERE id_formateur=:ref_formateur');
						         $format1->execute(array('ref_formateur'=>$membre1["ref_formateur"]));
						         $rligne12 = $format1->fetch();
								 $_SESSION['filiere_F']=$rligne12['filiere'];
								 $_SESSION['contact_F']=$rligne12['numero'];
								   //L'utilisateur à 48h (172800 secondes) pour valider son inscription par mail: 
								 //(le rafraichissement de la base se fait lors de la connexion d'une personne).			 
								
								 
								 $rfiliere = $bdd->prepare('SELECT * FROM filiere WHERE id_filiere=:nomf');
						         $rfiliere->execute(array('nomf'=>$membre1["ref_filiere"]));
						         $rligne = $rfiliere->fetch();
						         $_SESSION['filiere_Etu'] = $rligne['nom_filiere'];
                                 /*mysql_query("DELETE FROM Comptes_Utilisateurs WHERE Date_Inscription < ($heure - 172800) AND Compte_Active='0'");*/
								 $suppression = $bdd->prepare('DELETE FROM membre WHERE date_inscription<:expire AND etat_compte=:etat');
								 $suppression->execute(array('expire'=>(time() - 172800), 'etat'=>0));
                                 $message=2;
								  

						 }
					    } // END $membre->rowCount() > 0

						else
						{
						 $message = "Adresse Email ou mot de passe est Erroné";
						}
		   
		   
		   
		   
	
 
    }
	
	   if(isset($message)&& $message!='') 
       {
           echo $message;		   
       }
	 
}
/**************************************************************************************************************************************************/
 
 


  
  
  
  
           
           
	 
	 
	

/**************************************************************/
if(isset($_GET['deconnexion']))
{
	
unset($_SESSION['nom']);
unset($_SESSION['pseudo']);
unset($_SESSION['password']);
unset($_SESSION['sexe']);
unset($_SESSION['email']);
unset($_SESSION['email']);
unset($_SESSION['filiere']);
unset($_SESSION['niveau']);
unset($_SESSION['chemin']);
header('location:index.php');	
}
?>
 
 
 
 
