<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Post</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Post
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['create']) ){
                            $page = new Page();
                            $title =$_POST['title'];
                            $body =$_POST['body'];

                            $page->setTitle($title);
                            $page->setbody($body);

                            if ($page->insert()){
                                echo "<p class='bg-success big'>Page Added sucessfully</p>";
                            }

                        }
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control"  placeholder="Enter Post title" name="title">
                            </div>

                            <div class="form-group">
                                <label for="Text">Text</label>
                                <textarea class="form-control tiny-mice" rows="4" name="body"></textarea>
                            </div>

                            <button type="submit" class="btn btn-outline btn-success" name="create">Submit</button>
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