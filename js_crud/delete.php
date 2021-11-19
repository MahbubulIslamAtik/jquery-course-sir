<?php
  $db = new mysqli("localhost", "root", "", "test17");

  $id=$_POST["txtId"];
  $db->query("delete from child where id='$id'");
  echo "Success Deleted";
?>