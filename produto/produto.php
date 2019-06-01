<?php

$g = new jqgrid($db_conf);

// set few params
$grid["caption"] = "Grid Exemplo - Relação 1xN";
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
<style>
    .gerson{
        background: silver;
    }
</style>
<div class="gerson">
    <h1>
    aqui é o produto
    </h1>
    <?php
            // echo $out

    ?>

</div>
