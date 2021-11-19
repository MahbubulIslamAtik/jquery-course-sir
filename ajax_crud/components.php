<?php
  function action_button($config){
    $config["url"]=isset($config["url"])?$config["url"]:"#";
    $config["class"]=isset($config["class"])?$config["class"]:"";

    $html="<div class='container'>";
    $html.="<form action='{$config["url"]}' method='post'>";
    $html.="<input type='hidden' name='txtId' value='{$config["id"]}'/>";
    $html.="<input type='{$config["type"]}' class='btn btn-{$config["class"]}' name='btn{$config["name"]}' value='{$config["value"]}'/>";
    $html.="</form>";
    $html.="</div>";

  }
?>