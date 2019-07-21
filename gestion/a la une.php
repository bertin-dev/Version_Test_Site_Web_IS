<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <title>A LA UNE</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  </head>
  <body background="../pattern17.png">            
			
			
			<?php
  if(isset($_POST['info']))
  {
    require '../Database Configuration/config.php';
	include '../configuration serveur/config_server.php';
	
	$result = $bdd->prepare('INSERT INTO news (information, taille) VALUES (?, ?)');
	$result->execute(array($_POST['info'], $_POST['taille']));
	
	if(!$result)
    $message="Echec d'Envoi!!!";
    else
	$message="Envoi Effectué avec Succès!!!";
  }


?>



  <br><br><br><br>
  <center>
  
  <h1> POSTEZ UNE INFORMATION EN UNE DE PAGE</h1>
   
  <form action="a la une.php" method="post">
    <p>Message :</p>
    <input type="text" name="info" autofocus required maxlength="100">
    
	<p>Taille du Message :</p>
	<select name="taille">
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
	<option value="32">32</option>
	<option value="33">33</option>
	<option value="34">34</option>
	<option value="35">35</option>
	<option value="36">36</option>
	<option value="37">37</option>
	<option value="38" selected="selected">38</option>
	<option value="39">39</option>
	<option value="40">40</option>
	</select>
	
	<p>&nbsp;</p>
	
    <input type="submit" value=" ENVOYER ">
  </form>
            <?php
  if(isset($message))
  {
    echo $message;
  }


?>
</center>


</body>
</html>