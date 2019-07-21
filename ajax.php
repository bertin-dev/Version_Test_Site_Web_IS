<?php
session_start();
require 'Database Configuration/config.php';
extract($_POST);
if(isset($act) AND $act=='like')
	{
		//like
		include 'configuration serveur/config_server.php';
		//on recupere les infos lié à l'id de l'actualites
		$req0=$bdd->prepare('SELECT * FROM actualite WHERE id_actualite=:id_actualite');
		$req0->execute(array('id_actualite'=>$id));
		$rslt0=$req0->fetch();
		//on verifie si l'utilisateur a dejà aimé cette actualites

		$like=$rslt0['aime']+1;
		$req1=$bdd->prepare('UPDATE actualite SET aime=:aime WHERE id_actualite=:id_actualite');
		$req1->execute(array('aime'=>$like,'id_actualite'=>$id));
		$rslt1=$req1->fetch();
		
		$req2=$bdd->prepare('SELECT * FROM membre WHERE numero=:pseudo');
		$req2->execute(array('pseudo'=>$_SESSION['contact_Etu']));
		$rslt2=$req2->fetch();
		
		$req01=$bdd->prepare('SELECT count(*) As nbrs FROM mespreferes WHERE ref_actualite=:id_actualite AND ref_membre=:id_membre AND aime=1');
		$req01->execute(array('id_actualite'=>$id,'id_membre'=>$rslt2['id_membre']));
		$rslt01=$req01->fetch();
		
		if($rslt01['nbrs']==0)
		{
		$req3=$bdd->prepare('INSERT INTO mespreferes VALUES(:ref_actualite,:ref_membre,:aime)');
		$req3->execute(array('ref_actualite'=>$id,'ref_membre'=>$rslt2['id_membre'],'aime'=>1));
		$rslt3=$req3->fetch();
		}else
		{
		$req3=$bdd->prepare('UPDATE mespreferes SET aime=:aime WHERE ref_actualite=:id_actualite AND ref_membre=:id_membre');
		$req3->execute(array('aime'=>1,'id_actualite'=>$id,'id_membre'=>$rslt2['id_membre']));
		$rslt3=$req3->fetch();	
		}
		if($rslt1){echo $like;}else{echo $like;}
		$req0->closeCursor();
		$req1->closeCursor();
	}
	extract($_POST);
	if(isset($act) AND $act=='dislike')
	{
		//dislike
		include 'configuration serveur/config_server.php';
		$req0=$bdd->prepare('SELECT * FROM actualite WHERE id_actualite=:id_actualite');
		$req0->execute(array('id_actualite'=>$id));
		$rslt0=$req0->fetch();
		
		$dislike=$rslt0['noaime']+1;
		$req1=$bdd->prepare('UPDATE actualite SET noaime=:noaime WHERE id_actualite=:id_actualite');
		$req1->execute(array('noaime'=>$dislike,'id_actualite'=>$id));
		$rslt1=$req1->fetch();
		
		$req2=$bdd->prepare('SELECT * FROM membre WHERE numero=:pseudo');
		$req2->execute(array('pseudo'=>$_SESSION['contact_Etu']));
		$rslt2=$req2->fetch();
		
		$req01=$bdd->prepare('SELECT count(*) As nbrs FROM mespreferes WHERE ref_actualite=:id_actualite AND ref_membre=:id_membre');
		$req01->execute(array('id_actualite'=>$id,'id_membre'=>$rslt2['id_membre']));
		$rslt01=$req01->fetch();
		
		if($rslt01['nbrs']==0)
		{
		$req3=$bdd->prepare('INSERT INTO mespreferes VALUES(:ref_actualite,:ref_membre,:aime)');
		$req3->execute(array('ref_actualite'=>$id,'ref_membre'=>$rslt2['id_membre'],'aime'=>2));
		$rslt3=$req3->fetch();
		}else
		{
		$req3=$bdd->prepare('UPDATE mespreferes SET aime=:aime WHERE ref_actualite=:id_actualite AND ref_membre=:id_membre');
		$req3->execute(array('aime'=>2,'id_actualite'=>$id,'id_membre'=>$rslt2['id_membre']));
		$rslt3=$req3->fetch();	
		}
		if($rslt1){echo $dislike;}else{echo $dislike;}
	}
/*****************************************************************************************/
//nombre telehargement


if(isset($contenu) AND !empty($contenu))
{
include 'configuration serveur/config_server.php';
//requetes pour compter le nombre de commentaires


       $memb=$bdd->prepare('SELECT id_membre FROM membre WHERE numero=:pseudo');
		$memb->execute(array('pseudo'=>$_SESSION['contact_Etu']));
		$membre1=$memb->fetch();
		$ref_membre = $membre1['id_membre'];
	
	$req=$bdd->prepare('INSERT INTO commentaire 
										VALUES(:id_commentaire, :ref_actualite, :ref_membre, :contenu, :date_poste)');
										
										$req->execute(array('id_commentaire'=>'',
															'ref_actualite'=>$id,
															'ref_membre'=>$ref_membre,
															'contenu'=>$contenu,
															'date_poste'=>time()
															));
										if($req)
											{
													$req3=$bdd->prepare('SELECT count(*) As nbrs_comment FROM commentaire WHERE ref_actualite=:id_actualite');
													$req3->execute(array('id_actualite'=>$id));
													$rslt3=$req3->fetch();
													echo $rslt3['nbrs_comment'];
											}
		
}
extract($_POST);
if(isset($page))
{
	echo $id_page;
}
if(isset($amphi))
{
	echo $id_page;
}
if(isset($cours))
{
	echo $id_page;
}

