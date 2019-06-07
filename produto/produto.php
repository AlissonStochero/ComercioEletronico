<?php
include '../config.php';
include '../db_conf.php';
include '../phpgrid-full-v2.1.1/lib/inc/jqgrid_dist.php';

$g = new jqgrid($db_conf);

// set few params
$grid["caption"] = "Produtos Cadastrados";
$grid["rowNum"] = "10";
$grid["height"] = "";
$g->set_options($grid);

// set database table for CRUD operations
$g->table = "produto";

$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "id_produto";
$col["width"] = "10";
$cols[] = $col;

// temporary column for column placeholder comparison in formatting
$col = array();
$col["title"] = "Descrição"; // caption of column
$col["name"] = "descr_produto";
$col["width"] = "15";
$col["editable"] = true;
$cols[] = $col;

$col = array();
$col["title"] = "Categoria";
$col["name"] = "id_categoria";
$col["dbname"] = "produto.id_categoria"; // this is required as we need to search in name field, not id
$col["width"] = "100";
$col["align"] = "left";
$col["search"] = true;
$col["editable"] = true;
$col["edittype"] = "select"; // render as select
# fetch data from database, with alias k for key, v for value
$str = $g->get_dropdown_values("select id_categoria as k, descr_categoria as v from categoria_produto");
$col["editoptions"] = array("value"=>":;".$str);
$col["formatter"] = "select"; // display label, not value
$cols[] = $col;

//pass the cooked columns to grid
$g->set_columns($cols);
$g->select_command = "select produto.*, categoria_produto.descr_categoria from produto left JOIN categoria_produto on (produto.id_categoria = categoria_produto.id_categoria) ";

// generate grid output, with unique grid name as 'list1'
$out = $g->render("list1");
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" media="screen" href="../phpgrid-full-v2.1.1/lib/js/themes/redmond/jquery-ui.custom.css"></link>
    <link rel="stylesheet" type="text/css" media="screen" href="../phpgrid-full-v2.1.1/lib/js/jqgrid/css/ui.jqgrid.css"></link>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/index.css"></link>

    <script src="../phpgrid-full-v2.1.1/lib/js/jquery.min.js" type="text/javascript"></script>
    <script src="../phpgrid-full-v2.1.1/lib/js/jqgrid/js/i18n/grid.locale-pt-br.js" type="text/javascript"></script>
    <script src="../phpgrid-full-v2.1.1/lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="../phpgrid-full-v2.1.1/lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
</head>
<body>
     <?php
     include '../menu.php';
    ?>

    <style>
    /* alternate row color */
    .myAltRowClass { background-color: #F1F1F1 !important; background-image: none !important; }

    /* first row color */
    .ui-jqgrid tr.jqgroup, .ui-jqgrid tr.jqgrow { background-color: inherit; background-image:none; }
    </style>
<div>
    <h1>
    Aqui é o produto
    </h1>

<?php
    if (isset($_GET['pag'])){
    header("Location:".$_GET['pag']."/".$_GET['pag'].".php") ; // onde 'pagina' é a variavel passada pela URL (GET)
}
    
    echo $out;
?>

</div>
</body>
</html>