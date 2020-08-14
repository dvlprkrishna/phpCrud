<?php
  require '../inc/cons.php';
  
  $id = isset($_REQUEST['id'])?$_REQUEST['id']:"";
 

  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Blog post could not be deleted';


  $query1 = "update `blog_data` SET is_Active = '2' WHERE id = :id";
  $sql_1 = $conn->prepare($query1);
  $sql_1->bindParam(':id', $id); 
  $sql_1->execute();
  

   
    $response['success'] = true;
    $response['msg'] = 'Blog post deleted successfully'; 

  echo json_encode($response);
?>

        