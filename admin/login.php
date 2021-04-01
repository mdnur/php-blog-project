<?php
include_once '../lib/Session.php';
Session::checkLogin();

include_once '../lib/Main.php';
include_once '../lib/Database.php';
include_once '../lib/Session.php';
include_once '../config/config.php';

$db = new Database();

spl_autoload_register(function($class){
    include "../Classes/".$class.".php";
});
?>
<?php
include "../helper/Format.php";

$fm = new Format();
$login = new Login();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                            if (isset($_GET['action']) && $_GET['action'] == 'logout'){
                                echo "<p class='bg-success' style='padding: 18px;text-align: center;'>Logout sucessful</p>";
                            }
                        ?>
                        <?php
                            if ($_SERVER['REQUEST_METHOD'] =='POST'  && isset($_POST['login'])) {
                                $username = $fm->validation($_POST['username']);
                                $password = $fm->validation($_POST['password']);
                                $password = md5($password);

                                if (empty($username) || empty($password)){
                                    echo "<p class='bg-warning' style='padding: 18px;text-align: center;'>Field must no be empty</p>";
                                }else{
                                    $login->setUsername($username);
                                    $login->setPassword($password);

                                    if ($login->ChechRow() > 0) {
                                        $loginValue = $login->readByUsername();

                                        Session::set("login", TRUE);
                                        Session::set("username", $loginValue['username']);
                                        Session::set("userid", $loginValue['id']);
                                        Session::set("userRole", $loginValue['role']);
                                        header("Location:index.php");
                                    }else{
                                        echo "No result found";
                                    }
                                }
                            }

                        ?>

                        <form action="login.php" method="POST">
                            <fieldset>

                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="username"  >
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" >
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Login"  name="login" class="btn btn-success" style="padding: 8px;width: 331px; font-size: 20px;"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
