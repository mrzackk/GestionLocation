<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
require_once("bdconnexion.php");
//$db_handle = new DBController();


$query ="SELECT DISTINCT(num),idM FROM  modele  WHERE idmarque = '" . $_POST["idmarque"] . "' GROUP BY num ";
	$results = $connexion->query($query);
?>
	<option value="">Select Modele</option>
<?php
	while($rs=$results->fetch(PDO::FETCH_ASSOC)){
?>
	<option value="<?php echo $rs["idM"]; ?>"><?php echo $rs["num"]; ?></option>
<?php

}
?>
</body>
</html>
