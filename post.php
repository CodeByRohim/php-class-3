<?php 
include "./inc/header.php";
require "./database/env.php";
// require "./controller/PostStoreController.php";
// mandatory data database theka fetch kora
 $query = "SELECT id, title AS post_title, detail, author FROM posts ORDER BY id DESC"; // WHERE author = 'Eos laborum sed cill' OR phone = '100' ORDER BY id DESC, title ASC LIMIT 2"; //aliase name use kora AS keyword diye //same column name thakle where use kora uchit //ORDER BY diya dat shajano //data fetch limit  kora LIMIT keyword diye

// database connection kora and query kore data insert kora 
//query run korar jonno mysqli_query function use kora
$res = mysqli_query($conn, $query);

// database theka fetch kora data gula tule anar jonno mysqli_fetch_all function use kora
//mode 1 use kora associative array te convert kora mode 0 use kora indexed array te convert kora
$posts = mysqli_fetch_all($res, 1);
// echo "<pre>";
// var_dump($posts);
// echo "</pre>";
?>
  
  <div class="col-lg-10 mx-auto mt-5">
    <div class="card">
      <div class="card-header">Posts</div>
        <div class="card-body">

           <table class="table table-responsive table-borderd table-striped">


            <thead>
              <tr class="text-center">
                <th>Sl.</th>
                <th>Post Title</th>
                <th>Post Detail</th>
                <th>Post Author</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                                         
              <?php
               if(empty($posts)){ 
                ?>
               <tr>
                <td class="text-center" colspan='5'>No post found</td>
              </tr>
              
              <?php
               }
               foreach($posts as $index => $post): ?>
              <tr class="text-center">
                <td class=""><?= ++$index ?></td>
                <td class=""><?= $post['post_title'] ?></td>
                <td class="text-center"><?=  (strlen($post['detail']) > 40) ? substr($post['detail'],0,40) . '...' : $post['detail'] ?></td>
                <td class="text-center"> <img src="https://api.dicebear.com/9.x/initials/svg?seed=<?= $post['author'] ?>" style="width: 40px;height: 40px;border-radius:100px" alt="author image"> <?= $post['author'] ?></td>
                
                <td>
                <a class="btn btn-primary text-white bg-warning" href="./postedit.php?id=<?= $post['id']?>">Edit</a>
                <a class="btn btn-primary text-white bg-danger" href="./controller/PostDeleteController.php?id=<?= $post['id']?>">Delete</a>  
              </td>
              </tr>
              <?php endforeach; ?>             
           </table>

        </div>
      </div>
    </div>
  </div>
  <?php include "./inc/footer.php"?>
