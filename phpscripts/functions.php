<?php

function db_connect() {
	// définition des variables de connexion à la base de données	
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		// INFORMATIONS DE CONNEXION
		$host = 	'localhost';
		$dbname = 	'institut_salomon';
		$user = 	'root';
		$password = 	'';
		// FIN DES DONNEES
		
		$db = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $password, $pdo_options);
		return $db;
	} catch (Exception $e) {
		die('Erreur de connexion : ' . $e->getMessage());
	}
}

function user_verified() {
	return isset($_SESSION['id']);
}
function code($texte)
	{
//Smileys
$texte = str_replace(':happy:', '<img src="smileys/heureux.png" title="heureux" alt="heureux"  width="25px" height="25px"/>', $texte);
$texte = str_replace(':lol:', '<img src="smileys/lol.png" title="lol" alt="lol"  width="25px" height="25px"/>', $texte);
$texte = str_replace(':triste:', '<img src="smileys/triste.png" title="triste" alt="triste" width="25px" height="25px"/>', $texte);
$texte = str_replace(':frime:', '<img src="smileys/cool.png" title="cool" alt="cool"  width="25px" height="25px"/>', $texte);
$texte = str_replace(':D', '<img src="smileys/rire.png" title="rire" alt="rire" width="25px" height="25px"/>', $texte);
$texte = str_replace(':o.O', '<img src="smileys/peur.png" title="peur" alt="peur" width="25px" height="25px"/>', $texte);
$texte = str_replace(':*', '<img src="smileys/kiss.png" title="kiss" alt="kiss" width="25px" height="25px"/>', $texte);
$texte = str_replace(':cry:', '<img src="smileys/cry.png" title="cry" alt="cry"  width="25px" height="25px"/>', $texte);
$texte = str_replace('/:', '<img src="smileys/unsure.png" title="unsure" alt="unsure" height="25px"/>', $texte);
$texte = str_replace(':O', '<img src="smileys/angel.png" title="angel" alt="angel" width="25px" height="25px"/>', $texte);
$texte = str_replace(':V', '<img src="smileys/pacman.png" title="pacman" alt="pacman"  width="25px" height="25px"/>', $texte);
$texte = str_replace(':confus:', '<img src="smileys/confused.png" title="confus" alt="confus"  width="25px" height="25px"/>', $texte);
$texte = str_replace(':B', '<img src="smileys/blague.png" title="blague" alt="blague"  width="25px" height="25px"/>', $texte);
$texte = str_replace(':aime:', '<img src="smileys/aime.png" title="aime" alt="aime" width="25px" height="25px"/>', $texte);
$texte = str_replace(':o', '<img src="smileys/choc.gif" title="choc" alt="choc" width="32px" height="32px"/>', $texte);
$texte = str_replace(':3', '<img src="smileys/punition.gif" title="punition" alt="punition" width="35px" height="35px"/>', $texte);



	//Mise en forme du texte
//gras
$texte = preg_replace('`\[g\](.+)\[/g\]`isU', '<strong>$1</strong>', $texte); 
//italique
$texte = preg_replace('`\[i\](.+)\[/i\]`isU', '<em>$1</em>', $texte);
//souligné
$texte = preg_replace('`\[s\](.+)\[/s\]`isU', '<u>$1</u>', $texte);//souligné
//taille
$texte = preg_replace('`\[font size=(.+)\](.+)\[/font\]`isU', '<font size="$1">$2</font>', $texte);
//lien
$texte = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $texte);
//color
$texte = preg_replace('#\[color=(red|green|blue|yellow|purple|olive|grey)\](.+)\[/color\]#isU','<span style="color:$1">$2</span>', $texte);
//image
$texte = preg_replace('#\[img width=(.+) height=(.+)\](.+)\[/img\]#isU','<img src="$3" width="$1" height="$2" id="img_utilisateur"/>', $texte);
//video
$texte = preg_replace('#\[video\](.+)\[/video\]#isU','<video src="$1" controls poster="logooo.png" width="100%"/></video>', $texte);
//audio
$texte = preg_replace('#\[audio\](.+)\[/audio\]#isU','<audio src="$1" controls poster="logooo.png" width="100%"/></audio>', $texte);
//documemt word
$texte = preg_replace('`\[doc titre=(.+)\](.+)\[/doc\]`isU', '<a href="$2" title="voir document">$1</a>', $texte);
//citation
$texte = preg_replace('`\[quote auteur=(.+)\](.+)\[/quote\]`isU', '<div id="quote"><img src="citation.png"/><b>$1</b><br/><span>$2</span></div>', $texte);
//etc., etc.


//On retourne la variable texte
return $texte;
	}
function urllink($content='') {
	$content = preg_replace('#(((https?://)|(w{3}\.))+[a-zA-Z0-9&;\#\.\?=_/-]+\.([a-z]{2,4})([a-zA-Z0-9&;\#\.\?=_/-]+))#i', '<a href="$0" target="_blank">$0</a>', $content);
	// Si on capte un lien tel que www.test.com, il faut rajouter le http://
	if(preg_match('#<a href="www\.(.+)" target="_blank">(.+)<\/a>#i', $content)) {
		$content = preg_replace('#<a href="www\.(.+)" target="_blank">(.+)<\/a>#i', '<a href="http://www.$1" target="_blank">www.$1</a>', $content);
		//preg_replace('#<a href="www\.(.+)">#i', '<a href="http://$0">$0</a>', $content);
	}

	$content = stripslashes($content);
	return $content;
}

?>