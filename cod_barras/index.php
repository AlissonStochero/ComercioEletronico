<?php


// include db config
include_once("../config.php");

// include and create object
include("../phpgrid-full-v2.1.1/lib/inc/jqgrid_dist.php");

// Database config file to be passed in phpgrid constructor

$db_conf = array(     
                    "type"         => PHPGRID_DBTYPE, 
                    "server"       => PHPGRID_DBHOST,
                    "user"         => PHPGRID_DBUSER,
                    "password"     => PHPGRID_DBPASS,
                    "database"     => PHPGRID_DBNAME
                );

$g = new jqgrid($db_conf);

// set few params
$grid["caption"] = "Grid Exemplo - Relação 1xN";
$grid["rowNum"] = "10";
$grid["height"] = "";
$g->set_options($grid);

// set database table for CRUD operations
$g->table = "cod_barras"; 

$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "id_cod_barras"; 
$col["width"] = "10";
$cols[] = $col;        

// temporary column for column placeholder comparison in formatting
$col = array();
$col["title"] = "cod_barras_proprio"; // caption of column
$col["name"] = "cod_barras_proprio"; 
$col["width"] = "15";
$col["editable"] = true;
$cols[] = $col; 

$col = array();
$col["title"] = "cod_barras_fabricante"; // caption of column
$col["name"] = "cod_barras_fabricante"; 
$col["width"] = "15";
$col["editable"] = true;
$cols[] = $col; 

$col = array();
$col["title"] = "produtos";
$col["name"] = "id_produtos";
$col["dbname"] = "produto.id_categoria"; // this is required as we need to search in name field, not id
$col["width"] = "100";
$col["align"] = "left";
$col["search"] = true;
$col["editable"] = true;
$col["edittype"] = "select"; // render as select
# fetch data from database, with alias k for key, v for value
$str = $g->get_dropdown_values("select id_produto as k, descr_produto as v from produto");
$col["editoptions"] = array("value"=>":;".$str); 
$col["formatter"] = "select"; // display label, not value
$cols[] = $col;





//pass the cooked columns to grid
$g->set_columns($cols); 



$g->select_command = "select produto.*, categoria_produto.descr_categoria from produto left JOIN categoria_produto on (produto.id_categoria = categoria_produto.id_categoria) ";





// generate grid output, with unique grid name as 'list1'
$out = $g->render("list1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
    <link rel="stylesheet" type="text/css" media="screen" href="phpgrid-full-v2.1.1/lib/js/themes/redmond/jquery-ui.custom.css"></link>    
    <link rel="stylesheet" type="text/css" media="screen" href="phpgrid-full-v2.1.1/lib/js/jqgrid/css/ui.jqgrid.css"></link>    
    
    <script src="phpgrid-full-v2.1.1/lib/js/jquery.min.js" type="text/javascript"></script>
    <script src="phpgrid-full-v2.1.1/lib/js/jqgrid/js/i18n/grid.locale-pt-br.js" type="text/javascript"></script>
    <script src="phpgrid-full-v2.1.1/lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>    
    <script src="phpgrid-full-v2.1.1/lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
</head>
<body>
    <style>
    /* alternate row color */
    .myAltRowClass { background-color: #F1F1F1 !important; background-image: none !important; }

    /* first row color */
    .ui-jqgrid tr.jqgroup, .ui-jqgrid tr.jqgrow { background-color: inherit; background-image:none; }
    </style>
    <div style="margin:10px">
    <?php echo $out?>
    </div>
</body>
</html> 