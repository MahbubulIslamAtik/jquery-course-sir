<?php
  $db=new mysqli("localhost", "root", "", "ajaxcrud");

  class User{
    public $id;
    public $username;
    public $role_id;
    public $password;
    public $email;
    public $full_name;

    function __construct($_id, $_username, $_role_id, $_password, $_email, $_full_name){
      $this->id=$_id;
      $this->username=$_username;
      $this->role_id=$_role_id;
      $this->password=$_password;
      $this->email=$_email;
      $this->full_name=$full_name;
    }

    function save(){
      global $db;
      $db->query("insert into ajaxuser(username, role_id, password, email, full_name, created_at)values('$this->username', '$this->role_id', '$this->password', '$this->email', '$this->full_name', now())");
      return $db->insert_id;
    }

    static function delete($id){
      global $db;
      $db->query("delete from ajaxuser where id='$id'");
    }

    static function get_user($id){
      global $db;
      $results=$db->query("select username, role_id, password, email, full_name, created_at from ajaxuser where id='$id'");
      list($_id, $_username, $_role_id, $_password, $_email, $_full_name, $_created_at)=$results->fetch_row();
      $user=new User($_id, $_username, $_role_id, $_password, $_email, $_full_name, $_created_at);
      return $user;
    }

    static function update(){
      global $db;
      $db->query("update ajaxuser set Username='$this->username', Role='$this->role_id', Password='$this->password', Email='$this->email', Fullname='$this->full_name' where id='$this->id'");
    }

    static function manage_ajaxuser(){
      global $db;
      $result=$db->query("select u.id, u.username, r.name, u.password, u.email, u.full_name, u.created_at from ajaxuser u, ajaxrole r where r.id=u.role_id order by u.id");
      $html="<table class='table'>";
      $html.="<tr><th>SL</th><th>Username</th><th>Role Name</th><th>Password</th><th>Full Name</th><th>Created AT</th></tr>";
      while(list($_id, $_username, $_role_id, $_password, $_email, $_full_name, $_created_at)=$result->fetch_row()){
      $action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id, "type"=>"submit", "name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-user"]);
			$action_buttons.=action_button(["id"=>$id, "type"=>"submit", "name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-user"]);
			$action_buttons.="</div>";
        $html.="<tr>";
        $html.="<td>$_id</td>";
        $html.="<td>$_username</td>";
        $html.="<td>$_role_id</td>";
        $html.="<td>$_password</td>";
        $html.="<td>$_email</td>";
        $html.="<td>$_full_name</td>";
        $html.="<td>$_created_at</td>";
        $html.="</tr>";
      }
      $html.="</table>";
      return $html;
    }
  }
?>