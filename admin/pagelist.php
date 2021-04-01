<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">CatList</h1>
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
                            $page = new page();
                            $delid  = $_GET['delid'];
                            $pagedel = $page->delete($delid);
                            if ($pagedel){
                                echo "<p class='bg-success big'>Page Deleted sucessfully</p>";
                            }
                        }
                        ?>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Page Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $Page = new Page();
                            $id = 1;
                            foreach ($Page->readAll() as $key => $Value){

                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $id++?></td>
                                    <td><?php echo $Value['title'];?></td>
                                    <td>
                                        <a href="updatePage.php?editid=<?php echo $Value['id'];?>" class="btn btn-info">View</a>
                                        <a href="?delid=<?php echo $Value['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')">Delete</a>
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