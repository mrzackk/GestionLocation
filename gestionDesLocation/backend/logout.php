<?php
session_start();
if(session_destroy())
  header('Location:login.php');
else
  echo "<b style='color:red;'><i>The session could not be terminated.</i></b>";
?>
