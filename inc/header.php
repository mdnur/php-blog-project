<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/config/Config.php';
include_once 'lib/Main.php';
include_once 'lib/Database.php';
// include_once 'config/Config.php';


$db = new Database();

spl_autoload_register(function($class){
    include "Classes/".$class.".php";
});
?>
<?php
include "helper/Format.php";

$fm = new Format();
$page = new Page();
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php
                if (isset($_GET['id'])){
                    $pageidVAlue =$_GET['id'];

                    $Tilvalue = $page->readByid($pageidVAlue);
                    echo $Tilvalue['title']."-".TITLE;
                }elseif (isset($_GET['postid'])){
                    $postid =$_GET['postid'];
                    $titlePost = new Post(null);
                    $Tilvaluepost = $titlePost->readByid($postid);
                    echo $Tilvaluepost['title']."-".TITLE;
                } else{
                    echo $fm->title()."-".TITLE;
                }


            ?></title>

        <?php
        if (isset($_GET['postid'])){
            $keywordsid =$_GET['postid'];
            $MataPost = new Post(null);
            $Tilvaluepost = $titlePost->readByid($keywordsid);
            echo "<meta name='keywords' content="."{$Tilvaluepost['tags']}".">";
            echo "<meta name='description' content="."{$fm->textShortenMassage($Tilvaluepost['tags'],30)}".">";
        }else{
            "<meta name='keywords' content='echo KEYWORDS'>";
        }
        ?>

        <meta name="author" content="mdnur">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Place bootstrap 3 in the root directory -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="style.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script>
           $(".nav a").on("click", function(){
               $(".nav").find(".active").removeClass("active");
               $(this).parent().addClass("active");
            });
        </script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        



        <header class="header-area">
            <div class="container page-header">
                <div class="row">

                    <?php

                        $title = new Title();
                         $titleValue = $title->readByid(1);
                    ?>
                    <div class="col-md-1">
                        <a href="index.php"><img src="admin/<?php echo $titleValue['logo'];?>" alt="Logo"></a>
                    </div>
                    <?php

                    ?>
                    <div class="col-md-8">
                        <h1><?php echo $titleValue['title'];?></h1>
                        <span><?php echo $titleValue['describtion'];?></span>

                    </div>
                    <div class="col-md-3">
                        <div class="header-right">
                            <?php
                            $social = new Social();
                           $socialValue = $social->readByid(1)
                            ?>
                            <div class="social-links">
                                <a href="<?php echo $socialValue['fb'];?>" target="_blank"><i class="fa fa-facebook-official  fa-2x" aria-hidden="true"></i></a>
                                <a href="<?php echo $socialValue['tw'];?>" target="_blank"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                                <a href="<?php echo $socialValue['inst'];?>" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
                                <a href="<?php echo $socialValue['gp'];?>" target="_blank"><i class="fa fa-google-plus-square fa-2x"></i></a>
                            </div>
                        <div class="search-box">
                            <div class="input-group custom-search-form">

                                <form action="search.php" method="get">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search keyword..." required=""/>
                                        <span class="input-group-btn">
                                            <input type="submit" name="submit" value="Search" class="btn btn-default"/>
                                        </span>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

         <nav class="Manu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills ">
                            <?php
                                $path = $_SERVER['SCRIPT_FILENAME'];
                                $curentpage = basename($path, '.php');
                            ?>
                          <li role="presentation"" <?php if ($curentpage == 'index'){echo "class='active'"; }  ?> ><a href="index.php">Home</a></li>
                            <?php
                                foreach ($page->readAll() as $k => $caluepage){
                            ?>
                          <li role="presentation"
                              <?php
                              if (isset($_GET['id']) && $_GET['id'] ==$caluepage['id']){
                                  echo "class='active'";
                              }
                              ?>><a
                                      href="page.php?id=<?php echo $caluepage['id']; ?>"><?php echo $caluepage['title']; ?></a></li>
                            <?php }?>
                          <li role="presentation" <?php if ($curentpage == 'contact'){echo "class='active'"; }?>><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>