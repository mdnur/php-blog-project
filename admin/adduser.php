<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

<?php

if (!Session::get('userRole') == 0){
    echo "<script>window.location ='index.php';</script>";
}
?>
<?php
    $user = new User();
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add User</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add User
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                            <?php
                            if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['create']) ){
                                $username = $fm->validation($_POST['username']);
                                $password = $fm->validation($_POST['password']);
                                $password = md5($password);
                                $role = $fm->validation($_POST['role']);

                                $user->setUsername($username);
                                $user->setPassword($password);
                                $user->setRole($role);

                                if ($user->insert()){
                                    echo "<p class='bg-success' style='padding: 18px;text-align: center;'>User added successfully</p>";
                                }

                            }
                            ?>
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" placeholder="Enter username" name="username">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">password</label>
                                    <input type="password" class="form-control" placeholder="Enter password" name="password">
                                </div>


                                <div class="form-group">
                                <select class="form-control" name="role">
                                    <option>Select one</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Author</option>
                                    <option value="2">Editor</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline btn-success" name="create">Submit</button>
                                </div>

                            </form>

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