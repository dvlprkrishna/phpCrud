<?php
  require '../inc/cons.php';

  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Blog post could not be fetched';

  $query1 = "SELECT id,author,title,content,email FROM `blog_data` WHERE is_Active = '1' ";
  $sql_1 = $conn->prepare($query1);
  $sql_1->execute();
  $sql_1->setFetchMode(PDO::FETCH_ASSOC);
  $count = $sql_1->rowCount();

  if ($count > 0) {    
    foreach ($sql_1 as $row){
        $response['data'][] = $row;
    }
    $response['success'] = true;
    $response['msg'] = 'Blog post fetched';
  } else {
    $response['success'] = false;
    $response['msg'] = 'No blog post found';
  } 

  echo json_encode($response);
?>

        