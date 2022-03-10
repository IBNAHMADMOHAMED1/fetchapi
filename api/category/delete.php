<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Category($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $id = $data->id;
//   die(var_dump($post->id));

  // Delete post
  if ($post->delete($id)){
    echo 'yup 2';
}else{
    echo 'no nooooo ';

}