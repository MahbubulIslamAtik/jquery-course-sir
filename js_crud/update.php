<?php
  $db=new mysqli("localhost", "root", "", "test17");

  if(isset($_POST["btnSubmit"])){
    $id=$_POST["txtId"];
    $name=$_POST["txtName"];
    $age=$_POST["txtAge"];
  }

  $db->query("update child set name='$name', age='$age' where id='$id'");
  
  echo "Successfully Updated";
?>