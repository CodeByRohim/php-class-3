
<?php 
session_start();
include "./inc/header.php"
?>
  
  <main>
    <div class="col-lg-5 mx-auto mt-5">
      <div class="card">
        <div class="card-header">Write a Post</div>
          <div class="card-body">

            
             <form action="./controller/PostStoreController.php" method="post">
                  <input name="title" type="text" class="form-control mb-2" placeholder="Post">
                  <span class="text-danger"><?= $_SESSION['errors']['title_error'] ?? null ?></span>

                  <textarea name="detail" class="form-control mb-3" id="" placeholder="Details Text"></textarea>
                  <span class="text-danger"><?= $_SESSION['errors']['detail_error'] ?? null ?></span>

                  <input name="author" type="text" class="form-control mb-2" placeholder="Author">
                  <span class="text-danger"><?= $_SESSION['errors']['author_error'] ?? null ?></span>
                  
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
include "./inc/footer.php";
session_unset();
?>