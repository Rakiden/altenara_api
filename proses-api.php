<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=utf-8");

define('DB_NAME','altenara_bbdd');
define('DB_USER','altenara_user');
define('DB_PASSWORD','Y966T2Mz4Q)K');
define('DB_HOST','befresh3.hospedados.net');

$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$mysqli->set_charset("utf8");
$postjson = json_decode(file_get_contents('php://input'),true);

//echo json_encode(array('success'=>false, 'msg'=>"Error, intentelo de nuevo"));

if($postjson['mode']=="cargarProductos"){
  
  $query = mysqli_query($mysqli, "SELECT id_product, meta_title FROM ps_product_lang");
  $data = array();

  while($row=mysqli_fetch_array($query)){
    array_push($data,$row);
  }

  if($query) $result = json_encode(array('success'=>true, 'products'=>$data));
  else $result = json_encode(array('success'=>false, 'msg'=>"Error, intentelo de nuevo"));

  echo $result;
}elseif($postjson['mode']=="cargarPrecios"){
  
  $query = mysqli_query($mysqli, "SELECT CAST(price AS DECIMAL(10,2)) FROM ps_product");
  $data = array();

  while($row=mysqli_fetch_array($query)){
    array_push($data,$row);
  }

  if($query) $result = json_encode(array('success'=>true, 'prices'=>$data));
  else $result = json_encode(array('success'=>false, 'msg'=>"Error, intentelo de nuevo"));

  echo $result;
}elseif($postjson['mode']=="cargarProducto"){
  
  $query1 = mysqli_query($mysqli, "SELECT id_product, meta_title, meta_description FROM ps_product_lang WHERE id_product='$postjson[id]'");
  $query2 = mysqli_query($mysqli, "SELECT CAST(price AS DECIMAL(10,2)) FROM ps_product WHERE id_product='$postjson[id]'");

  if($query1){
    $data1 = mysqli_fetch_array($query1);
    $product = array(
        'id_product' =>$data1['id_product'], 
        'meta_title' =>$data1['meta_title'],
        'meta_description' =>$data1['meta_description']
    );

    $data2 = mysqli_fetch_array($query2);
    $price = array(
        'price' =>$data2[0]
    );

  $result = json_encode(array('success'=>true, 'product'=>$product, 'price'=>$price));
  }else{
    $result = json_encode(array('success'=>false, 'msg'=>"Error, intentelo de nuevo"));
  }

  echo $result;
}

?>
