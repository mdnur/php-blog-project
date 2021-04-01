<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
$logo = new Title();
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Social Links Update</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Social Links
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">

                                <?php
                                if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['update']) ){
                                    $title = $_POST['title'];
                                    $describtion = $_POST['describtion'];

                                   $logo->setTitle($title);
                                   $logo->setDescribtion($describtion);
                                   $logo->setLogo($_FILES);

                                   if ($logo->update(1)){
                                       echo "<p class='bg-success big'> updated sucessfully</p>";
                                   }
                                }
                                ?>
                                <?php
                                $value = $logo->readByid(1);
                                ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control"  value="<?php echo $value['title']; ?>" name="title">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Describtion</label>
                                        <input type="text" class="form-control"  value="<?php echo $value['describtion'];?>" name="describtion">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <input type="file" id="exampleInputFile" name="logo">
                                    </div>

                                    <button type="submit" class="btn btn-outline btn-success" name="update">Update</button>
                                </form>


                                <!-- /.div -->
                            </div>
                            <div class="col-md-6">
                                <img style="width: 122px;height:122px;margin-left:145px;" src="<?php echo $value['logo'];?>" alt="Logo">
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->

<?php include "inc/footer.php";?>