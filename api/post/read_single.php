<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';


  $database = new Database();
  $db = $database->connect();


  $post = new Post($db);

  $post->id=isset($_GET['id']) ? $_GET['id']:die();
// $id = $_GET['id'];

 $posts= $post->singlePost();
//   die(var_dump($posts));
  $post_arr = array(
      'id' => $posts['id'],
      'title' => $posts['title'],
      'body' => $posts['body'],
      'author' => $posts['author'],
      'category_id' => $posts['category_id'],
      'category_name' => $posts['category_name']
      
      
  );
  

  
  print_r(json_encode($post_arr));

  ?>