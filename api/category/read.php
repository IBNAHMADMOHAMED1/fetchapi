<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods:POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';

  $connect = new Database();
  $db=$connect->connect();


  $category = new Category($db);

  $res = $category->read();
  $num = $res->rowCount();

  if ($num <=0){
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }
  $category_arr =array();

  while($row = $res->fetch(PDO::FETCH_ASSOC)){
    extract($row);
  
    $category_item = array(
      'id'=>$id,
      'name'=>$name,
      'created_at'=>$created_at
  
    );
array_push($category_arr,$category_item);


  }
  // die(print_r($category_arr));

  echo json_encode($category_arr);

  


  

