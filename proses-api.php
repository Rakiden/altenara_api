<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

define('DB_NAME','altenara');
define('DB_USER','root');
define('DB_PASSWORD','pestillo');
define('DB_HOST','localhost');

$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$postjson = json_decode(file_get_contents('php://input'),true);

if($postjson['aksi']=="cargarProductos"){
    $query = mysqli_query($mysqli, "SELECT * FROM ps_product_lang WHERE id_product = 1");


    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false, 'msg'=>mysql_error()));

    echo $result;
  }
?>
