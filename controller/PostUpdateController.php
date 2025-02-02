<?php 
session_start();
$title = ($_REQUEST['title']);
$detail = ($_REQUEST['detail']);
$author = ($_REQUEST['author']);
$phone = ($_REQUEST['phone']);
$date = ($_REQUEST['date']);
$id = ($_REQUEST['id']);
$todaysDate = new DateTime();
$selecteDate = new DateTime($date);
$errors = [];


// TITLE VALIDATION
if(empty($title)){
  $errors['title_error'] = "Please enter a title";
} else if(strlen ($title) < 3){
  $errors['title_error'] = "Title should be more than 3 characters";
}

// DEATAIL VALIDATION
if(empty($detail)){
 $errors['detail_error'] ="Please enter the details";
} else if(strlen ($detail)  < 10 || strlen($detail) > 200){
  $errors['detail_error'] = "Details should be more than 10 characters and less than 200 characters";
}

// AUTHOR VALIDATION
if(empty($author)){
  $errors['author_error'] = "Please enter the author name";
} else if(strlen ($author) < 3){
  $errors['author_error'] = "Author should be more than 3 characters";
}

// PHONE VALIDATION
if(!empty($_REQUEST['phone'])){
  if(strlen ($phone) != 11){
    $errors['phone_error'] = "Please enter a valid phone number";
  }
}

// DATE VALIDATION
if($todaysDate >= $selecteDate){
  $errors['date_error'] = "Please select a future date and time";
}

//* IF ERRORS OCCRED
if(count($errors) > 0){
  // redirection
  $_SESSION['old'] = $_REQUEST;
  $_SESSION['errors'] = $errors;
  header("Location:../postedit.php?id=$id");
} else{
  // Update
  require "../database/env.php";
 $query = "UPDATE posts SET title='$title',detail='$detail',author='$author',phone='$phone',date='$date' WHERE id = '$id'";
 $result = mysqli_query($conn, $query);
if($result){
  header("Location: ../post.php");
}
}