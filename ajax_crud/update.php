<?php

require_once("user.class.php");

 if(isset($_POST["btnSubmit"])){
      $id=$_POST["txtId"];
      $username=$_POST["txtUsername"];
      $password=$_POST["txtPassword"];
      $email=$_POST["txtEmail"];
      $role_id=$_POST["cmbRole"];

      $full_name=$username;

      $user=new User($id,$username,$role_id,$password,$email,$full_name,date("Y-m-d H:i:s"));
      $user->update();
      echo "success";

 }
  
?>