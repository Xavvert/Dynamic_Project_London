<?php
$selected_category = $_GET['cat'];
echo $selected_category;
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=myproject;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	
        die('Erreur : '.$e->getMessage());
}


$reponse = $bdd->query("UPDATE customer set name='$selected_category' where id=101");





?>