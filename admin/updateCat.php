<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
 <?php
if (isset($_GET['editid'])) {
    if (!isset($_GET['editid']) || $_GET['editid'] == NULL){
        //header("Location:catlist.php");
       echo "<script>window.location ='catlist.php';</script>";
     }else{
            $id = $_GET['editid'];
     }
}
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Catagory</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update catagory
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="Form-auto">
                                 <?php
                                if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['update']) ){
                                    $cat = $_POST['cat'];
                                    $id = $_POST['id'];
                                            
                                    if(empty($cat)){
                                        echo "<p class='bg-danger big'>Catagory must not be empty</p>";
                                    }  else {
                                        $Catagory = new Catagory();
                                        $Catagory->setCat($cat);
                                            $catupdate = $Catagory->update($id);
                                            if($catupdate){
                                                echo "<p class='bg-success big'>Catagory update sucessfully</p>";
                                            }  else {
                                                echo "<p class='bg-danger big'>Something wrong</p>";
                                            }


                                        
                                    }
                                }
                                ?>
                                <?php
                                    $getData = new Catagory();
                                   $value = $getData->readByid($id);
                                        
                                   
                                ?>
                                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" value="<?php echo $value['id'];?>" name="id" required>
                                    </div>
                                    <div class="form-group">
                                          <label for="exampleInputEmail1">Add Catagory</label>
                                          <input type="text" class="form-control"  name="cat" Value="<?php echo $value['name'];                                              ?>">
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