<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
    if (isset($_GET['id']) && $_GET['id'] == null){
        header("location:index.php");
    }else{
        $id = $_GET['id'];
    }

    $massage = new Massage();
    $mas = $massage->readByid($id);


    if ($id != $mas['id']){
        echo "<script>window.location ='index.php';</script>";
    }
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Read Massage</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Read Massage
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input class="form-control" type="text" placeholder="<?php echo $mas['name'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input class="form-control" type="text" placeholder="<?php echo $mas['email'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Massage</label>
                            <textarea class="form-control" type="text" rows="3"  readonly><?php echo $mas['massage'];?></textarea>
                        </div>
                        <div class="form-group">
                            <a href="Massagelist.php?id=<?php echo $mas['id'];?>&status=1" class="btn btn-success">ok</a>
                            <a href="Massagelist.php" class="btn btn-primary">Reply</a>
                        </div>

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