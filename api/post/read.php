<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';


  $database = new Database();
  $db = $database->connect();


  $post = new Post($db);


  $result = $post->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

     
     

      $post_item = array(
        'id' => $id,
        'title' => $title,
        'body' => $body,
        'author' => $author,
        'category_id' => $category_id,
        'category_name' => $category_name
      );

      // Push to "data"
      array_push($posts_arr, $post_item);
    
    }

    
    echo json_encode($posts_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
}