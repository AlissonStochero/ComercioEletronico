<?php
include 'config.php';
include 'db_conf.php';
include 'phpgrid-full-v2.1.1/lib/inc/jqgrid_dist.php';

if (isset($_GET['pag'])){
    header("Location:".$_GET['pag']."/".$_GET['pag'].".php") ; // onde 'pagina' é a variavel passada pela URL (GET)
}else{
    header("Location: home/home.php") ; //primeiro acesso, padrao 'home.php'
}

  ?>
