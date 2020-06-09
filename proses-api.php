<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

define('DB_NAME','Altenara');
define('DB_USER','root');
define('DB_PASSWORD','pestillo');
define('DB_HOST','localhost');

$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$dbname = DB_NAME;
$dbuser = DB_USER;
$dbpassword = DB_PASSWORD;
$dbhost = DB_HOST;
echo ($dbname + " " + $dbuser + " " + $dbhost + " " + $dbpassword);

?>
