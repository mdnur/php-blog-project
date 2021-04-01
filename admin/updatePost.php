<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
if (isset($_GET['editid'])) {
    if (!isset($_GET['editid']) || $_GET['editid'] == NULL){
        //header("Location:catlist.php");
        // echo "<script>window.location ='catlist.php';</script>";
    }else{
        $id = $_GET['editid'];
    }
}
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Update POST</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update POST
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                            <?php
                            if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['update']) ){
                                $postID =$_POST['pid'];
                                $post = new Post($_POST);
                                $post->setImage($_FILES);
                                $postupdate = $post->update($postID);
                                if($postupdate){
                                    echo "<p class='bg-success big'>Catagory update sucessfully</p>";
                                }else{
                                    echo "<p class='bg-warning big'>Something wrong</p>";
                                }
                            }
                            ?>
                            <?php
                            $getData = new Post(NUll);
                            $value = $getData->readByid($id);


                            ?>
                            <form action="" method="POST"   enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" value="<?php echo $value['id'];?>" name="pid" required>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control"  value="<?php echo $value['title'];?>" name="title">
                                </div>


                                <div class="form-group">

                                    <label for="Catagory">Catagory</label>
                                    <select class="form-control" name="cat">
                                        <?php
                                        $Catagory = new Catagory();
                                        foreach ($Catagory->readAll() as $key => $catValue){

                                            ?>
                                            <option <?php if ($value['cat'] == $catValue['id']) { ?>
                                                selected ="selected"
                                            <?php }?> value="<?php echo $catValue['id']?>"><?php echo $catValue['name']?>

                                            </option>
                                        <?php   } ?>
                                    </select>

                                </div>



                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" id="exampleInputFile"  name="image">
                                    <img style="width: 64px;height:64px;" src="<?php echo $value['image'];?>">
                                </div>

                                <div class="form-group">
                                    <label for="Text">Text</label>
                                    <textarea class="form-control tiny-mice" rows="4" name="body"><?php echo $value['body'];?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Add tags</label>
                                    <input type="text" class="form-control"  value="<?php echo $value['tags'];?>" name="tags">
                                </div>
                                <div class="form-group">
                                    <label for="Author">Author</label>
                                    <input type="text" class="form-control"  value="<?php echo $value['author'];?>" name="author" disabled >
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