<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>
<?php
$Post = new Post(NULL);
?>

<?php


if (isset($_GET['id'])){
    $id = $_GET['id'];
}
$per_page =3;
if (isset($_GET["page"])) {
    $page =$_GET['page'];
}  else {
    $page =1;
}
$start_page =($page-1)*$per_page;
$count = $Post->CatCountRow($id);
?>
<section class="Main-Contain">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php
                foreach ($Post->readCatLimite($id,$start_page,$per_page) as $key => $value){


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
                                        <img class="thumbnail" src="admin/<?php echo $value['image']?>" alt="Post Image">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <?php echo $fm->textShorten($value['body']);?>
                                </div>
                                <span class="read">
                            <a class="btn btn-info" href="post.php?id=<?php echo $value['id']?>">Read More</a>
                          </span>
                            </div>
                        </div>
                    </div>
                <?php }?>


                <!--Paganition-->
                <?php
                $total_page= ceil($count/$per_page);
                ?>
                <nav aria-label="Page navigation" class="pagination-arae">
                    <ul class="pagination">

                        <?php
                        for ($i = 1; $i < $total_page; $i++) { ?>
                            <li><a href="?page=<?php echo  $i;?>&id=<?php echo $id;?>"><?php echo $i?></a></li>
                        <?php }?>
                        <li><a href="posts.php?page=<?php echo $total_page?>&id=<?php echo $id;?>">Last Page</a></li>
                    </ul>
                </nav>

            </div>


            <?php include "inc/sidebar.php"; ?>
            <?php include "inc/footer.php"; ?>
