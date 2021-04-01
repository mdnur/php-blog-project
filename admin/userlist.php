<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php $user = new User();?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User list</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        CatList
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body ">
                        <?php
                        if (isset($_GET['delid'])){
                            $delid  = $_GET['delid'];
                            $Userdel = $user->delete($delid);
                            if ($Userdel){
                                echo "<p class='bg-success big'>User sucessfully Deleted</p>";
                            }
                        }
                        ?>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Name</th>
                                <th>username</th>
                                <th>details</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $id = 1;
                            foreach ($user->readAll() as $key => $Value){

                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $id++?></td>
                                    <td><?php echo $Value['name']?></td>
                                    <td><?php echo $Value['username']?></td>
                                    <td><?php echo $Value['details']?></td>
                                    <td><?php if ($Value['role'] == 0){
                                            echo "admin";
                                        }elseif($Value['role'] == 1){
                                            echo "Author";
                                        }elseif($Value['role'] == 2){
                                            echo "Editor";
                                        }
                                        ?></td>
                                    <td>
                                        <a href="ViewProfile.php?editid=<?php echo $Value['id'];?>" class="btn btn-info">View</a>
                                    <?php if (Session::get('userRole') == 0){?>
                                        <a href="?delid=<?php echo $Value['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                                    <?php }?>
                                    </td>
                                </tr>
                            <?php    } ?>
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
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