<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Catagory</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add catagory
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="Form-auto">
                                 <?php
                                if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['create']) ){
                                    $cat = $_POST['cat'];
                                            
                                    if(empty($cat)){
                                        echo "<p class='bg-danger big'>Catagory must not be empty</p>";
                                    }  else {
                                        $Catagory = new Catagory();
                                        $Catagory->setCat($cat);
                                        $catInsert = $Catagory->Insert();
                                        if($catInsert){
                                            echo "<p class='bg-success big'>Catagory added sucessfully</p>";
                                        }  else {
                                             echo "<p class='bg-danger big'>Something wrong</p>";
                                        }
                                        
                                    }
                                }
                                ?>
                                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                                    <div class="form-group">
                                          <label for="exampleInputEmail1">Add Catagory</label>
                                          <input type="text" class="form-control"  name="cat" placeholder="Enter catagory">
                                    </div>
                                    <button type="submit" class="btn btn-outline btn-success" name="create">Submit</button>
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