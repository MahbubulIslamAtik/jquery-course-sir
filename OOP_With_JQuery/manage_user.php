<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="../js/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div id="smg"></div>

  <form name="f">
    Role <br/>
    <select name="cmbRole" id="id"></select>
    <div>
      Username: <br>
      <input type="text" name="txtUsername" id="txtUsername">
    </div>
    <div>
      Password: <br>
      <input type="password" name="txtPassword" id="txtPassword">
    </div>

    <div>
      <input type="button" name="btnSubmit" id="btnSubmit" value="Submit">
    </div>
  </form>

<script>
  $(function(){
  



    function loadUser(){
      $.ajax({
        url:'user_api',
        data:{"cmd":"view"},
        type:'POST',
        success:function(res){
          $("#table").html(res);
        }
      });
    }
  });
</script>
</body>
</html>

