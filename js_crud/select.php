<style>
  table, th, tr, td{
    border: 1px solid black;
    border-collapse: collapse;
    padding:8px;
    margin-top: 29px;
  }
</style>
<?php
  $db=new mysqli("localhost", "root", "", "test17");
  $result=$db->query("select id, name, age from child");

  $html="<table>";
  $html.="<tr><th><b>ID</b></th><th><b>Name</b></th><th><b>Age</b></th><th><b>Action</b></th></tr>";
  while(list($id, $name, $age)=$result->fetch_row()){
    $html.="<tr>";
    $html.="<td>$id</td>";
    $html.="<td>$name</td>";
    $html.="<td>$age</td>";
    $html.="<td>";
    $html.="<button data-id='$id' class='edit'>Edit</button>";
    $html.="<button data-id='$id' class='delete'>Delete</button>";
    $html.="</td>";
    $html.="</tr>";
  }
  $html.="</table>";
  echo $html;
  
?>