<?php
 require_once("user.class.php");

 $id=$_POST["txtId"];
 User::delete($id);
 echo "Success";
?>