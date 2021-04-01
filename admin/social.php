<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
    $social = new Social();
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
                            <?php
                                if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['update']) ){
                                    $fb = $_POST['fb'];
                                    $tw = $_POST['tw'];
                                    $inst = $_POST['inst'];
                                    $gp = $_POST['gp'];

                                    if(empty($fb)){
                                        echo "<p class='bg-danger big'>Facebook must not be empty</p>";
                                    }elseif (empty($tw)){
                                        echo "<p class='bg-danger big'>Twitter must not be empty</p>";
                                    }elseif (empty($inst)){
                                        echo "<p class='bg-danger big'>Instagram must not be empty</p>";
                                    }elseif (empty($gp)){
                                        echo "<p class='bg-danger big'>google-plus must not be empty</p>";
                                    }  else {
                                        $social = new Social();
                                        $social->setFB($fb);
                                        $social->setTW($tw);
                                        $social->setINST($inst);
                                        $social->setGP($gp);
                                        $socialInsert = $social->update(1);
                                        if($socialInsert){
                                            echo "<p class='bg-success big'>Social links updated sucessfully</p>";
                                        }  else {
                                            echo "<p class='bg-danger big'>Something wrong</p>";
                                        }

                                    }
                                }
                            ?>
                            <?php
                                $value = $social->readByid(1);
                            ?>
                                <form action="" method="POST">
								  <div class="form-group">
                                    <label for="exampleInputEmail1">facebook</label>
                                    <input type="text" class="form-control"  value="<?php echo $value['fb']; ?>" name="fb">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">twiiter</label>
                                    <input type="text" class="form-control"  value="<?php echo $value['tw'];?>" name="tw">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">instagram</label>
                                    <input type="text" class="form-control"  value="<?php echo $value['inst'];?>" name="inst">
                                  </div>
                                  <div class="form-group">
									<label for="exampleInputEmail1">google-plus</label>
									<input type="text" class="form-control"  value="<?php echo $value['gp'];?>" name="gp">
								  </div>
								  <button type="submit" class="btn btn-outline btn-success" name="update">Update</button>
								</form>
                                

                            <!-- /.div -->
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