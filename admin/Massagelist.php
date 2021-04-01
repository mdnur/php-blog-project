<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Massage List</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Unseen Massage List
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body ">
                        <?php
                            $msg = new Massage();


                        if (isset($_GET['delid'])){
                            $Catagory = new Catagory();
                            $delid  = $_GET['delid'];
                            $catdel = $Catagory->delete($delid);
                            if ($catdel){
                                echo "<p class='bg-success big'>Data sucessfully Delete</p>";
                            }
                        }

                        if (isset($_GET['unseen'])){
                            $unseen  = $_GET['unseen'];

                            $msg->updateStatus(0,$unseen);
                        }




                        if (isset($_GET['id'])){
                            $id  = $_GET['id'];

                            if (isset($_GET['status']) || $_GET['status'] == 1){
                                $status  = $_GET['status'];

                                $msg->updateStatus($status,$id);
                                }
                        }
                        ?>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Massage</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i= 1;
                            foreach ($msg->readALLbyStatus(0) as $key => $Value){

                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $i++?></td>
                                    <td><?php echo $Value['name']?></td>
                                    <td><?php echo $Value['email']?></td>
                                    <td><?php echo $fm->textShortenMassage($Value['massage'],30);?></td>
                                    <td>
                                        <a href="readMassage.php?id=<?php echo $Value['id'];?>" class="btn btn-info">View</a>
                                        <a href="replyMsg.php?id=<?php echo $Value['id'];?>" class="btn btn-primary">Reply</a>

                                    </td>
                                </tr>
                            <?php    } ?>
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        Seen Massage List
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body ">
                        <?php
                        if (isset($_GET['delid'])){
                            $delid  = $_GET['delid'];
                            $msgdel = $msg->delete($delid);
                            if ($msgdel){
                                echo "<p class='bg-success big'>Massage  sucessfully Delete</p>";
                            }
                        }
                        ?>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Massage</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $msg = new Massage();
                            $id = 1;
                            foreach ($msg->readALLbyStatus(1) as $key => $Value){

                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $id++?></td>
                                    <td><?php echo $Value['name']?></td>
                                    <td><?php echo $Value['email']?></td>
                                    <td><?php echo $fm->textShortenMassage($Value['massage'],30);?></td>
                                    <td>
                                        <a href="readMassage.php?id=<?php echo $Value['id'];?>" class="btn btn-info">View</a>
                                        <a href="?delid=<?php echo $Value['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                                        <a href="?unseen=<?php echo $Value['id'];?>" class="btn btn-primary" onclick="return confirm('Are you sure to Unseen this massage ?')">Unseen</a>
                                    </td>
                                </tr>
                            <?php    } ?>
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->

<?php include "inc/footer.php";?>