<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';


  $database = new Database();
  $db = $database->connect();


  $post = new Category($db);
$data = json_decode(file_get_contents("php://input"));// jab lina data 3la chkl file json
// die(var_dump($data->id));

// $post->id = $data->id;
// // die(var_dump($post->id ));
//   $post->title = $data->title;
//   $post->body = $data->body;
//   $post->author = $data->author;
//   $post->category_id = $data->category_id;

if ($post->update($data)){
    echo 'yup 2';
}else{
    echo 'no nooooo ';
}