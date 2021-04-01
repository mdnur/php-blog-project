<?php include "inc/header.php"; ?>
<?php
$page = new Page();
if (isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header("location:404.php");
}

$value = $page->readByid($id);

?>

        <section class="Main-Contain">
            <div class="container">
                <div class="row">
                  <div class="col-md-9">
                      
                    <div class="panel panel-info"> 
                  <div class="panel-heading"> 
                    <h3 class="panel-title"><?php echo $value['title'];?></h3>
                  </div> 
                  <div class="panel-body">
                      <?php echo $value['body'];?>
                  </div> 
                </div>

                  </div>
                          
                    
<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>