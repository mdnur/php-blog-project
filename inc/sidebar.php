<?php
    $catagory = new Catagory();
?>
<div class="col-md-3">
                      <ul class="list-group">
                          <li class="list-group-item">Lastest Catagory</li>
                      </ul>
                        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example sidebar-Menu">
                            <?php
                            foreach ($catagory->readAll() as $key =>$value){
                            ?>
                          <li role="presentation"><a href="posts.php?page=1&id=<?php echo $value['id'];?>"><?php echo $value['name'];?></a></li>
                            <?php }?>
                        </ul> 
                        <div class="sidebae-left">
                           <ul class="list-group">
                          <li class="list-group-item">Lastest Post</li>
                          </ul>

                            <?php
                            $post = new Post(null);
                            foreach ($post->readAllLIme() as $key => $value){
                            ?>
                            <div class="media">

                                    <div class="media-left">
                                        <a href="post.php?postid=<?php echo $value['id']?>">
                                            <img class="last-post" src="admin/<?php echo $value['image'];?>" alt="...">
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        <a href="post.php?postid=<?php echo $value['id']?>"><h3><?php echo $value['title'];?></h3></a>
                                        <?php echo $fm->textShorten($value['body'],50);?>
                                    </div>

                            </div>
                            <?php } ?>

                        </div>
                       
          			</div>