</div>
        </section>
        <footer class="footer-area">
          <div class="container">
            <div class="row footer">
              <div class="col-md-12">
                <nav>
                  <ol class="breadcrumb">
                      <?php
                      $page = new Page();
                      foreach ($page->readAll() as $k => $caluepage){
                          ?>
                          <li role="presentation" ><a href="page.php?id=<?php echo $caluepage['id']; ?>"><?php echo $caluepage['title']; ?></a></li>
                      <?php }?>

                  </ol>
                </nav>
                  <?php
                    $footer = new Copyrights();
                    $footerValue = $footer->readByid(1);
                  ?>
                <p class="footer-bottom">&copy; <?php echo $footerValue['copyrights'];?> <?php echo date('Y');?></p>
              </div>
            </div>
          </div>
        </footer>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
