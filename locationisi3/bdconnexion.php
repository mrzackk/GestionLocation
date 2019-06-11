<?php
require_once("config.php");
/*$server="localhost";
$user="root";
$password="";
$dbname="app_inscription";
*/
try
{

   $connexion= new PDO("mysql:host=".HOST.";dbname=".BASE,USER,PASSWD);
}
catch (PDOException $e)
{
echo("Erreur connexion" . $e->getMessage() );
exit();
}
?>
