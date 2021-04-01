
<?php
include_once '../lib/Session.php';

if (Session::checkSeesion()){
    header("location:login.php");
}
if (isset($_GET['action']) && $_GET['action'] == 'logout'){
    Session::destory();
}



include_once '../lib/Main.php';
include_once '../lib/Database.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/config/Config.php';

$db = new Database();

spl_autoload_register(function($class){
    include "../Classes/".$class.".php";
});




?>
<?php
include "../helper/Format.php";

$fm = new Format();

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Social Buttons CSS -->
    <link href="vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
	
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
	
	<!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Spaecial Fonts -->
    <link href="style.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--tiny mice-->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
     selector:'.tiny-mice',
      height: 230,
      plugins: 'link image code',
      relative_urls: false,
      remove_script_host: false,
      content_css: [
        '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
        '//www.tinymce.com/css/codepen.min.css'
  ] });
</script>



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Pro Nur</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    
 
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a  href="Massagelist.php">
                        <i class="fa fa-envelope fa-fw"></i>
                        <span class="fa-stack fa-3x" style="padding:0px;font-size:13px;background:none;;width:26px;height:26px;color:red">
                          <i class="fa fa-circle-o fa-stack-2x"></i>
                          <strong class="fa-stack-1x"><?php
                              $massage = new Massage();
                              echo $massage->CountRow();?></strong>
                        </span>
                    </a>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="UserProfile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="setting.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <?php if (Session::get('userRole') == 0){?>
                        <li><a href="adduser.php"><i class="fa fa-user fa-fw"></i> Add User</a>
                        </li>
                        <?php }?>
                        <li><a href="userlist.php"><i class="fa fa-user fa-fw"></i>User list</a>
                        </li>
                        <li class="divider"></li>


                        <li><a href="?action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

          