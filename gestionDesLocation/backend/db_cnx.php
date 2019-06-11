<?php
define('USER',"root");
define('PASSWD',"");
define('SERVER',"localhost");
define('BASE',"projet");
Function connect_bd(){
$strConnection ="mysql:dbname=".BASE.";host=".SERVER;
try{
 $connexion=new PDO($strConnection,USER,PASSWD);
 $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOException $e){
 $connexion=null;
 $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
echo $msg;
 exit() ;
}
return $connexion;
}

?>
