<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
$copyrights = new Copyrights();

?>


    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Update Copyrights text</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update Copyrights
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="Form-auto">
                            <?php
                            if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['update']) ){
                                $copy = $_POST['copy'];

                                if(empty($copy)){
                                    echo "<p class='bg-danger big'>Catagory must not be empty</p>";
                                }  else {

                                    $copyrights->setCopyright($copy);
                                    $catupdate = $copyrights->update(1);
                                    if($catupdate){
                                        echo "<p class='bg-success big'>Catagory update sucessfully</p>";
                                    }  else {
                                        echo "<p class='bg-danger big'>Something wrong</p>";
                                    }



                                }
                            }
                            ?>
                            <?php
                            $value = $copyrights->readByid(1);


                            ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Add Catagory</label>
                                    <input type="text" class="form-control"  name="copy" Value="<?php echo $value['copyrights'];                                              ?>">
                                </div>
                                <button type="submit" class="btn btn-outline btn-success" name="update">Submit</button>
                            </form>
                        </div>
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