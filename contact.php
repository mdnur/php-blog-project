<?php include "inc/header.php"; ?>
<?php
    $massage = new Massage();
?>
        <section class="Main-Contain">
            <div class="container">
                <div class="row">
                  <div class="col-md-9">
                      
                    <div class="panel panel-info"> 
                      <div class="panel-heading"> 
                        <h3 class="panel-title">Contact  Us</h3> 
                      </div> 
                      <div class="panel-body">
                          <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])){
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $body = $_POST['body'];

                                $massage->setName($name);
                                $massage->setEmail($email);
                                $massage->setMassage($body);

                                if ($massage->Insert()){
                                    echo "<p class='bg-success' style='padding: 18px;text-align: center;'>Massage Sent sucessfully</p>";
                                }else{
                                    echo "<p class='bg-warning' style='padding: 18px;text-align: center;'>You next</p>";
                                }


                            }

                          ?>

                          <form action="" method="POST">
                              <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
                              </div>
                                <div class="form-group">
                                   <label for="massage">Massage</label>
                                    <textarea class="form-control" rows="3" name="body"></textarea>
                                </div>
                                <div class="form-group">
                                <div class="form-group">
                                  <button type="submit" class="btn btn-default" name="send">Send</button>
                                </div>
                              </div>
                          </form>
                      </div> 
                    </div>

                  </div>
                          
                    
<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>