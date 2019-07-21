<?php

 try
		{
		$bdd= new PDO ('mysql:host=localhost; dbname=ozcl59r6_newsletter', 'ozcl59r6', '78695339Bertin@');
		}
		catch(Exception $e)
		{
			die('Erreur'. $e->getMessage());
		}
		
		
		?>