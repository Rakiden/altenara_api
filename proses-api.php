<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

//include "https://serverapiprueba.herokuapp.com/config/config.php";

define('DB_NAME','altenaradad');
define('DB_USER','root');
define('DB_PASSWORD','pestillo');
define('DB_HOST','localhost');

$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$postjson = json_decode(file_get_contents('php://input'),true);

if($postjson['aksi']=="cargarProductos"){
    $query = mysqli_query($mysqli, "SELECT * FROM ps_product_lang LIMIT 1");

    if($query) $result = json_encode(array('success'=>$query));
    else $result = json_encode(array('success'=>false, 'msg'=>$check));

    echo $result;
  }
?>