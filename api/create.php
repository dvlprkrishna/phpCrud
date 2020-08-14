<?php
  require '../inc/cons.php';
 
  $author = isset($_REQUEST['author'])?$_REQUEST['author']:"";
  $title = isset($_REQUEST['title'])?$_REQUEST['title']:"";
  $content = isset($_REQUEST['content'])?$_REQUEST['content']:"";
  $email = isset($_REQUEST['email'])?$_REQUEST['email']:"";
   
 

  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Blog post could not be added';


  $query1 = "INSERT INTO `blog_data` (`author`,`title`,`content`,`email`,`is_Active`)
                    VALUES(:author,:title,:content,:email, '1')";
  $sql_1 = $conn->prepare($query1);

  $sql_1->bindParam(':author', $author);
  $sql_1->bindParam(':title', $title);
  $sql_1->bindParam(':content', $content);
  $sql_1->bindParam(':email', $email);
  $sql_1->execute();
  

   
    $response['success'] = true;
    $response['msg'] = 'Blog post added successfully'; 

  echo json_encode($response);
?>

        