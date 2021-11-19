<?php
$db=new mysqli("localhost", "root", "", "test22");

class User{
  public $id;
  public $username;
  public $password;
  public $role_id;


  function __construct($_id, $_username, $_password, $_role_id){
    $this->id=$_id;
    $this->username=$_username;
    $this->password=$_password;
    $this->role_id=$_role_id;
  }

  function save(){
    global $db;
    $db->query("insert into users(username, password, role_id)values('$this->username', '$this->password', '$this->role_id')");
    return $db->insert_id;
  }

  static function getUsers(){
    global $db;

    $resutls=$db->query("select u.id, u.username, u.password, r.name role from users u, roles r where r.id=u.role_id");
    $html="<table class='table table-hover'>";
    $html.="<tr><th>ID</th><th>Username</th><th>Password</th><th>Role</th></tr>";
    while(list($id, $username, $password, $role_id)=$resutls->fetch_row()){
      $html.="<tr>";
      $html.="<td>$id</td>";
      $html.="<td>$username</td>";
      $html.="<td>$password</td>";
      $html.="<td>$role_id</td>";
      $html.="</tr>";
    }
    $html.="</table>";
    return $html;
  }
}


?>