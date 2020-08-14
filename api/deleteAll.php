<?php
  require '../inc/cons.php';
  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Blog posts could not be deleted';


  $query1 = "update `blog_data` SET is_Active = '2' WHERE is_Active = '1'";
  $sql_1 = $conn->prepare($query1);
  $sql_1->execute();
  

   
    $response['success'] = true;
    $response['msg'] = 'All blog post deleted successfully'; 

  echo json_encode($response);
?>

        