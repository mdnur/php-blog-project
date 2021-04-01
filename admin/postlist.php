<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Postlist</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Postlist
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
                            if (isset($_GET['delid'])){
                                $post = new Post(NULL);
                                $delid  = $_GET['delid'];
                                $postdel = $post->delete($delid);
                                if ($postdel){
                                    echo "<p class='bg-success big'>Data sucessfully Delete</p>";
                                }
                            }
                            ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Title</th>
                                        <th>Catagory</th>
                                        <th>Image</th>
                                        <th>tags</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $post =new Post(NULL);
                                    $getAllpost = $post->readAllData();
                                    $i=0;
                                foreach($getAllpost as $key => $value){
                                    $i++;
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $value['title'];?></td>
                                        <td><?php echo $value['name'];?></td>
                                        <td><img style="width: 64px;height: 64px;" src="<?php echo $value['image'];?>"></td>
                                        <td><?php echo $value['tags'];?></td>
                                        <td><?php echo $value['author'];?></td>
                                        <td><?php echo $fm->formatDate($value['date']);?></td>
                                        <td>
                                            <a href="updatePost.php?editid=<?php echo $value['id'];?>" class="btn btn-info">View</a>
                                            <a href="?delid=<?php echo $value['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php }?>
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
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
<?php include "inc/footer.php";?>