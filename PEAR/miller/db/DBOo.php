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
/*LOCAL/
$serverdb_link = "172.16.227.18";
$username_link = "movis25_nueusr";
$password_link = "3.l1HM7sS|wP";
$database_link = "movis25_minisitiodb";
/**/
/*LOCAL*/
$serverdb_link = "localhost";
$username_link = "root";
$password_link = "1nt3r4ct1v3";
$database_link = "test";
/**/

//$dsn = "mysql://$username_link:$password_link@$serverdb_link/$database_link";

/*$db = DB::connect($dsn);

echo $db;
 die();*/

$optionsDataObject = &PEAR::getStaticProperty('DB_DataObject','options');
$optionsDataObject = array(
'debug'            => 5, // Permite detallar las consultas que ejecuta, tiene hasta 3 niveles de detalle
'database'         => "mysql://$username_link:$password_link@$serverdb_link/$database_link", // Configura la base de datos
'schema_location'  => 'C:\AppServ\www\forostelefonica\db',
'class_location'   => 'C:\AppServ\www\forostelefonica\db',
'require_prefix'   => 'db/',
//'db_driver' => 'MDB2',
'class_prefix'     => 'DataObject_',
'generator_no_ini' => true);
?>