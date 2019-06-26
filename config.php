<?php

// PHP Grid database connection settings, Only need to update these in new project
define("PHPGRID_DBTYPE","mysql"); // mysql,oci8(for oracle),mssql,postgres,sybase
// servidor local- utilizado para descartar problema de banco-by Gerson
// define("PHPGRID_DBHOST", "localhost");
// define("PHPGRID_DBUSER", "root");
// define("PHPGRID_DBPASS", "");
// define("PHPGRID_DBNAME", "comercioeletronico");
// servidor remoto
define("PHPGRID_DBHOST","108.179.193.103");
define("PHPGRID_DBUSER","redeb061_ce");
define("PHPGRID_DBPASS","ze0}5*oq_o{q");
define("PHPGRID_DBNAME","redeb061_comercio");

// Basepath for lib
define("PHPGRID_LIBPATH",dirname(__FILE__).DIRECTORY_SEPARATOR."lib".DIRECTORY_SEPARATOR);
