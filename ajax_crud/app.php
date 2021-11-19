<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
</head>
<body>
  <div id="success"></div>
  <form action="#" autocomplete="off">
    <input type="hidden" name="" id="txtId">
    <div>
      Role<br>
      <select name="" id="cmbRole">
        <option value="1">Admin</option>
        <option value="2">Editor</option>
        <option value="3">User</option>
      </select>
    </div>
    <div>
      Username<br>
      <input type="text" name="" id="txtUsername">
    </div>
    <div>
      Email<br>
      <input type="text" name="" id="txtEmail">
    </div>
    <div>
      Password<br>
      <input type="password" name="" id="txtPassword">
    </div>
    <div>
      <button type="button" id="btnSubmit">Save</button>
      <button type="button" id="btnClear">Clear</button>
    </div>
  </form>
  <div id="users"></div>

  <script>
    

    $(function(){
      loadUser();//select

      //Delete Event
      $("body").on("click", ".del", function(){
        let id=$(this).data("id");
        $.ajax({
          url:'delete.php',
          type:'post',
          data:{'txtId':id},
          success:function(res){
            $("#succsess").html(res);
            loadUser();
          }
        });
      });

      //Edit Event
      $("body").on("click", ".edit", function(){
        let id=$(this).data("id");
        let username=$(this).data("username");
        let email=$(this).data("email");
        let password=$(this).data("password");
        let role_id=$(this).data("role_id");

        $("#txtId").val(id);
        $("#cmbRole").val(role_id);
        $("#txtUsername").val(username);
        $("#txtEmail").val(email);
        $("#txtPassword").val(password);
        $("#btnSubmit").text("Update");
      });

      //Save and Update Event
      $("#btnSubmit").on("click", function(){
        let id=$("#txtId").val();
        let role_id=$("#cmbRole").val();
        let username=$("#txtUsername").val();
        let email=$("#txtEmail").val();
        let password=$("#txtPassword").val();

        // ajax call
        if($("#btnSubmit").text()=="Save"){
          $.ajax({
            url:'insert.php',
            type:'post',
            data:{'txtUsername':username, 'cmbRole':role_id, 'txtEmail':email, 'txtPassword':password, 'btnSubmit':'Submit'},
            success:function(res){
              if(res>0){
                $("#success").html("Successfully Save");

                clearForm();
                loadUser();
              }
            }
          });
        }

        if($("#btnSubmit").text()=="Update"){
          $.ajax({
            url:'update.php',
            type:'post',
            data:{'txtId':id, 'txtUsername':username, 'cmbRole':role_id, 'txtEmial':email, 'txtPassword':password, 'btnSubmit':'Submit'},
            success:function(res){
              $("#success").html(res);
              $("#btnSubmit").text("Save");
              clearFrom();
              loadUser();
            }
          });

          $("#btnClear").on("click", function(){
            clearForm();
            $("#btnSubmit").text("Save");
          });
        }
      });


      function clearForm(){
      $("#txtId").val(1);
      $("#txtId").val("");
      $("#txtUsername").val("");
      $("txtEmail").val("");
      $("txtPassword").val("");
    }
    //--------------------------//
    function loadUser(){
      $.ajax({
        url:'select.php',
        type:'post',
        data:{},
        success:function(res){
          $("#users").html(res);
        }
      });
    }
    });
  </script>
</body>
</html>