<!DOCTYPE html>
<html>
  <head>
      <script type="text/javascript">
        window.base_url = <?php echo json_encode(base_url()); ?>;
    </script>
    <meta charset="UTF-8">
    <title>FPAC ADMIN |<?= $title?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?= base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?= base_url()?>assets/admin/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?= base_url()?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?= base_url()?>assets/admin/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= base_url()?>assets/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?= base_url()?>assets/admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

     <!-- DATA TABLES -->
    <link href="<?= base_url()?>assets/admin/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <?php getCSS()?>
    
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php base_url()?>./" class="logo">Panel <b>FPAC</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              
              
              
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Idioma <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      <li><!-- start message -->
                          <?php if ($this->session->idiom == 'spanish') { ?>
                              <a role="menuitem" tabindex="-1" href="<?= base_url() ?>lang/cat">
                                  <img alt="" class="img-circle" src="<?= base_url(); ?>assets/global/img/flags/catalan.png"> Catala </a>
                          <?php } else { ?>
                              <a role="menuitem" tabindex="-1" href="<?= base_url() ?>lang/es">
                                  <img alt="" class="img-circle" src="<?= base_url(); ?>assets/global/img/flags/spanish.png"> Espanyol </a>
                          <?php } ?>
                      </li><!-- end message -->
                  </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class=" treeview">
                <a href="<?= base_url()?>admin/aviones">
                <i class="fa fa-fighter-jet"></i> <span>Aviones</span>
              </a>
            </li>
            <li class="<?php if(isset($users)) echo "active "?> treeview">
                <a href="<?= base_url()?>admin/users">
                <i class="fa fa-user"></i> <span>Usuarios</span>
              </a>
            </li>
            <li class="<?php if(isset($events)) echo "active "?>treeview">
              <a href="<?= base_url()?>admin/events">
                <i class="fa fa-calendar"></i> <span>Eventos</span>
              </a>
            </li>
            <li class="treeview <?php if(isset($blog)) echo "active "?>">
              <a href="#">
                <i class="fa fa-pencil"></i>
                <span>Blog</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
                <ul class="treeview-menu "  <?php if(isset($blog)){ echo 'style="display: block;"';} else {echo 'style="display: none;"';}?> style="display: none;">
                <li <?php if(isset($blog)) echo "class='active' "?> ><a href="<?= base_url()?>admin/blog/entradas"><i class="fa fa-circle-o"></i> Entradas</a></li>
                <li <?php if(isset($categorias)) echo "class='active' "?>><a href="<?= base_url()?>admin/blog/categorias"><i class="fa fa-circle-o"></i> Categorias</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
          <?= $page_content; ?>
          
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong> 2015 Fundació Parc Aeronàutic de Catalunya</strong>
      </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="<?= base_url()?>assets/admin/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?= base_url()?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?= base_url()?>assets/admin/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url()?>assets/admin/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?= base_url()?>assets/admin/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?= base_url()?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url()?>assets/admin/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?= base_url()?>assets/admin/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?= base_url()?>assets/admin/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?= base_url()?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?= base_url()?>assets/admin/plugins/chartjs/Chart.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url()?>assets/admin/dist/js/demo.js" type="text/javascript"></script>
    
    
    <!-- DATA TABES SCRIPT -->
<!--    <script src="<?= base_url()?>assets/admin/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?= base_url()?>assets/admin/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>-->
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>

    <?php getJS()?>
    
    <script type="text/javascript">
      $(function () {
        $('.selectpicker').selectpicker({
            
        });
      });
    </script>
    
    <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>
    
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
  </body>
</html>