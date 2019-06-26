
<html>
<head>
    <link rel="stylesheet" type="text/css" media="screen" href="../phpgrid-full-v2.1.1/lib/js/themes/redmond/jquery-ui.custom.css"></link>
    <link rel="stylesheet" type="text/css" media="screen" href="../phpgrid-full-v2.1.1/lib/js/jqgrid/css/ui.jqgrid.css"></link>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/index.css"></link>
    <link href="css/freelancer.min.css" rel="stylesheet" type="text/css"/>

    <script src="../phpgrid-full-v2.1.1/lib/js/jquery.min.js" type="text/javascript"></script>
    <script src="../phpgrid-full-v2.1.1/lib/js/jqgrid/js/i18n/grid.locale-pt-br.js" type="text/javascript"></script>
    <script src="../phpgrid-full-v2.1.1/lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="../phpgrid-full-v2.1.1/lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
    
</head>
<body>

     <?php
     include '../menu.php';
    ?>

<div>
    <h1>
    Aqui é a home
    </h1>

    <?php
    if (isset($_GET['pag'])){
        header("Location:".$_GET['pag']."/".$_GET['pag'].".php") ; // onde 'pagina' é a variavel passada pela URL (GET)
    }
    ?>


</div>
</body>
</html>
