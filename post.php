<?php include "inc/header.php"; ?>
<?php
$post =new Post(NULL);
$id;
    if (isset($_GET['postid'])){
        $id = $_GET['postid']; 
    }else{
        header("location:404.php");
    }


?>


        <section class="Main-Contain">
            <div class="container">
                <div class="row">
                  <div class="col-md-9">
                      <?php
                      $value = $post->readByid($id);
                      if (isset($value))
                      if ($id != $value['id']){
                          echo "<script>window.location ='404.php';</script>";
                      }
                      //    if (!$value['id']){
                      //     echo "<script>window.location ='404.php';</script>";
                      // }

                      ?>
                    <div class="panel panel-default">
                      <div class="panel-body">
                      <h2><?php echo $value['title']?></h2>
                      <span><?php echo $fm->formatDate($value['date']);?>, <a href="">By mdnur</a></span>
                      </div>
                      <div class="panel-footer">
                      <div class="media">
                        <div class="media-left">
                        <a href="#">
                          <img class="thumbnail" src="admin/<?php echo $value['image']?>" alt="...">
                        </a>
                        </div>
              
                          <div class="media-body">
                              <?php echo $value['body']?>
                          </div>
                        </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                          <?php
                            $cat = $value['cat'];
                          ?>
                          <div class="panel-heading">Related articles</div>
                          <div class="row" style="padding: 10px">
                              <?php

                                foreach ($post->readCat($cat) as $ca =>$catValue){
                                    if ($catValue['id'] != $id){


                              ?>
                              <div class="col-lg-3">
                                  <a href="?postid=<?php echo $catValue['id'];?>" class="thumbnail">
                                      <img src="admin/<?php echo $catValue['image'];?>" alt="Post">
                                  </a>
                              </div>

                                <?php  } } ?>
                          </div>
                      </div>
                    </div>
                          
                    
<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>