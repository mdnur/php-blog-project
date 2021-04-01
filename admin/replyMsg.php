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
                <h1 class="page-header"> Send Massage</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Send Massage
                    </div>
                    <div class="panel-body">
                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])){
                                $to = $_POST['to'];
                                $from = $_POST['from'];
                                $Subject = $_POST['Subject'];
                                $msgSend = $_POST['msgSend'];

                                if (empty($to) || empty($from) || empty($Subject) || empty($msgSend))
                                    echo "field must not be empty";
                                else{
                                    $mail = mail($to, $subject, $msgSend);
                                    if ($mail){
                                        echo "<p class='bg-success' style='padding: 18px;text-align: center;'>Massage Sent sucessfully</p>";
                                    }else{
                                        echo "<p class='bg-danger' style='padding: 18px;text-align: center;'>Something Wrong</p>";
                                    }
                                }


                            }
                        ?>
                        <form action="replyMsg.php" method="POST">
                            <div class="form-group">
                                <label for="to">To</label>
                                <input class="form-control" type="text" value="<?php echo $mas['email'];?>" readonly name="to">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">From</label>
                                <input class="form-control" type="text" placeholder="From" name="from">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Subject</label>
                                <input class="form-control" type="text" placeholder="Subject" name="Subject">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Massage</label>
                                <textarea class="form-control" type="text" rows="3" name="msgSend"></textarea>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-success" value="Send" type="button" name="send">Send</a>
                                <a href="Massagelist.php" class="btn btn-primary">Discard</a>
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