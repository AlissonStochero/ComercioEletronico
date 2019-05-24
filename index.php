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
        <link href="view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link href="view/vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
  <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Iff 2019</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Sobre</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

  <script src="view/vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
