<?php
// include db config
include_once("config.php");
// include and create object
include("phpgrid-full-v2.1.1/lib/inc/jqgrid_dist.php");
include './db_conf.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
    <link rel="stylesheet" type="text/css" media="screen" href="phpgrid-full-v2.1.1/lib/js/themes/redmond/jquery-ui.custom.css"></link>
    <link rel="stylesheet" type="text/css" media="screen" href="phpgrid-full-v2.1.1/lib/js/jqgrid/css/ui.jqgrid.css"></link>
    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css"></link>

    <script src="phpgrid-full-v2.1.1/lib/js/jquery.min.js" type="text/javascript"></script>
    <script src="phpgrid-full-v2.1.1/lib/js/jqgrid/js/i18n/grid.locale-pt-br.js" type="text/javascript"></script>
    <script src="phpgrid-full-v2.1.1/lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="phpgrid-full-v2.1.1/lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
</head>
<body>

    <?php
     require './menu.php';
    ?>


    <style>
    /* alternate row color */
    .myAltRowClass { background-color: #F1F1F1 !important; background-image: none !important; }

    /* first row color */
    .ui-jqgrid tr.jqgroup, .ui-jqgrid tr.jqgrow { background-color: inherit; background-image:none; }
    </style>

    <div style="margin:10px">

    <?php

    if (isset($_GET['pag'])){
        require $_GET['pag'].'/'.$_GET['pag'].".php"; // onde 'pagina' é a variavel passada pela URL (GET)
  }else{
        require 'home.php'; //primeiro acesso, padrao 'home.php'
  }
    ?>

    </div>

</body>
</html>
