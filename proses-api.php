<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

define('DB_NAME','altenara_bbdd');
define('DB_USER','altenara_user');
define('DB_PASSWORD','Y966T2Mz4Q)K');
define('DB_HOST','befresh3.hospedados.net');

$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$postjson = json_decode(file_get_contents('php://input'),true);

/*if($postjson['mode']=="cargarProductos"){
  
  $query = mysqli_query($mysqli, "SELECT * FROM ps_product_lang WHERE id_product =1");
  $data = array();

  while($row=mysqli_fetch_array($query)){
    array_push($data,$row);
  }

  if($query) $result = json_encode(array('success'=>true, 'products'=>$data));
  else $result = json_encode(array('success'=>false, 'msg'=>"Error, intentelo de nuevo"));

  echo $result;
}*/

?>
