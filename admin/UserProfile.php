<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
    $user = new User();
    $userid  = Session::get('userid');
    $userRole = Session::get('userRole');
    $UsuerName =Session::get('username')

?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">My Profile </h1>
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
                        <?php
                        if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['update']) ){
                            $name =$_POST['name'];
                            $email =$_POST['email'];
                            $details =$_POST['details'];

                            $user->setName($name);
                            $user->setEmail($email);
                            $user->setDetails($details);


                            if($user->update($userid)){
                                echo "<p class='bg-success' style='padding: 18px;text-align: center;'>User profile updated successfully</p>";
                            }
                        }
                        ?>
                        <?php
                        $getData = new User();
                        $value = $getData->readByid($userid);


                        ?>
                        <form action="" method="POST"   enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" class="form-control"  value="<?php echo $value['name'];?>" name="name">
                            </div>


                            <div class="form-group">

                                <label for="Catagory">Username</label>
                                <input type="text" class="form-control"  value="<?php echo $value['username'];?>" name="username" readonly>
                            </div>

                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control"  value="<?php echo $value['email'];?>" name="email">
                            </div>

                            <div class="form-group">
                                <label for="Email">Details</label>
                                <textarea class="form-control " rows="4" name="details"><?php echo $value['details'];?></textarea>
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