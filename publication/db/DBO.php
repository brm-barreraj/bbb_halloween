<?php
/*
* Create a Database object
*/
if (!defined('PATH_SEPARATOR')) {
    if (defined('DIRECTORY_SEPARATOR') && DIRECTORY_SEPARATOR == "\\") {
        define('PATH_SEPARATOR', ';');
    } else {
        define('PATH_SEPARATOR', ':');
    }
}

$include_path = ini_get("include_path");
@ini_set("include_path", $include_path . PATH_SEPARATOR . $_SERVER["DOCUMENT_ROOT"]."/PEAR");
//echo $include_path;

require_once("DB.php");
require_once("DB/DataObject.php");

/*LOCAL*/
//
$username_link = "julian10404";
$password_link = "";
$database_link = "bbb_halloween";
$serverdb_link = "127.0.0.1";
/**/

$optionsDataObject = &PEAR::getStaticProperty('DB_DataObject','options');
$optionsDataObject = array(
'debug'			   => 0, // Permite detallar las consultas que ejecuta, tiene hasta 3 niveles de detalle
'database'         => "mysql://$username_link:$password_link@$serverdb_link/$database_link", // Configura la base de datos
'schema_location'  => '/home/ubuntu/workspace/publication/db/',
'class_location'   => '/home/ubuntu/workspace/publication/db/',
'require_prefix'   => 'db/',
//'db_driver'		=> 'MDB2',
'class_prefix'     => 'DataObject_',
'generator_no_ini' => true);
?>