<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel=icon href='<?= base_url() ?>assets/custom/img/MyLogo.png' sizes="16x16" type="image/png">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <?php addCSS("assets/admin/css/bootstrap.min.css") ?>

    <?php addCSS("assets/global/plugins/slick/slick.css") ?>
    <?php addCSS("assets/global/plugins/slick/slick-theme.css") ?>
    <?php addCSS("assets/custom/css/custom.css") ?>

    <?php getCSS() ?>
</head>
<body>
    <?= $menu ?>
    <button  class="icon-menu-top-open menu fa  fa-bars fa-3"></button>
    <div id="page-container" >
        <section class="container-fluid header-container">
            <div id="header" class="row">
                <div id="img-back-header" class="col-md-12">

                    <!--<div class="triangulo_top_right"></div>
                    <div class="triangulo_top_left"></div>
                    <div class="triangulo_bottom_left"></div>
                    <div class="triangulo_bottom_right"></div>

                        <img  src="<?= base_url() ?>/assets/custom/img/LogoWeb.png" height="300">                   
-->
                    <div style="width:600px;margin:0 auto;" id="undefined">
                        
                    </div>
                </div>
            </div>
        </section>

        <section id="home-content-2" class=" " >
            <div class="vertical-align">
                <div class="container">
                    <div class="row">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p>
                            Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.
                        </p>
                        <img src="<?= base_url() ?>/assets/custom/img/me.jpg" alt="" class="img-circle me-circle-img"/>
                    </div>
                </div>
            </div>
        </section>

        <section id="home-content-3" class=" " >
            <div class="vertical-align">
                <div class="container">
                    <div class="row">
                        <div class="title-section center-block">
                            <h2 class="text-center">WORKS</h2>
                        </div>
                        <div class="content-section col-md-12">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="home-content-4" class=" " >
            <div class="vertical-align">
                <div class="container">
                    <div class="row">
                        <div class="title-section center-block">
                            <h2 class="text-center">Latest Posts</h2>
                        </div>
                        <div class="your-class">
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                  <img src="<?= base_url() ?>/assets/custom/img/me.jpg" alt="...">
                                  <div class="caption">
                                    <h3>Thumbnail label</h3>
                                    <p>Lorem ipsum Exercitation laborum mollit in mollit Excepteur.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="<?= base_url() ?>/assets/custom/img/me.jpg" alt="...">
                                <div class="caption">
                                    <h3>Thumbnail label</h3>
                                    <p>Lorem ipsum Non proident tempor eiusmod.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                              <img src="<?= base_url() ?>/assets/custom/img/me.jpg" alt="...">
                              <div class="caption">
                                <h3>Thumbnail label</h3>
                                <p>Lorem ipsum In in ullamco Duis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</body>
<?php addJS("assets/admin/plugins/jQuery/jQuery-2.1.3.min.js") ?>
<?php addJS("assets/admin/plugins/slimScroll/jquery.slimscroll.min.js") ?>
<?php addJS("assets/admin/plugins/niceScroll/jquery.nicescroll.min.js") ?>
<?php addJS("assets/admin/js/bootstrap.min.js") ?>
<?php addJS("assets/global/plugins/onepage-scroll/jquery.onepage-scroll.js") ?>
<?php addJS("assets/global/plugins/slick/slick.js") ?>
<?php addJS("assets/global/plugins/lazy-line-painter-master/jquery.lazylinepainter-1.7.0.min.js") ?>
<?php addJS("assets/custom/js/custom.js") ?>

<?php getJS() ?>
</html>
