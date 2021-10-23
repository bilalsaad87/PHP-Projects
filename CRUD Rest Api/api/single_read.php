<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/books.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Book($db);

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSingleBook();

    if($item->title != null){
        // create array
        $emp_arr = array(
            "id" =>  $item->id,
            "title" => $item->title,
            "author" => $item->author,
            "desc" => $item->desc,
            "year" => $item->year,
            "created" => $item->created
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Book not found.");
    }
?>