<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


  
  include_once '../../config/Database.php';
  include_once '../../models/Category.php';

  

  $database = new Database();
  $db = $database->connect();

  $category = new Category($db);

  $data = json_decode(file_get_contents("php://input"));

//   die(print_r($data->name));

$category->name = $data->name;
if($category->create()){

    echo 'yup';
}