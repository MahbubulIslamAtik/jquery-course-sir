<?php
  $db=new mysqli("localhost", "root", "", "test17");

  $id=$_GET["txtId"];
  $result=$db->query("select id, name, age from child where id='$id'");
  list($id, $name, $age)=$result->fetch_row();

  $data=["id"=>$id, "name"=>$name, "age"=>$age];
  echo json_encode($data);
?>