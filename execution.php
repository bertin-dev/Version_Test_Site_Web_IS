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
     if(isset($_GET['envoi']))
     {
          
          // Vérification de la validité des champs
          if(!preg_match('/^[A-Za-z0-9_ ]{4,20}$/', $_POST['nomF'])) 
          { 
	           $i++;
               $message .= "Nom Invalide<br />\n";
          }
		  elseif(!preg_match('/^[A-Za-z0-9_ ]{4,20}$/', $_POST['prenomF']))
          {
			   $i++;
               $message .= "Prenom Invalide<br />\n";
          }
		  
		  elseif(!preg_match('/^[A-Z\d\._-]+@[A-Z\d\.-]{2,}\.[A-Z]{2,4}$/i', $_POST['emailF']))
          {
			   $i++; 
               $message .= "Votre Adresse E-mail n'est pas valide <br/>";
          }
		  
		   elseif(!preg_match('/^[0-9]{9,15}$/', $_POST['telephoneF']))
          {
			   $i++;
               $message .= "Numero Invalide<br />\n";
          }
		  
          elseif(!preg_match('/^[A-Za-z0-9]{6,}$/', $_POST['passF']))
          {
			   $i++;
               $message .= "Mot de passe Invalide et doit comporter au moins 6 caractères <br/>";
          }
          elseif($_POST['passF'] != $_POST['pass_confirmF'])
          {
			   $i++;
               $message .= "Votre mot de passe n'a pas été correctement confirmé<br/>";
          }
          
		  /*
		  elseif(!preg_match('/^[A-Za-z0-9_ ]{4,1000}$/', $_POST['biographie']))
          {
			   $i++;
               $message .= "la biographie doit comporter au moins 4 caractères <br/>";
          }
		  */
          else
          {
               // Connexion à la base de données
               // Valeurs à modifier selon vos paramètres configuration
                include 'configuration serveur/config_server.php';
			   
			   nettoieProtect();
               extract($_POST);
			   
			   $result = $bdd->query('SELECT COUNT(*) FROM institut_salomon.formateur 
			   WHERE formateur.email=\''.$_POST['emailF']. '\' OR formateur.numero =\''.$_POST['telephoneF'].'\' OR formateur.matricule !=\''.$_POST['matriculeF'].'\'');
			   
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
                         $result = $bdd->query('SELECT * FROM institut_salomon.formateur
						 WHERE formateur.email=\''.$_POST['emailF']. '\' OR formateur.numero =\''.$_POST['telephoneF'].'\' OR formateur.matricule !=\''.$_POST['matriculeF'].'\'');
						 
                         //while($row = mysql_fetch_array($result))
							 while($row = $result->fetch())
                         {
                              
                              if($_POST['telephoneF'] == $row['numero'])
                              {
								 
                                   $message .= "Le Numero: " . $_POST['telephoneF'];
                                   $message .= " déjà utilisé<br/>";
                              }
                              elseif($_POST['emailF'] == $row['email'])
                              {
								 
                                   $message .= "Adresse E-mail (" . $_POST['emailF'].')';
                                   $message .= " déjà utilisée<br/>";
                              }
							  
							  elseif($_POST['matriculeF'] != $row['matricule'])
                              {
								 
                                   $message .= "Ce Matricule (" . $_POST['matriculeF'].')';
                                   $message .= " n'existe pas dans notre Base de données<br/>";
                              }
							
                              $result->closeCursor();
                         }
                         
                    }
                    else
                    {
						
						
						include ('fonctions/filiere_etudiants.php');
						
					    $_SESSION['filiere_F'] = filiere_etudiant($_POST['coursF']);
						$_SESSION['nom_F']=$_POST['nomF'];
						$_SESSION['prenom_F']=$_POST['prenomF'];
						$_SESSION['sexe_F']=$_POST['sexe'];
						$_SESSION['email_F']=$_POST['emailF'];
						$_SESSION['contact_F']=$_POST['telephoneF'];
						$_SESSION['experience_F']=$_POST['experience'];
						$_SESSION['cours_F']=$_POST['coursF'];
						$_SESSION['quartier_F']=$_POST['quartier'];
						$_SESSION['mtp_F']=sha1($_POST['passF']);
						$_SESSION['matricule_F']=$_POST['matriculeF'];
						$_SESSION['biographie_F']=$_POST['biographie'];
						$_SESSION['time']=time();
						
						
						 // Génération de la clef d'activation
                         $caracteres = array("a", "b", "c", "d", "e", "f", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
                         $caracteres_aleatoires = array_rand($caracteres, 8);
                         $clef_activation = "";
                         
                         foreach($caracteres_aleatoires as $j)
                         {
                              $clef_activation .= $caracteres[$j];
                         }
						
						 
                        //INSERTION DU CODE D'ENVOI DES EMAILS
						
						
						//INSERTION QUARTIER
						$result = $bdd->prepare('INSERT INTO quartier (nom_quartier) VALUES (?)');
						$result->execute(array($_SESSION['quartier_F']));
						
						$efiliere = $bdd->prepare('INSERT INTO filiere (nom_filiere) VALUES (?)');
						$efiliere->execute(array($_SESSION['filiere_F']));
						
						
						$rfiliere = $bdd->prepare('SELECT id_filiere, nom_filiere FROM filiere WHERE nom_filiere=:nomf');
						$rfiliere->execute(array('nomf'=>$_SESSION['filiere_F']));
						$rligne = $rfiliere->fetch();
						$nom_filiere = $rligne['nom_filiere'];

						
						
						
						
						
						
						
						   
										
						 //INSERTION des données (Enregistrement des clés etrangères et clés primaires)
						 
						$retour = $bdd->prepare('SELECT * FROM quartier WHERE nom_quartier=:nomp');
						$retour->execute(array('nomp'=>$_SESSION['quartier_F']));
						$ligne = $retour->fetch();
						$id_quartier = $ligne['id_quartier'];
						
						
						$req = $bdd->prepare('INSERT INTO formateur (nom_f, ref_quartier, cours_dispense, prenom_f, civilite, email, numero, filiere, mdp, biographie, experience, matricule, date_inscription, avatars, ip_form, clef_activation, etat_compte) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
						$req->execute(array(
                        $_SESSION['nom_F'],
                        $id_quartier,
                        $_SESSION['cours_F'], 						
                        $_SESSION['prenom_F'], 	
                        $_SESSION['sexe_F'], 
                         $_SESSION['email_F'],
                        $_SESSION['contact_F'],
						$nom_filiere,
                         $_SESSION['mtp_F'],
                         $_SESSION['biographie_F'],
                         $_SESSION['experience_F'],
                         $_SESSION['matricule_F'],
                         time(),						 
                         '',
                         $_SERVER['REMOTE_ADDR'], 
                         $clef_activation,
                         $etat = 0						 
						));
						//recuperation de id_formateur et ça filiere 
						$ret = $bdd->prepare('SELECT * FROM formateur WHERE numero=:numero');
						$ret->execute(array('numero'=>$_SESSION['contact_F']));
						$prof = $ret->fetch();
					    $id_formateur = $prof['id_formateur'];	
						$filiere_prof = $prof['filiere'];



                         $rfiliere14 = $bdd->prepare('SELECT ref_formateur, nom_filiere, id_filiere FROM membre, filiere WHERE id_filiere=ref_filiere');
						$rfiliere14->execute();
						$rligne14 = $rfiliere14->fetch();
						$rligne14['ref_formateur'];
                        $rligne14['nom_filiere'];
				         $rligne14['id_filiere'];
						
                        if($filiere_prof==$rligne14['nom_filiere'])
						{
						$miseAjour1 = $bdd->prepare('UPDATE membre SET ref_formateur=:nvTimestamp WHERE ref_filiere=:id_filiere');
	                     $miseAjour1->execute(array('nvTimestamp' => $id_formateur, 'id_filiere'=>$rligne14['id_filiere']));
						}
						
						$_SESSION['ID']=2;
                         if(!$req)
                         {
							  $i++;
                              $success = "Erreur d'accès à la base de données lors de la création du compte utilisateur<br/>";
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
                         $msg .= $msg.$rep.'activer-compte-formateur.php?id='.$bdd->lastInsertId(); //"mysql_insert_id();
                         $msg .= '&clef='.$clef_activation;
                              
							  
							  
							  /* Pour envoyer le courrier HTML, vous pouvez mettre l'en-tête du Contenu-type */
                          $headers  = 'MIME-Version: 1.0' . "\r\n";
                          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                             /* additional headers */
                          $headers .= "To: ".$_POST['nomF'].' '.$_POST['prenomF']." <".$_POST['emailF'].">\r\n";
                          $headers .= "From: Site <info@the-Builders.org>\r\n";



                              // Si une erreur survient
                              if(!@mail($_POST['emailF'], $sujet, $msg, $headers))
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
							$('#formateur').load('inscription3.php?sexe=<?php echo $_POST['sexe'];?>');
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
										}else{echo "chargement de l'image non effectué";}
								}else{echo "Extension non Valide";}
						}else{echo "Taille de l'image non valide";}
				}else{echo "fichier non défini";}
		
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
/**********************************************************/
 
if(isset($_GET['ok']))
{
if(isset($_FILES['image']['name']) AND !empty($_FILES['image']['name']))
{
	if(isset($_POST['titre'],$_POST['contenu']) AND !empty($_POST['titre']) AND !empty($_POST['contenu']) ) 
	{
			//on enleve l'echappement si get_magic_quotes_gpc() est activé
		if(get_magic_quotes_gpc())
		{
		$_POST['titre']=strtolower(stripslashes(htmlspecialchars($_POST['titre'])));
		$_POST['contenu']=strtolower(stripslashes(htmlspecialchars($_POST['contenu'])));
		}
		//on verifi si l'adresse de l'image a ete bien definie
		if(isset($_FILES['image']['name']))
		{	
			if(isset($_FILES['image']['name']))
				{
				//on verifi la taille de l'image
					if($_FILES['image']['size']>=1000)
						{
						$extensions_valides=Array('flv','avi','mp4','webm');
						//la fonctions strrchr( $chaine,'.') renvoit l'extension avec le point
						//la fonction substtr($chaine,1) ingore la premiere caractere de la chaine
						//la fonction strtolower($chaine) renvoit la chaine en minuscule
						$extension_upload=strtolower(substr(strrchr($_FILES['image']['name'],'.'),1));
						//on verifi si l'extension_uplod est valide
							
							if(in_array($extension_upload,$extensions_valides))
								{
								$id_membre=md5(uniqid(rand(),true));	
								$chemin="videos/{$id_membre}.{$extension_upload}";
								//on deplace du serveur au disque dur
								
									if(move_uploaded_file($_FILES['image']['tmp_name'],$chemin))
										{
										include 'configuration serveur/config_server.php';

                                          //SELECTION DE L'ID Formateur										
										$req0=$bdd->prepare('SELECT id_formateur, nom_f FROM formateur WHERE numero=:pseudo');
										$req0->execute(array('pseudo'=>$_SESSION['contact_F']));
										$resultat0=$req0->fetch();
										$id_formateur=$resultat0['id_formateur'];
										$nom=$resultat0['nom_f'];
										
										
										
										//SELECTION DE L'ID Filiere
						$rfiliere = $bdd->prepare('SELECT * FROM filiere WHERE nom_filiere=:nomf');
						$rfiliere->execute(array('nomf'=>$_SESSION['filiere_F']));
						$rligne = $rfiliere->fetch();
						$id_filiere = $rligne['id_filiere'];
										
										
										
										//SELECTION DE L'ID Membre
						 
						$rmembre = $bdd->prepare('SELECT id_membre FROM membre');
						$rmembre->execute();
						$ligne = $rmembre->fetch();
						$id_membre = $ligne['id_membre'];
						$taille=filesize($chemin)/1024;			
						
										
										
										//SELECTION DE L'ID Membre										
										$req=$bdd->prepare('INSERT INTO actualite 
										VALUES(:id_actualite, :ref_formateur, :ref_filiere, :ref_membre, :nom_cours, :titre, :contenu, :image, :poster_img, :fichier, :taille, :aime, :noaime, :date_ajout)');
										
										$req->execute(array('id_actualite'=>'',
															'ref_formateur'=>$id_formateur,
															'ref_filiere'=>$id_filiere,
															'ref_membre'=>$id_membre,
															'nom_cours'=>$_SESSION['cours_F'],
															'titre'=>$_POST['titre'],
															'contenu'=>$_POST['contenu'],
															'image'=>$chemin,	
															'poster_img'=>'',
                                                            'fichier'=>'',
                                                            'taille'=>$taille,															 
															'aime'=>0,
															'noaime'=>0,
															'date_ajout'=>time()
															));
										$req->closeCursor();
										if($req)
										{
											 echo 'chargement du fichier '.$_FILES['image']['name'].' Termine!<br>';
											echo "Votre publication à étè éffectuée avec succès.";
										}else{echo "Erreur d'envoi du fichier dans la base de données";}
									}else{echo "no deplace";}
								}else{echo "Extension non défini";}
						}else{echo "Taille du fichier inférieur à 1 MO";}
				}else{echo "Fichier non défini";}
		}
		
	}else{echo "Veuillez remplir tous les champs S.V.P.";}
}
else
	{
				include 'configuration serveur/config_server.php';

                                          //SELECTION DE L'ID Formateur										
										$req0=$bdd->prepare('SELECT id_formateur, nom_f FROM formateur WHERE numero=:pseudo');
										$req0->execute(array('pseudo'=>$_SESSION['contact_F']));
										$resultat0=$req0->fetch();
										$id_formateur=$resultat0['id_formateur'];
										$nom=$resultat0['nom_f'];
										
										
										
										//SELECTION DE L'ID Filiere
						$rfiliere = $bdd->prepare('SELECT * FROM filiere WHERE nom_filiere=:nomf');
						$rfiliere->execute(array('nomf'=>$_SESSION['filiere_F']));
						$rligne = $rfiliere->fetch();
						$id_filiere = $rligne['id_filiere'];
										
										
										
										//SELECTION DE L'ID Membre
						 
						$rmembre = $bdd->prepare('SELECT id_membre FROM membre WHERE cours_choisi=:cours');
						$rmembre->execute(array('cours'=>$_SESSION['cours_F']));
						$ligne = $rmembre->fetch();
						$id_membre = $ligne['id_membre'];
						$taille=filesize($chemin)/1024;					
						
										
										
										//SELECTION DE L'ID Membre										
										$req=$bdd->prepare('INSERT INTO actualite 
										VALUES(:id_actualite, :ref_formateur, :ref_filiere, :ref_membre, :nom_cours, :titre, :contenu, :image, :poster_img, :fichier, :taille, :aime, :noaime, :date_ajout)');
										
										$req->execute(array('id_actualite'=>'',
															'ref_formateur'=>$id_formateur,
															'ref_filiere'=>$id_filiere,
															'ref_membre'=>$id_membre,
															'nom_cours'=>$_SESSION['cours_F'],
															'titre'=>$_POST['titre'],
															'contenu'=>$_POST['contenu'],
															'image'=>'',	
															'poster_img'=>'',
                                                            'fichier'=>'',
                                                            'taille'=>'',															 
															'aime'=>0,
															'noaime'=>0,
															'date_ajout'=>time()
															));
										
										$req->closeCursor();
										if($req)
										{
											echo "Votre Cours a étè Envoyé avec succès.";
										}	
		}
}




//-------------------INSERTION DU LIEN YOUTUBE

if(isset($_GET['ytube']))
{

	if(isset($_POST['titre'],$_POST['contenu']) AND !empty($_POST['titre']) AND !empty($_POST['contenu']) ) 
	{
			//on enleve l'echappement si get_magic_quotes_gpc() est activé
		if(get_magic_quotes_gpc())
		{
		$_POST['contenu']=strtolower(stripslashes(htmlspecialchars($_POST['contenu'])));
		}

										include 'configuration serveur/config_server.php';

                                          //SELECTION DE L'ID Formateur										
										$req0=$bdd->prepare('SELECT id_formateur, nom_f FROM formateur WHERE numero=:pseudo');
										$req0->execute(array('pseudo'=>$_SESSION['contact_F']));
										$resultat0=$req0->fetch();
										$id_formateur=$resultat0['id_formateur'];
										$nom=$resultat0['nom_f'];
										
										
										
										//SELECTION DE L'ID Filiere
						$rfiliere = $bdd->prepare('SELECT * FROM filiere WHERE nom_filiere=:nomf');
						$rfiliere->execute(array('nomf'=>$_SESSION['filiere_F']));
						$rligne = $rfiliere->fetch();
						$id_filiere = $rligne['id_filiere'];
										
										
										
										//SELECTION DE L'ID Membre
						 
						$rmembre = $bdd->prepare('SELECT id_membre FROM membre');
						$rmembre->execute();
						$ligne = $rmembre->fetch();
						$id_membre = $ligne['id_membre'];
										
						
										//chemin du lien de la video youtube
										$chemin="videos/{$_POST['titre']}";
										
										//SELECTION DE L'ID Membre										
										$req=$bdd->prepare('INSERT INTO actualite 
										VALUES(:id_actualite, :ref_formateur, :ref_filiere, :ref_membre, :nom_cours, :titre, :contenu, :image, :poster_img, :fichier, :taille, :aime, :noaime, :date_ajout)');
										
										$req->execute(array('id_actualite'=>'',
															'ref_formateur'=>$id_formateur,
															'ref_filiere'=>$id_filiere,
															'ref_membre'=>$id_membre,
															'nom_cours'=>$_SESSION['cours_F'],
															'titre'=>'',
															'contenu'=>$_POST['contenu'],
															'image'=>$chemin,	
															'poster_img'=>'',
                                                            'fichier'=>'',
                                                            'taille'=>'',															 
															'aime'=>0,
															'noaime'=>0,
															'date_ajout'=>time()
															));
										
										$req->closeCursor();
										if($req)
										{
											 echo 'chargement du fichier Termine!<br>';
											echo "Votre publication à étè éffectuée avec succès.";
						                }
					     else{echo "Erreur d'envoi du fichier dans la base de données";}
				}
				else{echo "Veuillez remplir tous les champs S.V.P.";}
}



//-------------------INSERTION DES FICHIERS EXCEL WORD PDF



if(isset($_GET['cours']))
{
if(isset($_FILES['image']['name']) AND !empty($_FILES['image']['name']))
{
	if(isset($_POST['titre'],$_POST['contenu']) AND !empty($_POST['titre']) AND !empty($_POST['contenu']) ) 
	{
			//on enleve l'echappement si get_magic_quotes_gpc() est activé
		if(get_magic_quotes_gpc())
		{
		$_POST['titre']=strtolower(stripslashes(htmlspecialchars($_POST['titre'])));
		$_POST['contenu']=strtolower(stripslashes(htmlspecialchars($_POST['contenu'])));
		}
		//on verifi si l'adresse de l'image a ete bien definie
		if(isset($_FILES['image']['name']))
		{	
			if(isset($_FILES['image']['name']))
				{
				//on verifi la taille de l'image
					if($_FILES['image']['size']>=1000)
						{
						$extensions_valides=Array('pdf','doc','docx','xls', 'xlsx');
						//la fonctions strrchr( $chaine,'.') renvoit l'extension avec le point
						//la fonction substtr($chaine,1) ingore la premiere caractere de la chaine
						//la fonction strtolower($chaine) renvoit la chaine en minuscule
						$extension_upload=strtolower(substr(strrchr($_FILES['image']['name'],'.'),1));
						//on verifi si l'extension_uplod est valide
							
							if(in_array($extension_upload,$extensions_valides))
								{
								$id_membre=md5(uniqid(rand(),true));	
								$chemin="pdf/{$id_membre}.{$extension_upload}";
								//on deplace du serveur au disque dur
								
									if(move_uploaded_file($_FILES['image']['tmp_name'],$chemin))
										{
										include 'configuration serveur/config_server.php';

                                          //SELECTION DE L'ID Formateur										
										$req0=$bdd->prepare('SELECT id_formateur, nom_f FROM formateur WHERE numero=:pseudo');
										$req0->execute(array('pseudo'=>$_SESSION['contact_F']));
										$resultat0=$req0->fetch();
										$id_formateur=$resultat0['id_formateur'];
										$nom=$resultat0['nom_f'];
										
										
										
										//SELECTION DE L'ID Filiere
						$rfiliere = $bdd->prepare('SELECT * FROM filiere WHERE nom_filiere=:nomf');
						$rfiliere->execute(array('nomf'=>$_SESSION['filiere_F']));
						$rligne = $rfiliere->fetch();
						$id_filiere = $rligne['id_filiere'];
										
										
										
										//SELECTION DE L'ID Membre
						 
						$rmembre = $bdd->prepare('SELECT id_membre FROM membre');
						$rmembre->execute();
						$ligne = $rmembre->fetch();
						$id_membre = $ligne['id_membre'];
						$taille=filesize($chemin)/1024;			
						
										
										
										//SELECTION DE L'ID Membre										
										$req=$bdd->prepare('INSERT INTO actualite 
										VALUES(:id_actualite, :ref_formateur, :ref_filiere, :ref_membre, :nom_cours, :titre, :contenu, :image, :poster_img, :fichier, :taille, :aime, :noaime, :date_ajout)');
										
										$req->execute(array('id_actualite'=>'',
															'ref_formateur'=>$id_formateur,
															'ref_filiere'=>$id_filiere,
															'ref_membre'=>$id_membre,
															'nom_cours'=>$_SESSION['cours_F'],
															'titre'=>$_POST['titre'],
															'contenu'=>$_POST['contenu'],
															'image'=>'',	
															'poster_img'=>'',
                                                            'fichier'=>$chemin,
                                                            'taille'=>$taille,															 
															'aime'=>0,
															'noaime'=>0,
															'date_ajout'=>time()
															));
										$req->closeCursor();
										if($req)
										{
											 echo 'chargement du fichier '.$_FILES['image']['name'].' Termine!<br>';
											echo "Votre publication à étè éffectuée avec succès.";
										}else{echo "Erreur d'envoi du fichier dans la base de données";}
									}else{echo "no deplace";}
								}else{echo "Extension non défini";}
						}else{echo "Taille du fichier inférieur à 1 MO";}
				}else{echo "Fichier non défini";}
		}
		
	}else{echo "Veuillez remplir tous les champs S.V.P.";}
}
else
	{
				include 'configuration serveur/config_server.php';

                                          //SELECTION DE L'ID Formateur										
										$req0=$bdd->prepare('SELECT id_formateur, nom_f FROM formateur WHERE numero=:pseudo');
										$req0->execute(array('pseudo'=>$_SESSION['contact_F']));
										$resultat0=$req0->fetch();
										$id_formateur=$resultat0['id_formateur'];
										$nom=$resultat0['nom_f'];
										
										
										
										//SELECTION DE L'ID Filiere
						$rfiliere = $bdd->prepare('SELECT * FROM filiere WHERE nom_filiere=:nomf');
						$rfiliere->execute(array('nomf'=>$_SESSION['filiere_F']));
						$rligne = $rfiliere->fetch();
						$id_filiere = $rligne['id_filiere'];
										
										
										
										//SELECTION DE L'ID Membre
						 
						$rmembre = $bdd->prepare('SELECT id_membre FROM membre WHERE cours_choisi=:cours');
						$rmembre->execute(array('cours'=>$_SESSION['cours_F']));
						$ligne = $rmembre->fetch();
						$id_membre = $ligne['id_membre'];
						$taille=filesize($chemin)/1024;					
						
										
										
										//SELECTION DE L'ID Membre										
										$req=$bdd->prepare('INSERT INTO actualite 
										VALUES(:id_actualite, :ref_formateur, :ref_filiere, :ref_membre, :nom_cours, :titre, :contenu, :image, :poster_img, :fichier, :taille, :aime, :noaime, :date_ajout)');
										
										$req->execute(array('id_actualite'=>'',
															'ref_formateur'=>$id_formateur,
															'ref_filiere'=>$id_filiere,
															'ref_membre'=>$id_membre,
															'nom_cours'=>$_SESSION['cours_F'],
															'titre'=>$_POST['titre'],
															'contenu'=>$_POST['contenu'],
															'image'=>'',	
															'poster_img'=>'',
                                                            'fichier'=>'',
                                                            'taille'=>'',															 
															'aime'=>0,
															'noaime'=>0,
															'date_ajout'=>time()
															));
										
										$req->closeCursor();
										if($req)
										{
											echo "Votre Cours a étè Envoyé avec succès.";
										}	
		}
}
?>