<!DOCTYPE html>
<!--
Code by Gerson Dias
-->
<?php
require 'vendor/autoload.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="view/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="view/css/index.css" rel="stylesheet">
    </head>
    <body>

  <?php
  include 'menu.php';

  if (Tools::getValue('pag')){
    $tpl = Tools::getValue('pag');
      require "view/".$tpl.".php"; // onde 'pagina' é a variavel passada pela URL (GET)
  }else{
    require 'view/home.php'; //primeiro acesso, padrao 'home.php'
  }
  ?>

    </body>
</html>
