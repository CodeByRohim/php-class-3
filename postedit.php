<?php 
session_start();
// include "./inc/header.php";
require './inc/header.php';
require './database/env.php';
$id = $_REQUEST['id'];
$query = "SELECT * FROM posts WHERE id = '$id'";
$result = mysqli_query($conn, $query); //data tule ba fetch korar jonno
$post = mysqli_fetch_assoc($result);
if(empty($post)){
  header("Location: ./404.php");
}
?>
  
  <main>
    <div class="col-lg-5 mx-auto mt-5">
      <div class="card">
        <div class="card-header">Update Post</div>
          <div class="card-body">

            
             <form action="./controller/PostUpdateController.php" method="post">
                  <div class="form-group mb-3">
                    <input type="hidden" name="id" value="<?= $post['id']?>">
                    <input  value="<?=  $post['title'] ?? null ?>" name="title" type="text" class="form-control <?= getErrorClass('title_error') ?>" placeholder="Post">
                    <span class="text-danger"><?= $_REQUEST['errors']['title_error'] ?? null ?></span>
                  </div>

                  <div class="form-group mb-3">
                    <textarea name="detail" class="form-control <?=  getErrorClass('detail_error') ?>" id="" placeholder="Details Text"><?= $post['detail'] ?? null ?></textarea>
                    <span class="text-danger"><?= $_REQUEST['errors']['detail_error'] ?? null ?></span>
                  </div>

                  <div class="form-group mb-3">
                    <input value="<?= $post['author'] ?? null ?>" name="author" type="text" class="form-control <?=  getErrorClass('author_error') ?>" placeholder="Author">
                    <span class="text-danger"><?= $_REQUEST['errors']['author_error'] ?? null ?></span>
                  </div>

                  <div class="form-group mb-3">
                    <input value="<?= $post['phone'] ?? null ?>" name="phone" type="number" class="form-control <?=  getErrorClass('phone_error') ?>" placeholder="Phone">
                    <span class="text-danger"><?= $_REQUEST['errors']['phone_error'] ?? null ?></span>
                  </div>

                  <div class="form-group mb-3">
                    <input value="<?= $post['date'] ?? null ?>" name="date" type="date" class="form-control <?=  getErrorClass('date_error') ?>" placeholder="Date">
                    <span class="text-danger"><?= $_REQUEST['errors']['date_error'] ?? null ?></span>
                  </div>
                  
                  <button class="btn btn-primary mt-2">
                  Update Post
                  </button>
             </form>


             <a href="./post.php">All Posts Here</a>
          </div>
        </div>
      </div>
    </div>
  </main>
<?php 
// include "./inc/footer.php";
require "./inc/footer.php";

// session_unset();
session_destroy();
// session_unset($_SESSION);

?>