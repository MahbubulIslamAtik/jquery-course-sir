<?php
  require_once("user.class.php");

  if($_POST["cmd"]=="save"){
    $username=$_POST["txtUsername"];
    $password=$_POST["txtPassword"];
    $role_id=$_POST["cmbRole"];
    $user=new User("", " $username", "$password", "$role_id");
    
    $user->save();
    echo "Successfully saved";

  }

  if($_POST["cmd"]=="view"){
    echo User::getUsers();
  }
?>