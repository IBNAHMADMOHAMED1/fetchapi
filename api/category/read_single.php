<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/category.php';

  $database = new Database();
  $db = $database->connect();

  $category= new category($db);


  $category->id=isset($_GET['id'])? $_GET['id']:die();

  $categorys = $category->read_single();
//   die(print_r($categorys));
  $category_arr =array(
      'id'=>$categorys['id'],
      'name'=>$categorys['name'],

  );

//   die(print_r($category_arr));
print_r(json_encode($category_arr));