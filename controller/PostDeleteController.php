
<?php

$id = $_REQUEST['id'];
$query = "DELETE FROM posts WHERE id = '$id'";
include "../database/env.php";
$res = mysqli_query($conn, $query);

if($res){
  header("Location:../post.php");
};