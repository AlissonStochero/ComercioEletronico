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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <link rel="stylesheet" href="view/css/index.css">
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
