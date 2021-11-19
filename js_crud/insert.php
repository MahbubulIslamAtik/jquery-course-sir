<?php
  if(isset($_POST["btnSubmit"])){
    $name=$_POST["txtName"];
    $age=$_POST["txtAge"];
  }
  $db=new mysqli("localhost", "root", "", "test17");

  $db->query("insert into child(name, age)values('$name', '$age')");
  echo "Your data is successfully inserted!";
?>