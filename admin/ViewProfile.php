<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php

$userid  = Session::get('userid');
$userRole = Session::get('userRole');
$getData = new User();
$value = $getData->readByid($userid);

?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Profile of <span style="color:#337ab7;"><?php echo $value['name'];?></span></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        User Profile
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="" method="POST"   enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" class="form-control"  value="<?php echo $value['name'];?>" name="name" readonly>
                            </div>


                            <div class="form-group">

                                <label for="Catagory">Username</label>
                                <input type="text" class="form-control"  value="<?php echo $value['username'];?>" name="username" readonly>
                            </div>

                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control"  value="<?php echo $value['email'];?>" name="email" readonly>
                            </div>

                            <div class="form-group">
                                <label for="Email">Details</label>
                                <textarea class="form-control" rows="4" name="details" readonly><?php echo $value['details'];?> </textarea>
                            </div>
                            <?php ?>
                            <div class="form-group">
                                <label for="Author">Role</label>
                                <input type="text" class="form-control"
                                       value="<?php if ($value['role'] == 0){
                                           echo "admin";
                                       }elseif($value['role'] == 1){
                                           echo "Author";
                                       }elseif($value['role'] == 2){
                                           echo "Editor";
                                       }
                                       ?>
                                " name="author" readonly>
                            </div>
                            <a href="userlist.php" class="btn btn-outline btn-success" name="update">OK</a>
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