<?php
   
   $db=new mysqli("localhost","root","","ajaxcrud");
  
   $result=$db->query("select u.id,u.username,u.email,u.password,u.role_id,r.name from ajaxuser u, ajaxrole r where r.id=u.role_id");
   while(list($id,$username,$email,$password,$role_id,$role)=$result->fetch_row()){
      echo $id," | ",$username," | ",$role," <input type='button' data-id='$id' class='del' value='Delete' /><input type='button' data-id='$id' data-username='$username' data-email='$email' data-password='$password' data-role_id='$role_id' class='edit' value='Edit' /><br>";
   }
?>