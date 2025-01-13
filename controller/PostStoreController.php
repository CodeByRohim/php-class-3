<?php 
session_start();
$title = ($_REQUEST['title']);
$detail = ($_REQUEST['detail']);
$author = ($_REQUEST['author']);
$errors =[];


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


//* IF ERRORS OCCRED
if(count($errors) > 0){
  // redirection
  $_SESSION['errors'] = $errors;
  header("Location:../index.php");
} else{
// store

}

