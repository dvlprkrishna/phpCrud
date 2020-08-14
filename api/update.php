<?php
  require '../inc/cons.php';
  
  $id = isset($_REQUEST['id'])?$_REQUEST['id']:"";
  $author = isset($_REQUEST['author'])?$_REQUEST['author']:"";
  $title = isset($_REQUEST['title'])?$_REQUEST['title']:"";
  $content = isset($_REQUEST['content'])?$_REQUEST['content']:"";
  $email = isset($_REQUEST['email'])?$_REQUEST['email']:"";
 

  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Data could not be Added';


  $query1 = "UPDATE `blog_data` SET author=:author, title=:title, content=:content, email=:email WHERE id=:id AND is_Active = '1'";
  $sql_1 = $conn->prepare($query1);
  $sql_1->bindParam(':author', $author); 
  $sql_1->bindParam(':content', $content); 
  $sql_1->bindParam(':email', $email); 
  $sql_1->bindParam(':title', $title); 
  $sql_1->bindParam(':id', $id); 
  $sql_1->execute(); 
     
      $response['success'] = true;
      $response['msg'] = 'Data Updated Successfully'; 
     

  echo json_encode($response);
?>

        