
<?php 
session_start();
// include "./inc/header.php";
require './inc/header.php';


?>
  
  <main>
    <div class="col-lg-5 mx-auto mt-5">
      <div class="card">
        <div class="card-header">Write a Post</div>
          <div class="card-body">

            
             <form action="./controller/PostStoreController.php" method="post">
                  <div class="form-group mb-3">
                  <!-- <input type="hidden" name="id" id="id"> -->
                    <input  value="<?=  $_SESSION['old']['title'] ?? null ?>" name="title" type="text" class="form-control <?= getErrorClass('title_error') ?>" placeholder="Post">
                    <span class="text-danger"><?= $_SESSION['errors']['title_error'] ?? null ?></span>
                  </div>

                  <div class="form-group mb-3">
                    <textarea name="detail" class="form-control <?=  getErrorClass('detail_error') ?>" id="" placeholder="Details Text"><?= $_SESSION['old']['detail'] ?? null ?></textarea>
                    <span class="text-danger"><?= $_SESSION['errors']['detail_error'] ?? null ?></span>
                  </div>

                  <div class="form-group mb-3">
                    <input value="<?= $_SESSION['old']['author'] ?? null ?>" name="author" type="text" class="form-control <?=  getErrorClass('author_error') ?>" placeholder="Author">
                    <span class="text-danger"><?= $_SESSION['errors']['author_error'] ?? null ?></span>
                  </div>

                  <div class="form-group mb-3">
                    <input value="<?= $_SESSION['old']['phone'] ?? null ?>" name="phone" type="number" class="form-control <?=  getErrorClass('phone_error') ?>" placeholder="Phone">
                    <span class="text-danger"><?= $_SESSION['errors']['phone_error'] ?? null ?></span>
                  </div>

                  <div class="form-group mb-3">
                    <input value="<?= $_SESSION['old']['date'] ?? null ?>" name="date" type="date" class="form-control <?=  getErrorClass('date_error') ?>" placeholder="Date">
                    <span class="text-danger"><?= $_SESSION['errors']['date_error'] ?? null ?></span>
                  </div>
                  
                  
                  <button class="btn btn-primary mt-2">
                    Submit
                  </button>
             </form>


             <a href="./post.php">All Posts Here</a>
          </div>
        </div>
      </div>
    </div>
  </main>
<?php 
require "./inc/footer.php";

// session_unset();
session_destroy();
?>