<?php
  require_once("user.class.php");
  if(isset($_POST["btnSubmit"])){
    $username=$_POST["txtUsername"];
    $password=$_POST["txtPassword"];
    $email=$_POST["txtEmail"];
    $role_id=$_POST["cmbRole"];

    $full_name=$username;

    $user=new User("", $username, $role_id, $password, $email, $full_name, date("Y-m-d H:i:s"));
    $id=$user->save();
    echo $id;
  }
?>