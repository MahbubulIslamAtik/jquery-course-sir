<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="js/jquery-3.6.0.min.js"></script>
  <style>
    #data{padding: 10px; background-color: rgb(100, 91, 91); margin-bottom: 10px;}
    .box{width:100px; height:100px; box-shadow:0 0 1px 2px rgba(0,0,0,0.7); float: left; margin: 10px;}
    button{
      width: 100px;
      color: rgb(106, 11, 196);
      font-size: 20px;
      padding: 10px;
      margin-bottom: 10px;
      background-color: burlywood;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <button>Show</button>
  <div id="data" style="overflow: auto;"></div>
  <script>
    $(function(){
      let x=1;
      $("button").on("click", function(){
        $("#data").prepend("<div class='box'>"+x+"</div>");
        x++;
        });
    });
  </script>
</body>
</html>